<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_delete', 0)->get();
        $title = 'Danh sách Danh mục';
        return view('category.index', compact('categories', 'title'));
    }

    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        $title = 'Thêm mới Danh mục';
        return view('category.create', compact('categories', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        
        $allCategories = Category::where('is_delete', 0)->get();
        
        $potentialParents = $allCategories->except($id);
        
        $descendantIds = $this->getAllDescendantIds($category);
        
        $categories = $potentialParents->whereNotIn('id', $descendantIds);

        $title = 'Sửa Danh mục';
        return view('category.edit', compact('category', 'categories', 'title'));
    }
    

    private function getAllDescendantIds($category) {
        $ids = collect();
        foreach ($category->children as $child) {
            $ids->push($child->id);
            $ids = $ids->merge($this->getAllDescendantIds($child));
        }
        return $ids;
    }
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        
         $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => [
                'nullable',
                'exists:categories,id',
                function ($attribute, $value, $fail) use ($category) {
                    if ($value == $category->id) {
                        $fail('Category cannot be its own parent.');
                    }
                    if ($value) {
                         $newParent = Category::find($value);
                         $descendantIds = $this->getAllDescendantIds($category);
                         if ($descendantIds->contains($value)) {
                             $fail('Cannot set a descendant as parent.');
                         }
                    }
                },
            ],
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete' => 1]);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
