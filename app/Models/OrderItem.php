<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    




    function course() : BelongsTo {
        return $this->belongsTo(Course::class, 'course_id', 'id'); 
     }
 
     function order() : BelongsTo
     {
         return $this->belongsTo(Order::class, 'order_id', 'id');     
     }
 
}
