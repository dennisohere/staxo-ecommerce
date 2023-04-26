<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property double price
 * @property string name
 * @property string imageUrl
 * @property string slug
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
