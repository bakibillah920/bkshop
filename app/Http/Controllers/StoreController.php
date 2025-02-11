<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use DB;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', "check:Store"]);
    }

    public function index()
    {
        if (!check('Store')->show) {
            return back();
        }
        $stores = Store::get();

        return view('backend.pages.store.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check('Store')->add) {
            return back();
        }
        
         $tenant = Tenant::where('id', request()->getHost())->first();

        return view('backend.pages.store.create',compact('tenant'));
    }

    public function store(Request $request)
    {
        if (!check('Store')->add) {
            return back();
        }
        
        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        
        $data = $request->all();
        
        $tenant = Tenant::where('domain', request()->getHost())->first();
        if(is_null($tenant)) {
            $tenant = Tenant::create([
                'id' => strtolower(str_replace(' ', '_', $data['name'])),
            ]);
            Tenant::where('id',  $tenant->id)->update(['domain' => $data['domain']]);
            $data['tenant_id'] =  $tenant->id; 
            $store = Store::create($data);
            DB::statement("CREATE DATABASE `$tenant->id`");

            // Set new database connection dynamically
            Config::set('database.connections.tenant.database', $tenant->id);
            DB::purge('tenant');
            DB::reconnect('tenant');
            $sqlFilePath = storage_path('app/bkshop.sql'); // Ensure this file exists
            if (file_exists($sqlFilePath)) {
                DB::connection('tenant')->unprepared(file_get_contents($sqlFilePath));
            }
            
            $data['tenant_id'] =  $tenant->id; 
            $store = Store::create($data);
        }else{
            $data['tenant_id'] =  $tenant->id; 
            $store = Store::create($data);
        }

         
        if ($store) {
            request()->session()->flash('success', 'Store successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.store.index');
    }

    public function edit($id)
    {
        if (!check('Store')->edit) {
            return back();
        }
        $store = Store::findOrFail($id);
        $tenant = Tenant::where('domain', request()->getHost())->first();
        return view('backend.pages.store.edit',compact('store','tenant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!check('Store')->edit) {
            return back();
        }
        // return $request->all();
        $store = Store::findOrFail($id);

        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();

        $status = $store->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Store successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.store.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!check('Store')->delete) {
            return back();
        }
        $store = Store::findOrFail($id);
        
        $store->delete();

        request()->session()->flash('success', 'Store successfully deleted');
        return redirect()->route('merchant.store.index');
    }
}
