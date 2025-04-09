<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'customer_addresses';
    protected $primaryKey='user_id';


public function user(){
    return $this->belongsTo(Customer::class,'id','user_id' );
}

}
