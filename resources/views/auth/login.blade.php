<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multiple Authentication</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="py-5 text-center">Multiple Authetication Login</h1>
        <div class="row">
            <div class="col-md-4 offset-md-4 col-12">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <label for="username">User Name</label>
                    <input type="text" class="form-control mb-2" name="username" id="username" value="{{ old('username') }}" placeholder="Usernaem">
                    <label for="password">password</label>
                    <input type="password" class="form-control mb-3" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                    <button type="submit" class="btn btn-info">login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>