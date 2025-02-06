<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BkShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>



<section class="vh-100" style="background-color: #508bfc;">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">

                    <div class="card-body p-4">
                        <h4 class="text-center">Merchant Register</h4>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                            <div class="">
                                <label class="form-label"></label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Your Name" required>
                            </div>
                            <div class="">
                                <label class="form-label"></label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter Your Email" required>
                            </div>
                            <div class="">
                                <label class="form-label"></label>
                                <input type="text" name="shopname" class="form-control" id="address" value="{{ old('shopname') }}" placeholder="Enter Your Shop Name" required>
                            </div>
                            <!-- Password -->
                            <div class="">
                                <label for="password" class="form-label"></label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Shop Password" required>
                            </div>
                            &nbsp;
                            <div class="d-grid gap-1 col-5">
                                <button class="btn btn-primary btn-lg" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>
</html>



