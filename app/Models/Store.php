<?php

namespace App\Models;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends BaseTenant
{
    protected $fillable = ['id', 'name','status'];

    public function domains(): HasMany
    {
        return $this->hasMany(\Stancl\Tenancy\Database\Models\Domain::class, 'tenant_id'); 
    }
    public function categories()
    {
        return $this->hasMany(Category::class, 'tenant_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'tenant_id');
    }
}

