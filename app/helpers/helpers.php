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
