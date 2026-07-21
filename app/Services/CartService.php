<?php


namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function add(int $productId, int $qty): void
    {
        $userCart = self::getItems();

        $userCart[$productId] = [
            'product_id' => $productId,
            'qty' => $qty
        ];
        session([
            'cart' => $userCart
        ]);
    }

    public static function getCount(): int
    {
        $userCart = self::getItems();

        return count($userCart);
    }

    private static function getItems(): array
    {
        return session('cart', []);
    }

    private static function getItemsWithDetails(): array
    {
        $userCart = self::getItems();
        foreach ($userCart as $key => $value) {
            $userCart[$key]['product'] = Product::find($key);
       }
        return $userCart;
    }

}
