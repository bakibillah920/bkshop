<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', "check:Product"]);
    }

    public function index()
    {
        if (!check('Product')->show) {
            return back();
        }
        $product = Product::join('stores', 'stores.id', '=', 'products.store_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.name as c_name', 'stores.name as s_name')->get();
        return view('backend.pages.product.index')->with('categories', $product);
    }
    public function create()
    {
        if (!check('Product')->add) {
            return back();
        }
        $storeList = Store::where('status','active')->pluck('name','id')->toArray();
        $categoryList = array();
        return view('backend.pages.product.create',compact('storeList','categoryList'));
    }
    public function store(Request $request)
    {
        if (!check('Product')->add) {
            return back();
        }
        // return $request->all();
        $this->validate($request, [
             'store_id' => 'not_in:0',
             'category_id' => 'not_in:0',
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ], [], [
            'store_id' => "Store",
            'category_id' => "Category"
        ]);
        $data = $request->all();

        $status = Product::create($data);
        if ($status) {
            request()->session()->flash('success', 'Product successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.product.index');


    }


    public function edit($id)
    {
        if (!check('Product')->edit) {
            return back();
        }
      
        $product = Product::findOrFail($id);
        $storeList = Store::where('status','active')->pluck('name','id')->toArray();
        $categoryList = Category::where('status','active')->where('store_id',$product->store_id)->pluck('name','id')->toArray();
        return view('backend.pages.product.edit',compact('product','storeList','categoryList'));
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
        if (!check('Product')->edit) {
            return back();
        }
        // return $request->all();
        $product = Product::findOrFail($id);
         $this->validate($request, [
            'store_id' => 'not_in:0',
            'category_id' => 'not_in:0',
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ], [], [
            'store_id' => "Store",
            'category_id' => "Category"
        ]);
        $data = $request->all();

        $status = $product->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Product successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('merchant.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!check('Product')->delete) {
            return back();
        }
        $product = Product::findOrFail($id);
        
        $product->delete();

        request()->session()->flash('success', 'Product successfully deleted');
        return redirect()->route('merchant.product.index');
    }
    public function getCategory(Request $request)
    {
        if (!check('Product')->show) {
            return back();
        }
        $categoryList =  Category::where('status','active')->where('store_id',$request->store_id)->pluck('name','id')->toArray();
        $view = view('backend.pages.product.getcategory', compact('categoryList'))->render();
        return response()->json(['html' => $view]);
    }

}
