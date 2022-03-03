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
      @if($message = Session::get('success'))
      <strong>{{$message}}</strong>
      @endif
  <form action="email/send" method="POST" enctype="multipart/form-data">
  @csrf
  Your Name<input type="text" name="name"  class="form-control form-control-lg" required><br>
  Email Address<input type="email" name="email"  class="form-control form-control-lg" required><br>
  <!-- Email Subject<input type="text" name="mailSubject"  class="form-control form-control-lg" required><br> -->
  <label>Type Your Message Here</label><br>
  <textarea type="text" name="message" class="for-control form-control-lg" required></textarea>
  <input type="submit" name="submit" class="btn btn-primary btn-sm" value="send">
</form>
</body>
</html>
