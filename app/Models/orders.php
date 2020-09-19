<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
protected $table = 'orders';
protected $fillable = ['email', 'customer_name', 'customer_type','total','customer_id'];

}
