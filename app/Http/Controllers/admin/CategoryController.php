<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function viewcategory(){
        $category = Category::where('name', '<>',null)->orderBy('id', 'desc')->paginate(10);
        // dd($category);
       return view('admin.category.index',['category'=>$category]);
    }
    public function newcategory(){
        return view('admin.category.create');
    }
    public function edit(Request $request,$id){
        $category = Category::find(decrypt($id));
        return view('admin.category.create',['category'=>$category]);
    }
    public function storecategory(Request $req){
        if (isset($req->id) && ($req->id != null || $req->id != "")) {
            $category = Category::find($req->id);
         }else{
            $category = new Category;
        }
        if($req->img){
            $fileName = time() . $req->file('img')->getClientOriginalName();
            $destinationPath = public_path() . '/category/';
            $req->file('img')->move($destinationPath, $fileName);
            $category->img = '/category/' . $fileName;
        }
        if($req->file('icon')){
            $fileName = time() . $req->file('icon')->getClientOriginalName();
            $destinationPath = public_path() . '/categoryicon/';
            $req->file('icon')->move($destinationPath, $fileName);
            $category->icon = '/categoryicon/' . $fileName;
        }

        $category->name = $req->name;
        $slug = preg_replace('/[^a-z0-9\-\.]+/i', '-', $req->name);
        $category->slug = strtolower(trim($slug, '-'));
        $category->short_discription =$req->short_discription;
        $category->discription =$req->discription;
        $category->is_active = $req->is_active;
        $category->save();
   
        if (isset($req->id) && ($req->id != null || $req->id != "")) {
            return redirect()->back()->with('success',".$req->name. 'is Updated successfully'");
        }
        return redirect()->back()->with('success','category is add successfully');
    }
    public function distory(Request $req,$id){
        $category = Category::find(decrypt($id));
        $category->delete();
        return redirect()->back()->with("success","category is deleted successfully");
    }

    // Api start
    public function getcategory(){
        $categories = Category::get();
        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }
public function getCategoriesWithSubcategories()
{
    // Fetch categories with their subcategories
    $categories = DB::table('categories as c')
        ->leftJoin('subcategory as s', 'c.id', '=', 's.category_id')
        ->select(
            'c.id as category_id',
            'c.name as category_name',
            'c.img as category_image',
            'c.icon as category_icon',
            's.icon as subcat_icon',
            'c.discription as discription',
            'c.short_discription as category_short_description',
            's.id as subcategory_id',
            's.name as subcategory_name'
        )
        ->get();

    // Get product counts per category_id
    $productCounts = DB::table('product_list')
        ->select('category_id', DB::raw('COUNT(*) as total_products'))
        ->groupBy('category_id')
        ->pluck('total_products', 'category_id');

    // Get total products overall
    $totalAllProducts = DB::table('product_list')->count();

    $result = [];

    foreach ($categories as $category) {
        if (!isset($result[$category->category_id])) {
            $result[$category->category_id] = [
                'category_id' => $category->category_id,
                'category_name' => $category->category_name,
                'category_icon' => $category->category_icon,
                'category_image' => $category->category_image,
                'category_discription' => $category->discription,
                'category_short_description' => $category->category_short_description,
                'subcategories' => [],
            ];
        }

        if ($category->subcategory_id) {
            $result[$category->category_id]['subcategories'][] = [
                'subcategory_id' => $category->subcategory_id,
                'subcategory_name' => $category->subcategory_name,
                'subcat_icon' => $category->subcat_icon,
            ];
        }
    }

    foreach ($result as $key => $item) {
        $totalSubcategories = count($item['subcategories']);
        $categoryProductCount = $productCounts[$item['category_id']] ?? 0;

        $result[$key]['total_subcategories'] = $totalSubcategories;

        // If no subcategories AND no products for this category, assign total products overall
        if ($totalSubcategories === 0 && $categoryProductCount === 0) {
            $result[$key]['total_products'] = $totalAllProducts;
        } else {
            $result[$key]['total_products'] = $categoryProductCount;
        }
    }

    return response()->json(array_values($result));
}




    public function getCategoryById(Request $req, $id)
    {
        // Get sorting order, default to ascending
        $sortOrder = $req->input('sort', 'asc'); // Accepts 'asc' or 'desc'
        
        // Get search query if provided
        $searchQuery = $req->input('search', '');
    
        // Fetch category details
        $category = DB::table('categories as c')
            ->select(
                'c.id as category_id',
                'c.name as category_name',
                'c.img as category_image',
                'c.icon as category_icon',
                'c.discription',
                'c.short_discription as category_short_description'
            )
            ->where('c.id', $id)
            ->first(); // Fetch single category
    
        // Return error if category not found
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
    
        // Fetch subcategories for the given category with sorting and search
        $subcategories = DB::table('subcategory')
            ->where('category_id', $id)
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('name', 'LIKE', "%$searchQuery%");
            })
            ->orderBy('name', $sortOrder) // Sort dynamically
            ->select(
                'id as subcat_id',
                'name as subcat_name',
                'short_discription as subcat_short_discription',
                'img as subcat_img',
                'discription as subcat_discription',
                DB::raw('(SELECT COUNT(*) FROM product_list WHERE product_list.subcategory_id = subcategory.id) as product_count') // Get product count
            )
            ->get();
    
        // Merge subcategories into the response
        $category->subcategories = $subcategories;
    
        return response()->json($category);
    }
    
    
    // Api end
}
