<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <h2>ID</h2>
                                </th>
                                <th>
                                    <h2>Producto</h2>
                                </th>
                                <th>
                                    <h2>Precio</h2>
                                </th>
                                <th>
                                    <h2>&nbsp;</h2>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nom_product }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input 
                                        type="submit" 
                                        value="Eliminar"
                                        class="btn btn-sm btn-warning"
                                        onclick="return confirm('¿Desea eliminar a: {{ $product->nom_product }}?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if($errors->any())
                            <div class= "alert alert-warning">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{ route('products.store') }}" method="POST">
                                <div class="form row">
                                    <div class="col-sm-5">
                                        <input type="text" name="nom_product" class="form-control" placeholder="Producto" value="{{ old('nom_product') }}">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" name="price" class="form-control" placeholder="Precio" value="{{ old('price') }}">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn-lg btn-success">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>