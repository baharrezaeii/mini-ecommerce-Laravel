<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryStatus;
use App\Http\Models\File;
use App\Http\Models\ProductCategory;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = ProductCategory::query()
            ->withCount('products')
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->whereAny([
                    'name',
                    'description'
                ], 'LIKE', "%{$search}%");
            })
            ->when($request->filled('sort'), function ($query) use ($request) {

                switch ($request->sort) {

                    case 'date_asc':
                        $query->orderBy('created_at');
                        break;

                    case 'date_desc':
                        $query->orderByDesc('created_at');
                        break;

                    case 'name_asc':
                        $query->orderBy('name');
                        break;

                    case 'name_desc':
                        $query->orderByDesc('name');
                        break;

                    default:
                        $query->latest();
                }
            })
            ->paginate()
            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        DB::beginTransaction();

        try {

            $image = $request->file('images');

            $imageName = time() . rand(11111,99999) . '.' . $image->extension();

            $path = $image->storeAs('category_images', $imageName);

            $file = File::create([
                'name' => $imageName,
                'size' => $image->getSize(),
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
            ]);

            ProductCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => CategoryStatus::ENABLED,
                'file_id' => $file->id,
            ]);

            DB::commit();

            return redirect()->route('admin.categories.index');

        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }
    }

    public function show(ProductCategory $category)
    {
        $category->loadCount('products')
            ->load([
                'file',
                'products.defaultImage.file'
            ]);
        return view('admin.categories.show', compact('category'));

    }

    public function edit(ProductCategory $category)
    {
        $category->load('file');

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, ProductCategory $category)
    {
        DB::beginTransaction();

        try {

            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {

                if ($category->file) {

                    Storage::delete($category->file->path);
                    $category->file->delete();
                }


                $image = $request->file('image');

                $imageName = time() . rand(11111,99999) . '.' . $image->extension();

                $path = $image->storeAs('category_images', $imageName);

                $file = File::create([
                    'name' => $imageName,
                    'size' => $image->getSize(),
                    'original_name' => $image->getClientOriginalName(),
                    'path' => $path,
                    'extension' => $image->extension(),
                ]);

                $data['file_id'] = $file->id;
            }

            $category->update($data);

            DB::commit();

            return redirect()->route('admin.categories.index');

        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }
    }


    public function destroy(ProductCategory $category)
    {
        if ($category->products()->exists()) {
            return redirect()->route('admin.categories.index');
        }

        if ($category->file) {
            Storage::disk('public')->delete($category->file->path);
            $category->file->delete();
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
