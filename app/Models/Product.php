<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $guarded=[];

    public function category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }
  
}
