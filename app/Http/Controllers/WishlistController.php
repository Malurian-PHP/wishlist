<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends BaseController
{
    //
    public function index()
    {
        $user = User::find(Auth::id());

        $wishlist = $user->wishlist()->with('product')->get();

        if ($wishlist->isEmpty()) {
            return $this->sendError('No products in wishlist.', [], 404);
        }

        $wishlist->transform(function ($item) {
            return [
                'product_name' => $item->product->name,
                'product_price' => $item->product->price,
                'quantity' => $item->quantity,
            ];
        });

        return $this->sendResponse($wishlist, 'Wishlist retrieved successfully.');
    }

    public function store(WishlistRequest $request)
    {
        $user = User::find(Auth::id());

        $exists = $user->wishlist()->where('product_id', $request->product_id)->first();
        if ($exists) {
            $exists->increment('quantity');
            return $this->sendResponse([
                'product_name' => $exists->product->name,
                'quantity' => $exists->quantity,
            ], 'Product already in wishlist. Quantity updated.');
        }

        $product = $user->wishlist()->create([
            'product_id' => $request->product_id,
        ]);

        return $this->sendResponse([
            'product_name' => $product->product->name
        ], 'Product added to wishlist successfully.');
    }

    public function remove(WishlistRequest $request)
    {
        $user = User::find(Auth::id());

        $product = $user->wishlist()->where('product_id', $request->product_id)->first();

        if (!$product) {
            return $this->sendError('Product not found in wishlist.');
        }

        $product->delete();

        return $this->sendResponse([], 'Product removed.');
    }

    public function clear()
    {
        $user = User::find(Auth::id());

        $user->wishlist()->delete();

        return $this->sendResponse([], 'Wishlist cleared.');
    }
}
