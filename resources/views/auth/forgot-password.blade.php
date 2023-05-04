<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<style>
    * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: 'Montserrat', sans-serif;
	background: #314564;
}

.container {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}

.card {
	background: #fff;
	padding: 30px;
	border-radius: 10px;
	box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
	max-width: 400px;
	width: 100%;
	text-align: center;
}

h1 {
	font-size: 30px;
	margin-bottom: 30px;
	color: #314564;
}

form {
	display: flex;
	flex-direction: column;
}

input {
	padding: 10px;
	margin-bottom: 20px;
	border: none;
	border-radius: 5px;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	font-size: 16px;
}

button {
	background: #314564;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 5px;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	font-size: 16px;
	cursor: pointer;
	transition: all 0.3s ease;
}

button:hover {
	background: #26344b;
}

.forgot {
	margin-top: 20px;
	margin-bottom: 20px;
}

a {
	color: #314564;
	text-decoration: none;
	font-weight: bold;
}

.signup {
	margin-top: 20px;
}

  </style>
</head>
<body>
	<div class="container">
		<div class="card">
			<h1>reset password</h1>
            <form method="POST" action="{{ route('password.email') }}">
                @if (session("status"))
                  <div class="alert alert-success">{{session("status")}}</div>                    
                @endif
                @csrf
				<input placeholder="email@gmail.com" id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" required autofocus>
                @error("email")
                  <div class="m-2 text-danger">{{$message}}</div>                    
                @enderror
 				<button type="submit">Send message </button>
			</form>
		
		</div>
	</div>
</body>
</html>
