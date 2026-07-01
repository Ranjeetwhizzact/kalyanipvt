<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blog = Blog::orderBy('id', 'desc')->paginate(15);

        return view('admin.blog.index', ['blog' => $blog]);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = User::all();

        return view('admin.blog.create', compact('categories', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'nullable|string',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'author_id' => 'required',
            'category_id' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|string',
        ]);

        // ✅ 2. Slug Generate
        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$count++;
        }

        // ✅ 3. Image Upload
        $imageName = null;

        if ($request->hasFile('featured_image')) {

            $file = $request->file('featured_image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('featured_image');

            $file->move($destinationPath, $fileName);

            $imageName = 'featured_image/'.$fileName;
        }

        // ✅ 4. Reading Time Auto Calculate
        $wordCount = str_word_count(strip_tags($request->blog_content));
        $readingTime = ceil($wordCount / 200);

        // ✅ 5. Save Blog
        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'featured_image' => $imageName,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'reading_time' => $readingTime,
            'status' => 'published',
            'is_active' => $request->input('is_active', 'active'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog Post Created Successfully!');
    }

    public function delete($id)
    {
        $blog_id = decrypt($id);
        $blog = Blog::findOrFail($blog_id);
        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog Post Deleted Successfully!');
    }

    public function edit($id)
    {
        $blog_id = decrypt($id);
        $blog = Blog::findOrFail($blog_id);
        $categories = Category::all();
        $authors = User::all();

        return view('admin.blog.edit', compact('blog', 'categories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'nullable|string',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'author_id' => 'required',
            'category_id' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|string',
        ]);

        // ✅ 2. Slug Generate
        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->where('id', '<>', $id)->exists()) {
            $slug = $originalSlug.'-'.$count++;
        }

        // ✅ 3. Image Upload
        if ($request->hasFile('featured_image')) {

            // Delete old image if exists
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }

            $file = $request->file('featured_image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('featured_image');

            $file->move($destinationPath, $fileName);

            $blog->featured_image = 'featured_image/'.$fileName;
        }

        // ✅ 4. Reading Time Auto Calculate
        $wordCount = str_word_count(strip_tags($request->content));
        $readingTime = ceil($wordCount / 200);

        // ✅ 5. Update Blog
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id,
            'reading_time' => $readingTime,
            'status' => 'published',
            'is_active' => $request->input('is_active', 'active'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog Post Updated Successfully!');
    }
}
