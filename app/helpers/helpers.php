<?php
if (!function_exists('getUserFullName')) {
    function getUserFullName(?\App\Http\Models\User $user = null): string
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

if (!function_exists('getUserCartCount')) {
    function getUserCartCount(): int
    {
        return \App\Services\CartService::getCount();
    }
}

if (!function_exists('getFileUrl')) {
    function getFileUrl(?int $fileId): ?string
    {
        if (!$fileId) {
            return null;
        }
        $file = \App\Http\Models\File::find($fileId);
        if (!$file) {
            return null;
        }
        return Storage::disk('public')->url($file->path);
    }
}


//admin
if (!function_exists('activeAdminSidebar')) {
    function activeAdminSidebar(string|array $routeNames): string
    {
        $currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();

        if (is_string($routeNames)) {
            $routeNames = [$routeNames];
        }


        if (in_array($currentRouteName, $routeNames)) {
            return 'active';
        }
        return '';
    }

}


if (!function_exists('settings')) {
    function settings(?string $code): ?string
    {


        if (!$code) {
            return null;
        }
        $settings = \App\Http\Models\Setting::query()
            ->whereCode($code)
            ->first();

        if (!$settings) {
            return null;
        }
        return $settings->value;


    }

}


