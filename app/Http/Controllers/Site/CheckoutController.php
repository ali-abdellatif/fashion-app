<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Governorate;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $customer    = auth('customer')->user();
        $cart        = Cart::forCustomer();
        $cart->load('items.product.images', 'items.color', 'items.size');

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $customer->load('addresses.governorate');
        $governorates = Governorate::where('is_active', true)->orderBy('name')->get();

        $defaultAddr  = $customer->defaultAddress();
        $shipping     = $defaultAddr?->governorate?->shipping_price ?? 0;

        return view('site.checkout', compact('customer', 'cart', 'governorates', 'defaultAddr', 'shipping'));
    }

    public function place(Request $request)
    {
        $customer = auth('customer')->user();
        $cart     = Cart::forCustomer();
        $cart->load('items.product', 'items.color', 'items.size');

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index');
        }

        $data = $request->validate([
            'governorate_id'  => ['required', 'exists:governorates,id'],
            'city'            => ['required', 'string', 'max:255'],
            'district'        => ['nullable', 'string', 'max:255'],
            'street'          => ['nullable', 'string', 'max:255'],
            'building'        => ['nullable', 'string', 'max:255'],
            'floor'           => ['nullable', 'string', 'max:50'],
            'apartment'       => ['nullable', 'string', 'max:50'],
            'postal_code'     => ['nullable', 'string', 'max:20'],
            'address_notes'   => ['nullable', 'string'],
            'notes'           => ['nullable', 'string'],
        ]);

        $governorate  = Governorate::findOrFail($data['governorate_id']);
        $subtotal     = $cart->subtotal();
        $shippingCost = (float) $governorate->shipping_price;
        $total        = $subtotal + $shippingCost;

        $order = Order::create([
            'customer_id'    => $customer->id,
            'governorate_id' => $governorate->id,
            'recipient_name' => $customer->name,
            'recipient_phone'=> $customer->phone,
            'city'           => $data['city'],
            'district'       => $data['district'] ?? null,
            'street'         => $data['street'] ?? null,
            'building'       => $data['building'] ?? null,
            'floor'          => $data['floor'] ?? null,
            'apartment'      => $data['apartment'] ?? null,
            'postal_code'    => $data['postal_code'] ?? null,
            'address_notes'  => $data['address_notes'] ?? null,
            'subtotal'       => $subtotal,
            'shipping'       => $shippingCost,
            'total'          => $total,
            'payment_method' => 'cod',
            'status'         => 'pending',
            'notes'          => $data['notes'] ?? null,
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id'   => $item->product_id,
                'product_name' => $item->product->name,
                'color_name'   => $item->color?->color_name,
                'size_name'    => $item->size?->name,
                'unit_price'   => $item->unitPrice(),
                'quantity'     => $item->quantity,
                'line_total'   => $item->lineTotal(),
            ]);
        }

        // Clear the cart
        $cart->items()->delete();

        return redirect()->route('checkout.success', $order->id);
    }

    public function success(Order $order)
    {
        abort_if((int) $order->customer_id !== (int) auth('customer')->id(), 403);
        $order->load('items', 'governorate');

        return view('site.checkout-success', compact('order'));
    }
}
