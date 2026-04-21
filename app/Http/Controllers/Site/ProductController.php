<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        abort_if(! $product->is_active, 404);

        $product->load(['images', 'sizes', 'category', 'brand']);

        // Products from the same category, excluding current
        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->with(['images', 'sizes'])
            ->inRandomOrder()
            ->take(8)
            ->get();

        // Recently viewed — stored in session as array of IDs
        $viewedIds = session('recently_viewed', []);
        $recentProducts = collect();
        if (!empty($viewedIds)) {
            $recentProducts = Product::where('is_active', true)
                ->whereIn('id', $viewedIds)
                ->where('id', '!=', $product->id)
                ->with(['images', 'sizes'])
                ->get()
                ->sortBy(fn($p) => array_search($p->id, $viewedIds));
        }

        // Push current product to recently viewed (max 12)
        $viewedIds = array_values(array_unique(array_merge([$product->id], $viewedIds)));
        session(['recently_viewed' => array_slice($viewedIds, 0, 12)]);

        return view('site.products.product-details', compact('product', 'relatedProducts', 'recentProducts'));
    }

    public function quickView(Product $product)
    {
        abort_if(! $product->is_active, 404);

        $product->load(['images', 'sizes']);

        $images      = $product->images->map(fn ($img) => ['url' => $img->url]);
        $colorImages = $product->colorImages()->map(fn ($img) => [
            'id'         => $img->id,
            'url'        => $img->url,
            'color_name' => $img->color_name,
            'color_hex'  => $img->color_hex,
        ])->values();
        $sizes = $product->sizes->map(fn ($s) => ['id' => $s->id, 'name' => $s->name]);

        return response()->json([
            'id'          => $product->id,
            'name'        => $product->name,
            'slug'        => $product->slug,
            'price'       => number_format($product->price, 2),
            'sale_price'  => $product->sale_price ? number_format($product->sale_price, 2) : null,
            'description' => $product->description,
            'images'      => $images,
            'colors'      => $colorImages,
            'sizes'       => $sizes,
            'url'         => route('product.show', $product->slug),
        ]);
    }


    public function shop(\Illuminate\Http\Request $request)
    {
        $categories = \App\Models\Category::where('is_active', true)
            ->orderBy('sort_order')->get();

        $query = Product::where('is_active', true)
            ->with(['images', 'sizes']);

        // Filter by category slug
        if ($request->filled('category')) {
            $cat = $categories->firstWhere('slug', $request->category);
            if ($cat) {
                $query->where('category_id', $cat->id);
            }
        }

        // Filter by price
        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        // Filter by size (array)
        $sizes = array_filter((array) $request->input('size', []));
        if (!empty($sizes)) {
            $query->whereHas('sizes', fn($q) => $q->whereIn('name', $sizes));
        }

        // Filter by color (array)
        $colors = array_filter((array) $request->input('color', []));
        if (!empty($colors)) {
            $query->whereHas('images', fn($q) => $q->whereIn('color_name', $colors));
        }

        // Sort
        switch ($request->sort) {
            case 'price-low-high':  $query->orderBy('price');      break;
            case 'price-high-low':  $query->orderByDesc('price');   break;
            case 'a-z':             $query->orderBy('name');        break;
            case 'z-a':             $query->orderByDesc('name');    break;
            default:                $query->latest();               break;
        }

        $products = $query->paginate(12)->withQueryString();

        // product counts per category (for sidebar)
        $categoryCounts = \App\Models\Product::where('is_active', true)
            ->selectRaw('category_id, count(*) as total')
            ->groupBy('category_id')
            ->pluck('total', 'category_id');

        // all available sizes (for filter)
        $allSizes = \App\Models\ProductSize::select('name')
            ->distinct()
            ->orderBy('sort_order')
            ->pluck('name');

        // all available colors (for filter)
        $allColors = \App\Models\ProductImage::whereNotNull('color_name')
            ->whereNotNull('color_hex')
            ->select('color_name', 'color_hex')
            ->distinct()
            ->orderBy('color_name')
            ->get();

        // price range (single query)
        $priceRange = Product::where('is_active', true)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();
        $priceMin = (int) ($priceRange->min_price ?? 0);
        $priceMax = (int) ($priceRange->max_price ?? 9999);

        // gallery images for sidebar
        $galleryImages = \App\Models\GalleryImage::where('is_active', true)
            ->orderBy('sort_order')->take(6)->get();

        return view('site.products.shop', compact(
            'products', 'categories', 'categoryCounts',
            'allSizes', 'allColors', 'priceMin', 'priceMax',
            'galleryImages'
        ));
    }
}
