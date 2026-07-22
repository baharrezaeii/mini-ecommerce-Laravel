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

    public static function getItemsWithDetails(): array
    {
        $userCart = self::getItems();
        foreach ($userCart as $key => $value) {
            $userCart[$key]['product'] = Product::find($key);
        }
        return $userCart;
    }

    public static function updateQty(int $productId, int $newQty): void
    {
        $userCart = self::getItems();

        $userCart[$productId]['qty'] = $newQty;

        session([
            'cart' => $userCart
        ]);
    }

    public static function remove(int $productId): void
    {
        $userCart = self::getItems();

        unset($userCart[$productId]);

        session([
            'cart' => $userCart
        ]);
    }

    public static function clean(): void
    {
        session([
            'cart' => []
        ]);
    }

    public static function getTotalPrices(): array
    {
        $finalPrice = 0;
        $finalDiscount = 0;

        $userCart = self::getItemsWithDetails();

        foreach ($userCart as $item) {
            $finalPrice += $item['product']->price * $item['qty'];
            $finalDiscount += $item['product']->discount * $item['qty'];
        }
        return [
            'price' => $finalPrice,
            'discount' => $finalDiscount
        ];

    }

    public static function getCartProductQty(int $productId): int
    {
        $userCart = self::getItems();

        return $userCart[$productId]['qty'] ?? 0;

    }

}
