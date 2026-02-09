@extends('layout.admin')
@section('content')
<table class="table m-1">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <th scope="row">{{ $product['id'] }}</th>
      <td>{{ $product['name'] }}</td>
      <td>{{ $product['price'] }}</td>
    </tr>
    @endforeach
  </tbody>
  <a href="/product/add" class="btn btn-primary m-1">Thêm sản phẩm</a>
</table>
@endsection