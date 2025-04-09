<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey='order_id';

    public function statusText(){
        if($this->status == 1)
            return 'placed';

    else
        return 'delivered';


    }
    protected $appends=['status_text'];

}
