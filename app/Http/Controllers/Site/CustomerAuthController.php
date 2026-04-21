<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CustomerAuthController extends Controller
{
    // ─── Register ────────────────────────────────────────────────────────────

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'username'      => ['required', 'string', 'max:255', 'unique:customers,username'],
            'email'         => ['required', 'email', 'max:255', 'unique:customers,email'],
            'phone'         => ['required', 'string', 'max:20', 'unique:customers,phone'],
            'password'      => ['required', 'confirmed', Password::min(8)],
            'governorate_id'=> ['required', 'exists:governorates,id'],
            'street'        => ['required', 'string', 'max:255'],
            'city'          => ['nullable', 'string', 'max:255'],
            'building'      => ['nullable', 'string', 'max:100'],
            'apartment'     => ['nullable', 'string', 'max:100'],
        ]);

        $customer = Customer::create([
            'name'     => $data['name'],
            'username' => $data['username'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'password' => $data['password'],
        ]);

        $customer->addresses()->create([
            'governorate_id' => $data['governorate_id'],
            'street'         => $data['street'],
            'city'           => $data['city'] ?? null,
            'building'       => $data['building'] ?? null,
            'apartment'      => $data['apartment'] ?? null,
            'is_default'     => true,
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->back()->with('customer_success', __('Welcome! Your account has been created.'));
    }

    // ─── Login ────────────────────────────────────────────────────────────────

    public function login(Request $request)
    {
        $request->validate([
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $login    = $request->input('login');
        $password = $request->input('password');

        // Try phone if all digits, otherwise username
        $field    = ctype_digit($login) ? 'phone' : 'username';
        $customer = Customer::where($field, $login)->first();

        if (! $customer || ! Hash::check($password, $customer->password)) {
            return back()->withErrors(['customer_login' => __('Invalid credentials.')]);
        }

        if (! $customer->is_active) {
            return back()->withErrors(['customer_login' => __('Your account has been deactivated.')]);
        }

        Auth::guard('customer')->login($customer, $request->boolean('remember'));

        return redirect()->back()->with('customer_success', __('Welcome back, :name!', ['name' => $customer->name]));
    }

    // ─── Logout ───────────────────────────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
