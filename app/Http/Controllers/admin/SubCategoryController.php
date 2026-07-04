<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class SubCategoryController extends Controller
{
    //
    public function viewsubcategory()
    {
        $subcategory = Subcategory::where('name', '<>', null)->orderBy('id', 'desc')->paginate(10);
        return view('admin.subcategory.index', ['subcategory' => $subcategory]);
    }
    public function new()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.subcategory.create', ['category' => $category]);
    }
    public function edit(Request $request, $id)
    {
        $subcategory = Subcategory::find(decrypt($id));
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.subcategory.create', ['subcategory' => $subcategory, 'category' => $category]);
    }
    public function storesubcategory(Request $req)
    {
        if (isset($req->id) && ($req->id != null || $req->id != "")) {
            $subcategory = Subcategory::find($req->id);
        } else {
            $subcategory = new Subcategory;
        }
        if ($req->img) {
            $fileName = time() . $req->file('img')->getClientOriginalName();
            $destinationPath = public_path() . '/subcategory/';
            $req->file('img')->move($destinationPath, $fileName);
            $subcategory->img = '/subcategory/' . $fileName;
        }
        if ($req->icon) {
            $fileName = time() . $req->file('icon')->getClientOriginalName();
            $destinationPath = public_path() . '/subcaticon/';
            $req->file('icon')->move($destinationPath, $fileName);
            $subcategory->icon = '/subcaticon/' . $fileName;
        }

        $subcategory->name = $req->name;
        $slug = preg_replace('/[^a-z0-9\-\.]+/i', '-', $req->name);
        $subcategory->slug = strtolower(trim($slug, '-'));
        $subcategory->category_id = $req->category_id;
        $subcategory->short_discription = $req->short_discription;
        $subcategory->discription = $req->discription;
        $subcategory->is_active = $req->is_active;
        $subcategory->save();

        if (isset($req->id) && ($req->id != null || $req->id != "")) {
            return redirect()->back()->with("success", ".$req->name. 'is Updated successfully'");
        }
        return redirect()->back()->with('success', 'category is add successfully');
    }
    public function getAllsubcatgeory()
    {
        $subcategory = Subcategory::whereNotNull('name')
            ->orderBy('id', 'asc')
            ->select('id', 'name', 'category_id')
            ->get();
        return response()->json($subcategory);
    }
    public function distory(Request $req, $id)
    {
        $subcategory = Subcategory::find(decrypt($req->id));
        if ($subcategory) {
            $subcategory->delete();
        }
        return redirect()->back()->with("success", "Subcategory is deleted successfully");
    }
    // api start
    public function getSubcategoryById(Request $req, $id)
    {
        $sortOrder = $req->input('sort', 'asc');
        $searchQuery = $req->input('search', '');

        // Fetch the subcategory details along with category name and icon
        $subcategory = DB::table('subcategory')
            ->join('categories', 'subcategory.category_id', '=', 'categories.id')
            ->select(
                'subcategory.id as subcat_id',
                'subcategory.name as subcat_name',
                'subcategory.category_id as category_id',
                'subcategory.img as subcat_img',
                'subcategory.icon as subcat_icon',
                'subcategory.discription as subcat_discription',
                'categories.name as category_name',  // Fetch category name
                'categories.icon as category_icon'   // Fetch category icon
            )
            ->where('subcategory.id', $id)
            ->first(); // Fetch a single record

        if (!$subcategory) {
            return response()->json(['message' => 'Subcategory not found'], 404);
        }

        // Fetch all products under this subcategory
        $products = DB::table('product_list')
            ->where('subcategory_id', $id)
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('title', 'LIKE', "%$searchQuery%");
            })
            ->orderBy('title', $sortOrder)
            ->select(
                'id as product_id',
                'title as product_name',
                'image as product_image',
                'composition as composition'
            )
            ->get();

        // Attach products to the subcategory response
        $subcategory->products = $products;

        return response()->json($subcategory);
    }

    public function getAllproducts(Request $req, $id)
    {
        $sortOrder = $req->input('sort', 'asc'); // Sorting order (asc/desc)
        $searchQuery = $req->input('search', '');
        $category = Category::where('id', $id)->select('id', 'name', 'discription', 'img')->first();

        $products = Product::select('id', 'title', 'image', 'composition')
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('title', 'LIKE', "%{$searchQuery}%");
            })
            ->orderBy('title', $sortOrder)
            ->get();

        return response()->json([
            'category' => $category,
            'products' => $products,

        ]);
    }
    // api end
}
