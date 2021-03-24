<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier_product extends Model
{
    use HasFactory,SoftDeletes;

                            //RELATIONS

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
                            //endRELATIONS

    protected $fillable =[
        'supplier_id','product_id'
    ];
}
