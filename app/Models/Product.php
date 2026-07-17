<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property string $en_name
 * @property int $product_category_id
 * @property int $price
 * @property int $discount
 * @property int $qty
 * @property int $status
 * @property string|null $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property ProductCategory $productCategory
 * @property Collection|OrderItem[] $orderItems
 * @property Collection|ProductImage[] $productImages
 *
 * @package App\Models
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public static $snakeAttributes = false;

    protected $casts = [
        'product_category_id' => 'int',
        'price' => 'int',
        'discount' => 'int',
        'qty' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'name',
        'en_name',
        'product_category_id',
        'price',
        'discount',
        'qty',
        'status',
        'description'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    #[Scope]
    protected function applyFilter(EloquentBuilder $query): void
    {
        $request = request();

        if ($request->filled('exists')) {
            $query->where('qty', '>', 0);
        }

        if ($request->filled('category_id')) {
            $categoryIds = array_keys($request->input('category_id'));
            $query->whereIn('product_category_id', $categoryIds);
        }
    }

    #[Scope]
    protected function applySort(EloquentBuilder $query): void
    {
        $request = request();

        switch ($request->input('sort') ?? null) {
            case 'best_selling':
            {
                $query
                    ->withSum('orderItems', 'qty')
                    ->orderByDesc('order_items_sum_qty');
                break;
            }
            case 'lowest':
            {
                $query
                    ->orderBy('price');
                break;
            }
            case 'highest':
            {
                $query
                    ->orderByDesc('price');
                break;
            }
            default:
            {
                $query->orderByDesc('created_at');
            }
        }
    }

    #[Scope]
    protected function applySearch(EloquentBuilder $query): void
    {
        $request = request();

        if ($request->filled('keyword')) {
            $keyword=$request->input('keyword');

            $query->whereAny([
                'name',
                'en_name',
                'description',

            ],'LIKE',"%$keyword%");
        }
    }


}

