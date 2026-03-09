<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Danh sách Sản phẩm';
        $keyword = $request->get('keyword');
        $category_id = $request->get('category_id');

        $query = Product::where('is_delete', 0)->with('category');

        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $products = $query->get();
        $categories = Category::where('is_delete', 0)->get();

        return view('admin.product.index', compact('products', 'categories', 'title', 'keyword', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm mới Sản phẩm';
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.product.create', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'price'      => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock'      => 'required|integer|min:0',
            'category_id'=> 'nullable|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Sửa Sản phẩm';
        $product = Product::findOrFail($id);
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.product.edit', compact('product', 'categories', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'price'      => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'stock'      => 'required|integer|min:0',
            'category_id'=> 'nullable|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_delete' => 1]);

        return redirect()->route('products.index')->with('success', 'Xoá sản phẩm thành công.');
    }
}
