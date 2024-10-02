<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>
<section class="vh-100" style="background-color: #1572e8;">
    <div class="h-100 container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h1 class="mb-5">Login</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/Login" method="post">
                            @csrf
                            <div data-mdb-input-init class="form-outline mb-4"></div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="bintang@gmail" name="email" class="form-control">


                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" value="bintang">
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                                type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</body>

</html>
