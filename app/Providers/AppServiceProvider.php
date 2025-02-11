<?php

namespace App\Providers;

use App\Models\AddToCart;
use App\Models\CompanyContact;
use App\Models\CompanyInfo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use App\Models\Tenant;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once base_path() . '/app/Http/Helpers/GlobalFunction.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    
        $tenant = Tenant::where('domain', request()->getHost())->first();
       
        if (!empty($tenant)) {
            Config::set('database.connections.tenant.database', $tenant->id);
            DB::purge('tenant');
            DB::reconnect('tenant');
            Paginator::useBootstrap();
            if (Schema::hasTable('company_infos')) {
                $site_info = CompanyInfo::first();
                $site_contact_info = CompanyContact::first();
                $cart_products = '';

                view()->share('cart_products', $cart_products);
                view()->share('site_info', $site_info);
                view()->share('site_contact_info', $site_contact_info);
            }
        }else{
       Config::set('database.connections.tenant.database', env("DB_DATABASE"));
            DB::purge('tenant');
            DB::reconnect('tenant');
            Paginator::useBootstrap();
            if (Schema::hasTable('company_infos')) {
                $site_info = CompanyInfo::first();
                $site_contact_info = CompanyContact::first();
                $cart_products = '';
                view()->share('cart_products', $cart_products);
                view()->share('site_info', $site_info);
                view()->share('site_contact_info', $site_contact_info);
            }
        }

    }
//    public function boot()
//    {
//        $tenant = Tenant::where('domain', request()->getHost())->first();
//
//        if ($tenant) {
//            Config::set('database.connections.tenant.database', $tenant->id);
//            DB::purge('tenant');
//            DB::reconnect('tenant');
//        }
//    }
}
