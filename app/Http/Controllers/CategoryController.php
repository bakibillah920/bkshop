<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', "check:Category"]);
    }

    public function index()
    {
        if (!check('Category')->show) {
            return back();
        }
        $category = Category::get();
      
        return view('backend.pages.category.index')->with('categories', $category);
    }
    public function create()
    {
        if (!check('Category')->add) {
            return back();
        }

        $storeList = DB::table('tenants')->whereRaw("JSON_EXTRACT(data, '$.status') = 'active'")->get(['id', DB::raw("JSON_UNQUOTE(JSON_EXTRACT(data, '$.name')) AS name")]);
        $storeList = $storeList->pluck('name', 'id')->toArray();

        return view('backend.pages.category.create',compact('storeList'));
    }
    public function store(Request $request)
    {
        if (!check('Category')->add) {
            return back();
        }
        // return $request->all();
        $this->validate($request, [
            'tenant_id' => 'not_in:0',
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ], [], [
            'tenant_id' => "Store"
        ]);
        $data = $request->all();

        $status = Category::create($data);
        if ($status) {
            request()->session()->flash('success', 'Category successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.category.index');


    }


    public function edit($id)
    {
        if (!check('Category')->edit) {
            return back();
        }
        $storeList = DB::table('tenants')->whereRaw("JSON_EXTRACT(data, '$.status') = 'active'")->get(['id', DB::raw("JSON_UNQUOTE(JSON_EXTRACT(data, '$.name')) AS name")]);
        $storeList = $storeList->pluck('name', 'id')->toArray();
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit',compact('category','storeList'));
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
        if (!check('Category')->edit) {
            return back();
        }
        // return $request->all();
        $category = Category::findOrFail($id);
         $this->validate($request, [
            'tenant_id' => 'not_in:0',
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ], [], [
            'tenant_id' => "Store"
        ]);
        $data = $request->all();

        $status = $category->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Category successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!check('Category')->delete) {
            return back();
        }
        $category = Category::findOrFail($id);
        
        $category->delete();

        request()->session()->flash('success', 'Category successfully deleted');
        return redirect()->route('merchant.category.index');
    }

}
