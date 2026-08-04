<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\ProductPageSetting;

class ProductController extends Controller
{
    public function products()
    {
        $cat = Category::withCount(['subcategories', 'products'])
            ->orderBy('id', 'desc')
            ->get();
        Log::info($cat);

        $productPageSetting = ProductPageSetting::first();

        return view('products.products', compact('cat', 'productPageSetting')); // product.html page
    }

    public function generateSlugs()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if (! $product->title) {
                continue;
            }

            $baseSlug = Str::slug($product->title);
            $slug = $baseSlug;

            $count = 1;
            while (
                Product::query()->where('slug', $slug)
                ->where('id', '!=', $product->id)
                ->exists()
            ) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }

            $product->update([
                'slug' => $slug,
            ]);
        }

        return back()->with('success', 'All slugs generated successfully!');
    }

    public function displaycategory(Category $category)
    {
        $categories = Category::all();

        $subcategories = Subcategory::query()->where('category_id', $category->id)
            ->withCount('products')
            ->get();

        $products = collect();

        if (strtolower($category->name) === 'export zone') {
            $categoryIds = Category::query()->whereIn('name', ['Export Zone', 'AgroChemicals', 'Public Health Pesticides'], 'and', false)
                ->pluck('id');

            $subcategoryIds = $subcategories->pluck('id');

            $products = Product::query()->whereIn('category_id', $categoryIds, 'and', false)
                ->orWhereIn('subcategory_id', $subcategoryIds)
                ->latest()
                ->get();
        }
        // return $products;
        return view('products.category', compact('category', 'subcategories', 'products', 'categories')); // category.show
    }

    public function displaysubcategory($categorySlug, $subcategorySlug)
    {
        $categories = Category::all();
        $category = Category::query()->where('slug', $categorySlug)->firstOrFail();
        $subcategory = Subcategory::query()->where('slug', $subcategorySlug)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $products = Product::query()->where('subcategory_id', $subcategory->id)->get();

        return view('products.subcategory', compact('category', 'subcategory', 'products', 'categories'));  // subcategory.show
    }

    // public function displayproduct($categorySlug, $subcategorySlug, $productSlug)
    // {
    //     $categories = Category::with('subcategories')
    //         ->where('is_active', 'active')
    //         ->get();

    //     $product = Product::with(['subcategory.category', 'productUses'])
    //         ->where('slug', $productSlug)
    //         ->whereHas('subcategory', function ($q) use ($subcategorySlug) {
    //             $q->where('slug', $subcategorySlug);
    //         })
    //         ->whereHas('subcategory.category', function ($q) use ($categorySlug) {
    //             $q->where('slug', $categorySlug);
    //         })
    //         ->firstOrFail();
    //     $relatedProducts = Product::whereHas('subcategory', function ($q) use ($product) {
    //         $q->where('id', $product->subcategory->id);
    //     })
    //         ->where('id', '!=', $product->id)
    //         ->get();

    //     return view('products.product-detail', compact(
    //         'product',
    //         'categories',
    //         'categorySlug',
    //         'relatedProducts'
    //     )); // product.show
    // }

    public function displayproduct($categorySlug, $subcategorySlug = null, $productSlug)
    {
        $categories = Category::with('subcategories')
            ->where('is_active', 'active')
            ->get();

        $productQuery = Product::with(['subcategory.category', 'productUses'])
            ->where('slug', $productSlug)
            ->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });

        // Apply subcategory condition ONLY if not "default"
        if ($subcategorySlug !== 'default') {
            $productQuery->whereHas('subcategory', function ($q) use ($subcategorySlug) {
                $q->where('slug', $subcategorySlug);
            });
        }

        $product = $productQuery->firstOrFail();

        // Related Products
        if ($product->subcategory_id) {
            $relatedProducts = Product::query()->where('subcategory_id', $product->subcategory_id)
                ->where('id', '!=', $product->id)
                ->get();
        } else {
            $relatedProducts = Product::query()->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->get();
        }

        return view('products.product-detail', compact(
            'product',
            'categories',
            'categorySlug',
            'relatedProducts'
        ));
    }

    public function agroChemicals()
    {
        return view('products.agro-chemicals');
    }

    public function publicHealthPesticides()
    {
        return view('products.public-health-pesticides');
    }

    public function exportZone()
    {
        return view('products.export-zone');
    }

    public function search(Request $request)
    {
        $products = Product::with(['category', 'subcategory.category'])
            ->where(function ($q) use ($request) {
                $q->where('composition', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('title', 'LIKE', '%' . $request->search . '%');
            })
            ->limit(8)
            ->get();

        return response()->json($products);
    }

    public function lookup(Request $request)
    {
        $query = $request->q;

        $products = Product::with(['category', 'subcategory.category'])
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('composition', 'LIKE', "%{$query}%")
            ->limit(10)
            ->get();

        return response()->json($products);
    }
}
