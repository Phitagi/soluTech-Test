<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory, SoftDeletes;

                            //RELATIONS
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
                            //endRELATIONS
    
    protected $fillable =[
        'order_id','product_id'
    ];

}
