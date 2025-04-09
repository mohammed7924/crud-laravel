<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class Customer extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes, AuthenticatableTrait;


    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'email',
        'password',
        'phonenumber',
        'place',
        'address',
        'status',
        'image'
    ];

    protected $hidden = ['id', 'password']; // ✅ Hide password from API responses

    protected $attributes = [
        'status' => 'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
 public function address(){
    return $this->hasOne(UserAddress::class,'user_id','id');

 }
 public function orders(){
    return $this->hasMany(Order::class,'user_id','id');


 }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
