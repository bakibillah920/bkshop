<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        return view('backend.pages.store.create');
    }

    public function store(Request $request)
    {
        if (!check('Store')->add) {
            return back();
        }
        // return $request->all();
        $this->validate($request, [
            'name' => 'string|required',
            'domain' => 'required|string|unique:domains,domain',
            'status' => 'required|in:active,inactive',
        ]);
        
        $data = $request->all();

        $tenant = Store::create($data);
        
        $tenant->domains()->create([
                 'domain' => $data['domain'], // Example: shop_one.localhost
        ]);
        if ($tenant) {
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
        return view('backend.pages.store.edit',compact('store'));
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
            'domain' => [
                    'required',
                    'string',
                    Rule::unique('domains', 'domain')->ignore($store->id, 'tenant_id'), // ? Ignore current domain
                ],
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();

        $status = $store->fill($data)->save();
        
        $store->domains()->updateOrCreate(
                ['tenant_id' => $store->id],  // Find by tenant_id
                ['domain' => $data['domain']] // Update with new domain
            );
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
