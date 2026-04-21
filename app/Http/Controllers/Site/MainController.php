<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sliders     = Slider::active()->ordered()->get();
        $categories  = Category::where('is_active', true)->orderBy('sort_order')->get();
        $brands      = Brand::where('is_active', true)->orderBy('sort_order')->get();
        $bestSellers = Product::where('is_active', true)
                              ->where('is_best_seller', true)
                              ->orderBy('sort_order')
                              ->with(['images', 'sizes'])
                              ->get();
        $galleryImages = GalleryImage::where('is_active', true)->orderBy('sort_order')->get();

        return view('index', compact('sliders', 'categories', 'brands', 'bestSellers', 'galleryImages'));
    }
}
