<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ProductUses;

class ProductContorller extends Controller
{
    public function create(Request $request){
        $category = Category::where('name', '<>', null)->orderBy('id', 'desc')->paginate(15);
        return view('admin.products.create',["category" =>$category]);
    }
    public function edit($id)
    {
        $product = Product::find(decrypt($id));
        if ($product) {
            $packingArray = json_decode($product->packing, true);
            if (is_array($packingArray)) {
                $packingString = implode(", ", $packingArray);
            } else {
                $packingString = ''; 
            }
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
        $category = Category::where('name', '<>', null)->orderBy('id', 'desc')->paginate(15);

        return view('admin.products.create', [
            "product" => $product,
            "packingString" => $packingString, // Add this to pass the packing string to the view
            "category" => $category
        ]);
    }

   
    public function getSubcategories(Request $request)
    {
        $categoryId = $request->category_id;
        if ($categoryId) {
            $subcategories = Subcategory::where('category_id', $categoryId)->get();
            return response()->json($subcategories);
        } else {
            return response()->json(['error' => 'Category ID is required'], 400);
        }
    }
    
    public function store(Request $request)
    {
        if (isset($request->id) && ($request->id != null || $request->id != "")) {
            $product = Product::find($request->id);
        } else {
            $product = new Product;
        }
    
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $destinationPath = public_path() . '/product/';
            $request->file('image')->move($destinationPath, $fileName);
            $product->image = '/product/' . $fileName;
        }
        if($request->hasFile('brochure')){
            $fileName = time() . $request->file('brochure')->getClientOriginalName();
            $destinationPath = public_path() .'/product_brochre/';
            $request->file('brochure')->move($destinationPath, $fileName);
            $product->brochure = '/product_brochre/'.$fileName;
        }
        $packageString = $request->input('packing');
        $packageArray = explode(',', $packageString);
        $packageArray = array_map('trim', $packageArray);
        $packageJson = json_encode($packageArray);
    
        // ✅ Fix: Don't overwrite the $product object
        $product->description = $request->description; 
        $product->title = $request->title;
        $slug = preg_replace('/[^a-z0-9\-\.]+/i', '-', $request->title);
       $product->slug = strtolower(trim($slug, '-'));
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->features = $request->input('features');
        $product->useage_type = $request->input('useage_type');
        $product->useage = $request->input('useage');
        $product->composition = $request->input('composition');
        $product->model_of_action = $request->input('model_of_action');
        $product->packing = $packageJson;
        $product->is_active = "active";
    
        $product->save();
    
        return back()->with(["status" => "success", "msg" => "Product created successfully"]);
    }
    
    public function destroy($id)
{
    $productId = decrypt($id);
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully.');
}
public function deletetable($id)
{
    $product_id = decrypt($id);
    $product = ProductUses::where('product_id', $product_id)->first();
    if (!$product) {
        return redirect()->back()->withErrors(['Product not found.']);
    }
   $product->delete();
    return redirect()->back()->with('success', 'Table is Deleted Successfully');
}

}
