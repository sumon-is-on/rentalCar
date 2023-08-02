
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
                        <h4 class="text-center mb-4">Registration for CarBook</h4>
                        <form action="{{ route('user.registration.post') }}" method="POST" class="login-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control rounded-left" placeholder="Yourname" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control rounded-left" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="block mb-2  font-medium text-gray-900 dark:text-white">Image</label>
                                <input type="file" name="image" id="image" aria-describedby="image-explanation">
                            </div>
                            <div class="form-group">
                                <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-white">Registration AS:</label>
                                <select name="role_id" id="role_id" class="form-control">
                                  @foreach ($roles as $role)
                                  <option
                                   name="role_id" value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach
                              </select>
                           </div>
                            <div class="form-group d-flex">
                                <input type="text" name="address" class="form-control rounded-left" placeholder="Address" >
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
