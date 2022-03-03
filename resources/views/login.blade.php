<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
   <form method="post" action="{{route('login_auth')}}">
       @csrf
       <label>Email</label>
       <input type="email" name="email" required><br><br>
       <label>Password</label>
       <input type="password" name="password" required>
       <div class="form-group row">
	
	<div class="col-md-6"> {!! htmlFormSnippet() !!} </div>
</div>
       <input type="submit" value="Login">
       <a href="registration">Register Here</a>
</form>
</body>
</html>