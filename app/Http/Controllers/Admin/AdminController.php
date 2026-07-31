<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Admin;
use App\Http\Models\File;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::query()
            ->with('file')

            ->when($request->filled('search'), function (Builder $query) use ($request) {

                $search = $request->input('search');

                $query->whereAny([
                    'first_name',
                    'last_name',
                    'username',
                    'email'
                ], 'LIKE', "%{$search}%");
            })

            ->when($request->filled('sort'), function (Builder $query) use ($request) {

                switch ($request->input('sort')) {

                    case 'name_asc':
                        $query->orderBy('first_name');
                        break;

                    case 'name_desc':
                        $query->orderByDesc('first_name');
                        break;

                    case 'email':
                        $query->orderBy('email');
                        break;

                    default:
                        $query->orderByDesc('created_at');
                }
            })

            ->paginate();

        return view('admin.admins.index', compact('admins'));
    }

    public function store(AdminStoreRequest $request)
    {
        DB::beginTransaction();

        try {

            $image = $request->file('image');

            $imageName = time() . rand(11111, 99999) . '.' . $image->extension();

            $path = $image->storeAs('admin_images', $imageName);

            $file = File::create([
                'name'          => $imageName,
                'size'          => $image->getSize(),
                'original_name' => $image->getClientOriginalName(),
                'path'          => $path,
                'extension'     => $image->extension(),
            ]);

            Admin::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'username'   => $request->username,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'status'     => $request->status,
                'file_id'    => $file->id,
            ]);

            DB::commit();

            return redirect()->route('admin.admins.index');

        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }
    }
    public function create()
    {
        return view('admin.admins.create');
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        DB::beginTransaction();

        try {

            $admin->update([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'username'   => $request->username,
                'email'      => $request->email,
                'status'     => $request->status,
            ]);

            if ($request->filled('password')) {

                $admin->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName = $admin->id . '_' . time() . rand(11111,99999) . '.' . $image->extension();

                $path = $image->storeAs('admin_images', $imageName);

                $file = File::create([
                    'name' => $imageName,
                    'size' => $image->getSize(),
                    'original_name' => $image->getClientOriginalName(),
                    'path' => $path,
                    'extension' => $image->extension(),
                ]);

                $admin->update([
                    'file_id' => $file->id,
                ]);
            }

            DB::commit();

        } catch (Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }

        return redirect()->route('admin.admins.index');
    }
    public function destroy(Admin $admin)
    {
        DB::beginTransaction();

        try {

            $file = $admin->file;

            $admin->delete();

            if ($file) {

                Storage::disk('public')->delete($file->path);

                $file->delete();
            }

            DB::commit();

            return redirect()->route('admin.admins.index');

        } catch (\Exception $exception) {

            Log::error($exception);

            DB::rollBack();

            return back();
        }
    }




}
