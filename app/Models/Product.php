<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property int id
 * @property double price
 * @property string name
 * @property string imagePath
 * @property string slug
 *
 * @property-read string productLink
 * @property-read string imageUrl
 */
class Product extends Model
{
    use HasFactory;

    protected $appends = [
        'productLink',
        'imageUrl',
    ];

    protected $guarded = ['id'];

    public function getProductLinkAttribute($value)
    {
        return route('product.details', ['product' => $this->slug]);
    }

    public function getImageUrlAttribute($value)
    {
        if(str($this->imagePath)->startsWith('http')){
            return  $this->imagePath;
        }

        return Storage::url($this->imagePath);
    }
}
