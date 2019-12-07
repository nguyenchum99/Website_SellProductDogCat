<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table= "products";

    public function bill_detail(){
        return hasMany('App\BillDetail');
    }
}
