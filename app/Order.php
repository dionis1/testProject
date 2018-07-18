<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['final_price', 'product_details', 'status', 'user_id'];
}
