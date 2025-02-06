<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;

class ShopOneController extends Controller
{
    public function index()
    {
        // Fetch all categories with their associated products
        $stores = Store::with(['categories.products'])->get();
        return view('frontend.pages.index', compact('stores'));
    }
}
