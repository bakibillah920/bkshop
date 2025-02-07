<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','tenant_id','status'];

    public function store()
    {
        return $this->belongsTo(Store::class,'tenant_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
