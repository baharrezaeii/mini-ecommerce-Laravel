<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\File;
use App\Http\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()
            ->with('image')
            ->orderBy('sort')
            ->get();
        return view('admin.sliders.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.sliders.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:255'],
            'image' => ['required','image','mimes:jpg,jpeg,png,webp,gif','max:4096'],
            'sort'   => ['required', 'integer', 'min:1'],

        ]);


        DB::beginTransaction();

        try {

            $image = $request->file('image');



            $imageName = time() . rand(11111,99999) . '.' . $image->extension();


            $path = $image->storeAs(
                'slider_images',
                $imageName
            );


            $file = File::create([
                'name' => $imageName,
                'size' => $image->getSize(),
                'original_name' => $image->getClientOriginalName(),
                'path' => $path,
                'extension' => $image->extension(),
            ]);


            Slider::create([
                'title' => $request->title,
                'image_id' => $file->id,
                'status' => 1,
                'sort'     => $request->sort,

            ]);

            DB::commit();


            return redirect()
                ->route('admin.sliders.index');


        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();


            return back();
        }
    }
}
