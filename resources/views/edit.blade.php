<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>
    @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
</ul>
@endif  
    
<form action="update/{$product->id}" method="POST" enctype="multipart/form-data">
@csrf
   Name<input type="text" name="name"  class="form-control form-control-lg" type="text" value="{{$product->name}}"><br>
    City<input type="text" name="city"  class="form-control form-control-lg" type="text" value="{{$product->city}}"><br>
    Marks<input type="text" name="marks"  class="form-control form-control-lg" type="text" value="{{$product->marks}}"><br>
    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="insert">
    <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
    <input type="file" name="image" required>
    <label>choose file</label>
</form>
</body>
</html>
