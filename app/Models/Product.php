<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','tenant_id','category_id','status'];
    
    public function store()
    {
        return $this->belongsTo(Store::class,'tenant_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
