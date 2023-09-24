<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function login(){
        return $this->hasOne(Login::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    protected $fillable = ['name', 'email', 'phoneno','image_path'];
}
