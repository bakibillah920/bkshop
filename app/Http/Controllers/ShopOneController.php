<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;
use Stancl\Tenancy\Database\Models\Domain;
class ShopOneController extends Controller
{
    public function index()
    {
        $domain = Domain::where('domain', request()->getHost())->first();
        if ($domain){
                $tenant = $domain->tenant;
                $stores = Store::with(['categories.products'])->where('id', $tenant->id)->get();
                return view('frontend.pages.index', compact('stores'));
            } else {
                return redirect()->route('login');
            }
        }
}
