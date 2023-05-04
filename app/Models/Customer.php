<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property  int id
 * @property string email
 */
class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
