<?php

namespace App\Models;

use App\Events\OrderWasSuccessful;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int product_id
 * @property int customer_id
 * @property int unit_price
 * @property int quantity
 * @property int total
 * @property string status
 *
 * @property-read Customer $customer
 * @property-read Product $product
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function markPaid(): static
    {
        $this->status = 'paid';
        $this->save();

        event(new OrderWasSuccessful($this));

        return $this;
    }
}
