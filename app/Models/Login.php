<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    use InteractsWithMedia;
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    } 
}
