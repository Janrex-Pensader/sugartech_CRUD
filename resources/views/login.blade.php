<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        #submit{
            width: 100%;
        }
        .mt-10{
            margin-top: 5rem;
        }
    </style>

</head>

<body>
    <div class="main">
        <section class="signup">

            <div class="shadow card col-3 mx-auto mt-10 p-3">
                <div class="container">
                    <div class="signup-content">
                        <form id="signup-form" class="signup-form" method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="text-center mt-3 mb-4">
                                <h1>LOGIN</h1>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                    id="email" placeholder="Your Email" />
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" />
                                <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            </div>
                            @error('email')
                                <div style="color: red">{{ $message }}</div>
                            @enderror

                            @error('password')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Sign in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>