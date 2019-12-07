<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table= "bill_detail";
    
    public function bill(){
        return belongsTo('App\Bill');
    }

    public function product(){
        return belongsTo('App\Product');
    }
}
