<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table= "bills";

    public function user(){
        return belongsTo('App\User');
    }

    public function bill_detail(){
        return hasMany('App\BillDetail');
    }
}
