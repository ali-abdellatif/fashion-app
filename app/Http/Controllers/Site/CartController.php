<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // ─── View cart page ───────────────────────────────────────────────────────

    public function index()
    {
        $cart = Cart::forCustomer();
        $cart->load('items.product.images', 'items.color', 'items.size');

        return view('site.cart', compact('cart'));
    }

    // ─── Mini-cart data (AJAX) ────────────────────────────────────────────────

    public function miniCart()
    {
        $cart = Cart::forCustomer();
        $cart->load('items.product.images', 'items.color', 'items.size');

        return response()->json([
            'count'    => $cart->totalQuantity(),
            'subtotal' => number_format($cart->subtotal(), 2),
            'items'    => $cart->items->map(fn ($item) => [
                'id'       => $item->id,
                'name'     => $item->product->name,
                'url'      => route('product.show', $item->product->slug),
                'image'    => $item->color?->url ?? $item->product->primaryImage()?->url,
                'color'    => $item->color?->color_name,
                'size'     => $item->size?->name,
                'price'    => number_format($item->unitPrice(), 2),
                'total'    => number_format($item->lineTotal(), 2),
                'quantity' => $item->quantity,
            ]),
        ]);
    }

    // ─── Add item ─────────────────────────────────────────────────────────────

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id'       => ['required', 'exists:products,id'],
            'product_image_id' => ['nullable', 'exists:product_images,id'],
            'product_size_id'  => ['nullable', 'exists:product_sizes,id'],
            'quantity'         => ['integer', 'min:1'],
        ]);

        $product = Product::findOrFail($data['product_id']);
        if (! $product->is_active) {
            return response()->json(['error' => __('Product not available.')], 422);
        }

        $cart = Cart::forCustomer();

        $item = CartItem::where([
            'cart_id'          => $cart->id,
            'product_id'       => $data['product_id'],
            'product_image_id' => $data['product_image_id'] ?? null,
            'product_size_id'  => $data['product_size_id'] ?? null,
        ])->first();

        if ($item) {
            $item->increment('quantity', $data['quantity'] ?? 1);
        } else {
            $cart->items()->create([
                'product_id'       => $data['product_id'],
                'product_image_id' => $data['product_image_id'] ?? null,
                'product_size_id'  => $data['product_size_id'] ?? null,
                'quantity'         => $data['quantity'] ?? 1,
            ]);
        }

        return response()->json(['message' => __('Added to cart.'), 'count' => $cart->fresh()->totalQuantity()]);
    }

    // ─── Update quantity ──────────────────────────────────────────────────────

    public function update(Request $request, CartItem $item)
    {
        $this->authorizeItem($item);

        $request->validate(['quantity' => ['required', 'integer', 'min:1']]);
        $item->update(['quantity' => $request->quantity]);

        $cart = $item->cart->load('items');
        return response()->json([
            'line_total' => $item->fresh()->lineTotal(),
            'subtotal'   => $cart->subtotal(),
            'count'      => $cart->totalQuantity(),
        ]);
    }

    // ─── Remove item ──────────────────────────────────────────────────────────

    public function remove(CartItem $item)
    {
        $this->authorizeItem($item);
        $cart = $item->cart->load('items');
        $item->delete();

        $freshCart = $cart->fresh();
        return response()->json([
            'subtotal' => $freshCart->subtotal(),
            'count'    => $freshCart->totalQuantity(),
        ]);
    }

    // ─── Clear cart ───────────────────────────────────────────────────────────

    public function clear()
    {
        Cart::forCustomer()->items()->delete();
        return response()->json(['message' => __('Cart cleared.')]);
    }

    // ─── Helper ───────────────────────────────────────────────────────────────

    private function authorizeItem(CartItem $item): void
    {
        abort_if($item->cart->customer_id !== auth('customer')->id(), 403);
    }
}
