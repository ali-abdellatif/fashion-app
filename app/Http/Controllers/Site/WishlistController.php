<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Wishlist page
    public function index()
    {
        $items = Wishlist::where('customer_id', auth('customer')->id())
            ->with(['product' => fn ($q) => $q->with('images', 'sizes')])
            ->latest()
            ->get();

        return view('site.wishlist', compact('items'));
    }

    // Toggle: add if not exists, remove if exists
    public function toggle(Request $request)
    {
        $request->validate(['product_id' => ['required', 'exists:products,id']]);

        $customerId = auth('customer')->id();
        $productId  = $request->product_id;

        $existing = Wishlist::where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $existing->delete();
            $inWishlist = false;
        } else {
            Wishlist::create(['customer_id' => $customerId, 'product_id' => $productId]);
            $inWishlist = true;
        }

        $count = Wishlist::where('customer_id', $customerId)->count();

        return response()->json([
            'in_wishlist' => $inWishlist,
            'count'       => $count,
        ]);
    }

    // Remove from wishlist page (with DOM removal)
    public function remove(Wishlist $wishlist)
    {
        abort_if($wishlist->customer_id !== auth('customer')->id(), 403);
        $wishlist->delete();

        return response()->json(['success' => true]);
    }
}
