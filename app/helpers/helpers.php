<?php
if (!function_exists('getUserFullName')) {
    function getUserFullName(?\App\Models\User $user = null): string
    {
        if (!$user) {

            $user = auth()->user();
        }
        return $user->first_name . ' ' . $user->last_name;

    }
}
if (!function_exists('activeAccountSidebar')) {
    function activeAccountSidebar(string $routeName): string
    {
        if (\Illuminate\Support\Facades\Route::currentRouteName() == $routeName) {
            return 'bg-blue-500/10 text-blue-500';
        }
        return 'hover:text-blue-500';
    }
}

if (!function_exists('calcPercent')) {
    function calcPercent(int|float $total, int|float $amount): int
    {
        return $amount * 100 / $total;
    }
}

if (!function_exists('generateSortRouteParameter')) {
    function generateSortRouteParameter(string $type): array
    {
        $request = request();

        $queries = $request->all();

        $queries['sort'] = $type;

        return $queries;
    }
}
if (!function_exists('activeSort')) {
    function activeSort(string $type): ?string
    {
        $request = request();

        $default = 'newest';

        if (!$request->filled('sort')) {
            if ($type == $default) {
                return 'text-blue-500';
            }
            return 'text-gray-400';
        }
        return $request->input('sort') == $type ? 'text-blue-500' : 'text-gray-400';

    }
}


