<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $fillable = ['user','address','email','phone','password'];
    protected $hidden = [
        'password',
    ];

    public function Order()
    {
        return $this->hasMany(Order::class,'customerNumber');
    }

    public function usesTimestamps():bool
    {
        return false;
    }
}
