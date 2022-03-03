
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .navbar{
                justify-content:space-around;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="d-flex navbar navbar-expand-lg navbar-light bg-light">
                <a href="" class="navbar-brand">Admin Panel</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                    </li>
                </ul>
            </nav>
            <a href="add" class="btn btn-primary btn-sm mb-2">Insert User</a>
            <a href="email" class="btn btn-primary btn-sm mb-2">Send Mail</a>
            <tr>
            <table class="table table-dark table-bordered">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">city</th>
                    <th scope="col">marks</th>
                    <th scope="col">image</th>
                    <th scope="col">action</th>
                </tr>   
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->city}}</td>
                        <td>{{$product->marks}}</td>
                        <td>  <img src="{{asset('/images/'.$product->image)}}" width="100px"></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">view</a>
                            <a href="edit/{{$product->id}}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete/{{$product->id}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>    
    </body>
</html>
