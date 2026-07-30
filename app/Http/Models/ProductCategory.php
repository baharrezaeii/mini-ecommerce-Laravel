<?php

/**
 * Created by Reliese Model.
 */

namespace App\Http\Models;

use App\Enums\CategoryStatus;
use App\Http\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int|null $file_id
 * @property Collection|Product[] $products
 * @property File|null $file
 * @property int $status
 * @package App\Models
 */
class ProductCategory extends Model
{
	protected $table = 'product_categories';
	public static $snakeAttributes = false;

    protected $casts = [
        'is_active' => 'bool',
        'status' => CategoryStatus::class,
    ];

	protected $fillable = [
		'name',
		'is_active',
        'file_id',
        'description',
        'status'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
