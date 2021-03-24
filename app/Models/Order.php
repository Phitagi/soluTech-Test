<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory,SoftDeletes;

                                //RELATIONS

    public function details()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class,Order_detail::class,'order_id','id','id','product_id',);
    }
                            //

                    
    protected $fillable =[
        'order_number'
    ];
}
