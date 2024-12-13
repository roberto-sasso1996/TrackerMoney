<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/form.css' , 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <title>Welcome</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justift-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="main">  	
                    <input type="checkbox" id="chk" aria-hidden="true">
            
                        <div class="signup">
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <label for="chk" aria-hidden="true">Sign up</label>
                                <input type="text" placeholder="User name" required="" name="name" >
                                <input type="email"  placeholder="Email" required="" name="email">
                                <input type="password" placeholder="Password" required="" name="password">
                                <input type="password" placeholder="Password Confirmation" required="" name="password_confirmation">
                                <button>Sign up</button>
                            </form>
                        </div>
            
                        <div class="login">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <label for="chk" aria-hidden="true">Login</label>
                                <input type="email" placeholder="Email" required="" name="email">
                                <input type="password" placeholder="Password" required="" name="password">
                                <button>Login</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>