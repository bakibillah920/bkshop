<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Tenant;
class ShopOneController extends Controller
{
    public function index(Request $request)
    {
         $host = $request->getHost();
        $tenant = Tenant::where('domain', $host)->first();
        if ($tenant){
                $stores = Store::with(['categories.products'])->where('tenant_id', $tenant->id)->get();
                return view('frontend.pages.index', compact('stores'));
            } else {
                return redirect()->route('login');
            }
        }
}
