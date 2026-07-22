<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property int $unit_price
 * @property int $total_price
 * @property int $unit_discount
 * @property int $total_discount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property Product $product
 * @property Order $order
 *
 * @package App\Models
 */
class OrderItem extends Model
{
	use SoftDeletes;
	protected $table = 'order_items';
	public static $snakeAttributes = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'qty' => 'int',
		'unit_price' => 'int',
		'total_price' => 'int',
		'unit_discount' => 'int',
		'total_discount' => 'int'
	];

	protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'unit_price',
        'total_price',
        'unit_discount',
        'total_discount',
        'price'
    ];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
