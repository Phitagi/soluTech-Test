<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    
                            //RELATIONS

    public function supplier()
    {
        return $this->hasMany(Supplier_product::class);

    }

    public function orderDetail()
    {
        return $this->hasMany(Order_detail::class);
    }

                            //endRELATIONS 


    protected $fillable =[
        'name','description','quantity'
    ];

}
