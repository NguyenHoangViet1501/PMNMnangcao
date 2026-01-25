<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="m-1">{{ $title }}</h1>

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
</body>
</html>