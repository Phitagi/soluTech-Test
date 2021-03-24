<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory,SoftDeletes;
    
    //RELATIONS
    public function products()
    {
        return $this->hasMany(Supplier_product::class);
    }
    //endRELATIONS


    protected $fillable =[
        'name'
    ];
}
