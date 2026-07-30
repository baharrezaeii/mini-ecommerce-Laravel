<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatus;
use App\Http\Models\File;
use App\Http\Models\Product;
use App\Http\Models\ProductCategory;
use App\Http\Models\ProductImage;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::query()
            ->with([
                'productCategory',
                'defaultImage.file'
            ])
            ->when($request->filled('search'), function (Builder $query) use ($request) {

                $search = $request->input('search');

                $query->whereAny([
                    'name',
                    'en_name',
                    'description'
                ], 'LIKE', "%$search%");
            })
            ->when($request->filled('sort'), function (Builder $query) use ($request) {

                $sort = $request->input('sort');

                switch ($sort) {

                    case 'name_asc':
                    {
                        $query->orderBy('name');
                        break;
                    }

                    case 'name_desc':
                    {
                        $query->orderByDesc('name');
                        break;
                    }

                    case 'price_asc':
                    {
                        $query->orderBy('price');
                        break;
                    }

                    case 'price_desc':
                    {
                        $query->orderByDesc('price');
                        break;
                    }

                    default:
                    {
                        $query->orderByDesc('created_at');
                    }
                }
            })
            ->paginate();

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $productCategories = ProductCategory::all();

        return view('admin.products.create', compact('productCategories'));
    }

    public function store(ProductStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => $request->input('name'),
                'en_name' => $request->input('en_name'),
                'product_category_id' => $request->input('product_category_id'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'qty' => $request->input('qty'),
                'status' => ProductStatus::DRAFT,
                'description' => $request->input('description')
            ]);
            $isDefault = true;
            foreach ($request->file('images') as $image) {
                $imageName = $product->id . '_' . time() .rand(11111,999999). '.' . $image->extension();

                $path = $image->storeAs('product_images', $imageName);

                $file = File::create([
                    'name' => $imageName,
                    'size' => $image->getSize(),
                    'original_name' => $image->getClientOriginalName(),
                    'path' => $path,
                    'extension' => $image->extension()
                ]);

                ProductImage::create([
                    'product_id' => $product->id,
                    'file_id' => $file->id,
                    'is_default' => $isDefault

                ]);
                if($isDefault){

                    $isDefault=false;
                }
            }
            DB::commit();

        }catch (Exception $exception){
            Log::error($exception);

            DB::rollBack();


            return back()->withErrors([
                'general'=>'خطایی رخ داده است. '
            ]);
        }
        return redirect()->route('admin.products.index');

    }

    public function show(Product $product)
    {
        $product->load([
            'productCategory',
            'defaultImage.file',
        ]);

        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $product->load([
            'productCategory',
            'productImages.file',
            'defaultImage.file',
        ]);

        $productCategories = ProductCategory::all();

        return view('admin.products.edit', compact(
            'product',
            'productCategories'
        ));
    }



    public function update(ProductUpdateRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {

            $product->update([
                'name' => $request->name,
                'en_name' => $request->en_name,
                'product_category_id' => $request->product_category_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'qty' => $request->qty,
                'description' => $request->description,
            ]);

            if ($request->hasFile('images')) {

                $isDefault = $product->productImages()->count() == 0;

                foreach ($request->file('images') as $image) {

                    $imageName = $product->id . '_' . time() . rand(11111,99999) . '.' . $image->extension();

                    $path = $image->storeAs('product_images', $imageName);

                    $file = File::create([
                        'name' => $imageName,
                        'size' => $image->getSize(),
                        'original_name' => $image->getClientOriginalName(),
                        'path' => $path,
                        'extension' => $image->extension(),
                    ]);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'file_id' => $file->id,
                        'is_default' => $isDefault,
                    ]);

                    if ($isDefault) {
                        $isDefault = false;
                    }
                }
            }

            DB::commit();

        } catch (Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }

        return redirect()->route('admin.products.index');
    }
    public function removeImage(Product $product, ProductImage $image)
    {
        DB::beginTransaction();

        try {

            $image = $product->productImages()->find($image->id);

            if (!$image) {
                abort(404);
            }

            if ($image->file) {

                if (Storage::exists($image->file->path)) {
                    Storage::delete($image->file->path);
                }

                $image->file->delete();
            }

            $image->delete();

            if (!$product->productImages()->where('is_default', true)->exists()) {

                $firstImage = $product->productImages()->first();

                if ($firstImage) {
                    $firstImage->update([
                        'is_default' => true,
                    ]);
                }
            }

            DB::commit();

            return back();

        } catch (Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }
    }

    public function destroy(Product $product)
    {
        if ($product->orderItems()->exists()) {
            return redirect()
                ->route('admin.products.index');
        }

        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
