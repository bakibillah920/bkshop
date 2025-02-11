<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Store extends Model
{

    protected $connection = 'tenant'; // Use the tenant database

    protected $fillable = ['tenant_id', 'name', 'status'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'store_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id');
    }
   
}

