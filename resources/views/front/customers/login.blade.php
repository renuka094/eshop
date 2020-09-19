@include('layouts.front.app')

@section('content')
  <h1>Register</h1>
  <p>Create an account in our demo store.</p>
  <form class="pure-form pure-form-stacked" action="{{route('login')}}" method="post">
    @csrf
    <label for="email">Email Address</label>
    <input type="email" name="email" required>
	

    <label for="password">Password</label>
    <input type="password"  name="password" required>

    <input class="pure-button pure-button-primary" type="submit" value="Login">
  </form>
  <p>Create new account <a href="{{route('register')}}" class="text-primary">Click here</a></p>
@endsection


<html>
<head>
  <title>FusionAuth Laravel Demo</title>
  <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.1/build/pure-min.css">
</head>
<body>
<div class="pure-g" style="justify-content: center;">
  <div class="pure-u-1-3">
    @yield('content')
  </div>
</div>
</body>
</html>