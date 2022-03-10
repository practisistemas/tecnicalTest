<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3 ">
    <div class="card">
        <form action="{{ route('products.store') }}" method="POST">
            <div class="form-row">
                <div class="col-sm-3">
                    <label for="product_name" class="sr-only">Nombre Producto</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Nombre Producto">
                </div>
                <div class="col-sm-4">
                    <label for="product_price" class="sr-only">Password</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Precio">
                </div>
                <div class="col-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary mb-2">Crear</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_price}}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro que desea eliminar ?')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>