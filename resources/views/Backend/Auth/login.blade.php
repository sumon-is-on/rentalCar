
<!doctype html>
<html lang="en">
<head>
    <title>CarBook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <h4 class="text-center mb-4">Login for CarBook</h4>
                        <form action="{{ route('user.login.post') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                            <div class="form-group">
                                <p class="text-center">OR</p>
                            </div>
                            <div class="form-group">
                                <a href="">
                                    <button type="submit" class="form-control btn btn-success rounded submit px-3">Registration</button>
                                </a>
                            </div>

                            {{-- <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me<input type="checkbox" checked><span class="checkmark"></span></label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
