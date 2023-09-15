<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categoryModel;

class productModel extends Model
{
    use HasFactory;
    protected $table='product';  
    protected $fillable = ['proname','category_id','image','price','status','description'];

    public function cat(){
        return $this->hasOne(categoryModel::class,'id','category_id');
    }
}
