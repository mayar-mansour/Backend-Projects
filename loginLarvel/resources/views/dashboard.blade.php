<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h4>Welcome to your Dashborad</h4>
                    <hr>
                    <form action="{{ route('dashboard') }}" method="get">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            <tbody>
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>


                                    <td><button class=" btn btn-danger "><a class="text-decoration-none text-light"
                                                href="logout">Logout</a></button> </td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
