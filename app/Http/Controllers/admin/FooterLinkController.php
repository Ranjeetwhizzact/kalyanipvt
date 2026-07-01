<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    public function index()
    {
        $links = FooterLink::orderBy('column_group')->orderBy('sort_order')->get();
        return view('admin.footer-links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.footer-links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'url'          => 'required|string|max:255',
            'column_group' => 'required|in:1,2',
            'sort_order'   => 'nullable|integer',
            'is_active'    => 'required|in:0,1',
        ]);

        FooterLink::create($request->only('title', 'url', 'column_group', 'sort_order', 'is_active'));

        return redirect()->route('admin.footer-links.index')->with('success', 'Footer link added successfully.');
    }

    public function edit($id)
    {
        $link = FooterLink::findOrFail(decrypt($id));
        return view('admin.footer-links.edit', compact('link'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'url'          => 'required|string|max:255',
            'column_group' => 'required|in:1,2',
            'sort_order'   => 'nullable|integer',
            'is_active'    => 'required|in:0,1',
        ]);

        $link = FooterLink::findOrFail(decrypt($id));
        $link->update($request->only('title', 'url', 'column_group', 'sort_order', 'is_active'));

        return redirect()->route('admin.footer-links.index')->with('success', 'Footer link updated successfully.');
    }

    public function destroy($id)
    {
        FooterLink::findOrFail(decrypt($id))->delete();
        return redirect()->route('admin.footer-links.index')->with('success', 'Footer link deleted successfully.');
    }
}
