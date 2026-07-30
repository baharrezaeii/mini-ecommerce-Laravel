<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Order;
use App\Http\Models\User;
use App\Http\Requests\Admin\UserUpdateRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->filled('search'), function (Builder $query) use ($request) {
                $search = $request->input('search');

                $query->whereAny([
                    'first_name',
                    'last_name',
                    'mobile',
                    'email'
                ], 'LIKE', "%$search%");
            })
            ->when($request->filled('sort'), function (Builder $query) use ($request) {
                $sort = $request->input('sort');

                switch ($sort) {
                    case 'name_asc' :
                    {
                        $query
                            ->orderBy('first_name')
                            ->orderBy('last_name');
                        break;
                    }
                    case 'name_desc' :
                    {
                        $query
                            ->orderByDesc('first_name')
                            ->orderByDesc('last_name');
                        break;
                    }
                    default:
                    {
                        $query->orderByDesc('created_at');
                    }
                }
            })
            ->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load([
            'orders' => function ($query) {
                $query->orderByDesc('created_at')->limit(5);
            }
        ]);

        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));

    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $inputs = $request->only([
            'first_name',
            'last_name',
            'mobile',
            'email',
        ]);

        if ($request->filled('password')) {
            $inputs['password'] = Hash::make($request->password);
        }

        $user->update($inputs);

        return redirect()->route('admin.users.index');

    }

    public function destroy(User $user)
    {
        $orderExists = Order::query()
            ->where('user_id', $user->id)
            ->exists();

        if ($orderExists) {
            return redirect()->route('admin.users.index');
        }

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
