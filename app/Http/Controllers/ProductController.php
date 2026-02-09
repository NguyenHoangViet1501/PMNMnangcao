<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Routing\Middleware;


class ProductController extends Controller
{
    
    public function index()
    {
        $title = "Danh sách sản phẩm";
        return view('admin.product.index', ["title" => $title,
        'products'=>[
            ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 100000],
            ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 200000],
            ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 300000],
            ['id' => 4, 'name' => 'Sản phẩm 4', 'price' => 400000],
            ['id' => 5, 'name' => 'Sản phẩm 5', 'price' => 500000],
        ]
    ]);
    }

    public function detail( string $id = '123')
    {
        return view('product.detail', ['id' => $id]);
    }

    public function create()
    {
        return view('product.add');
    }
    public function store(Request $request)
    {
        return $request->all();
    }
}
