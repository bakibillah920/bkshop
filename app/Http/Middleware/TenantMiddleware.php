<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantMiddleware
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();
        $tenant = Tenant::where('domain', $host)->first();

        if (!$tenant) {
            abort(404, "Tenant not found");
        }

        // Set the tenant's database dynamically
        Config::set('database.connections.tenant.database', $tenant->database_name);
        DB::purge('tenant');
        DB::reconnect('tenant');

        // Store tenant database in session
        session(['tenant_database' => 'tenant']);

        return $next($request);
    }
}

