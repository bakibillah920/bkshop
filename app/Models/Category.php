<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','store_id','status'];

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
