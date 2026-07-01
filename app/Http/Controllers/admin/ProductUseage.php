<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductUses;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;


class ProductUseage extends Controller
{
    public function create(Request $request){
        return view('admin.productuseage.create');
    }
    public function store(Request $request)
    {
        if (isset($request->id) && ($request->id != null || $request->id != "")) {
           $product_attr  = ProductAttribute::find($request->id);
        } else {
            $product_attr = new ProductAttribute;
        }
        $product_attr->attribute_name = $request->input('attribute_name');             
        $product_attr->is_active = "active";  
        $product_attr->save();
        return back()->with(["status" => "success", "msg" => "Attribute created successfully"]);
    }
    public function createuesage(Request $request, $id){
        $product = Product::find(decrypt($id));
        $attribute = ProductAttribute::where('attribute_name', '<>', null)->orderBy('id', 'desc')->paginate(15);
        return view('admin.productuseage.createuesage',["attribute"=>$attribute,"product" => $product]);
    }
     public function editusage(Request $request, $id)
{
    $productId = decrypt($id);

    // Get product (uncomment if needed in view)
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->back()->with(['status' => "error", "msg" => "Product not found"]);
    }

    // Get product uses
    $productatt = ProductUses::where('product_id', $productId)->first();
    $productattributes = $productatt ? json_decode($productatt->attribute_value, true) : [];
// dd($productattributes);
    // List of all possible attribute names
    $attribute = ProductAttribute::whereNotNull('attribute_name')->orderBy('id', 'desc')->get();

    return view('admin.productuseage.createuesage', [
        'product' => $product,
        'productatt' => $productatt,
        'attribute' => $attribute,
        'productattributes' => $productattributes
    ]);
}
    public function saveusage(Request $request)
    {
        $request->validate([
            'attribute_name' => 'required|array',
            'attribute_name.*' => 'required|string',
            'attribute_value' => 'required|array',
            'attribute_value.*' => 'array',
            'attribute_value.*.*' => 'string|max:255',
        ]);
    
        $productuse = $request->id ? ProductUses::find($request->id) : new ProductUses;
        $productuse->product_id = $request->product_id;
    
        $attributeData = [];
    
        foreach ($request->attribute_name as $index => $attr_name) {
            if (isset($request->attribute_value[$index])) {
                $attributeData[$attr_name] = $request->attribute_value[$index];
            }
        }
    
        $productuse->attribute_value = json_encode($attributeData);
        $productuse->save();
    
        return back()->with(["status" => "success", "msg" => "Attributes saved successfully"]);
    }
    
    
    
    
    // api start
    public function getProductById($id)
    {
        // Find the main product
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Get category name if exists
        $category = $product->category_id ? Category::find($product->category_id) : null;
        $categoryName = $category?->name;
        // $categoryIcon = $category?->icon; // Assuming 'icon' is the column name
        
        $subcategory = $product->subcategory_id ? Subcategory::find($product->subcategory_id) : null;
        $subcategoryName = $subcategory?->name;
        // $subcategoryIcon = $subcategory?->icon;
    
        // Get at least 8 related products from the same subcategory
        $relatedProducts = Product::where('subcategory_id', $product->subcategory_id)
        ->where('id', '!=', $id) // Exclude the current product
        ->select('id', 'title', 'image','composition') // Select only required fields
        ->take(8) // Limit to 8 products
        ->get();
    
        // Get product usage data
        $productUsage = ProductUses::where('product_id', $id)
            ->orWhereJsonContains('attribute_value', (string) $id)
            ->get();
    
        $domainurl = 'kalyanidashboard.skilladders.com';
    
        return response()->json([
            'product' => $product,
            'product_usage' => $productUsage,
            'category_name' => $categoryName,
           
            // 'subcategoryIcon' => $subcategoryIcon,
            //  'categoryIcon' => $categoryIcon,
            'subcategory_name' => $subcategoryName,
            'related_products' => $relatedProducts, // Include related products
            'domainurl' => $domainurl,
        ]);
    }
    public function downloadBrochure($filename)
{
    $path = public_path("product/product_brochre/" . $filename);

    if (!file_exists($path)) {
        return response()->json(['message' => 'File not found'], 404);
    }

    return response()->download($path);
}
    // api end
    
}
