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
                {{-- <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div> --}}
                <div class="col-md-8 col-lg-6 col-xl-4 mt-4 pb-4">
                    <h4 style="text-align: center; " class="pb-4">Welcome to your profile</h4>

                    <form action="{{ route('profile') }}" method="get">
                        <div class="col-md-9 col-lg-6 col-xl-5">
                            <img class="img-fluid"
                                style=" border-radius: 50%; align-content: center;margin-left:150px; "
                                src="/image/{{ $data->image }}">
                        </div>
                        <br>
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            <tbody>
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    {{-- <td>{{ $current_date }}</td> --}}


                                    <td><button class=" btn btn-danger "><a class="text-decoration-none text-light"
                                                href="logout">Logout</a></button> </td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>


                    </form>
                    {{-- @dd($data->attendance->isEmpty()); --}}
                    @if ( $data->attendance->isEmpty() || $data->attendance->last()->check_in_out == 'check_out' )
                        <form method="POST" class="mx-1 mx-md-4" action="{{ route('check_in') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <button class=" btn btn-success" name="time_in" onclick="dateIn()">Check
                                In</button>



                        </form>
                    @else
                        <form method="POST" class="mx-1 mx-md-4" action="{{ route('check_out') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <button class=" btn btn-danger" name="time_in" onclick="dateIn()">Check
                                out</button>



                        </form>
                    @endif


                    {{-- <button class=" btn btn-success" name="time_in" onclick="checkClick()">Check In</a></button>
                    <p id="test"></p>
                    <p id="test2"></p> --}}

                </div>
            </div>
        </div>
    </section>
    <script>
        // var date = new Date();

        // var day = date.getDate();
        // var month = date.getMonth() + 1;
        // var year = date.getFullYear();
        // var today = year + "-" + month + "-" + day;
        // document.getElementById('datePicker').value = today;

        var currentdate = new Date();
        var n = currentdate.getDate() + "/" +
            (currentdate.getMonth() + 1) + "/" +
            currentdate.getFullYear() + " @ " +
            currentdate.getHours() + ":" +
            currentdate.getMinutes() + ":" +
            currentdate.getSeconds();

        console.log(n);

        function dateIn() {

            document.getElementById("test").innerHTML = "check in " + " " + n;
        }

        function dateOut() {

            document.getElementById("test2").innerHTML = "check out " + " " + n;
        }
        // var clickCount = 0;

        // function checkClick() {
        //     var currentdate = new Date();
        //     var n = "check in: " + currentdate.getDate() + "/" +
        //         (currentdate.getMonth() + 1) + "/" +
        //         currentdate.getFullYear() + " @ " +
        //         currentdate.getHours() + ":" +
        //         currentdate.getMinutes() + ":" +
        //         currentdate.getSeconds();
        //     var out = "check out: " + currentdate.getDate() + "/" +
        //         (currentdate.getMonth() + 1) + "/" +
        //         currentdate.getFullYear() + " @ " +
        //         currentdate.getHours() + ":" +
        //         currentdate.getMinutes() + ":" +
        //         currentdate.getSeconds();
        //     // e.preventDefault();
        //     if (clickCount % 2 == 0) {
        //         document.getElementById("test").innerHTML = n;
        //     } else {
        //         document.getElementById("test2").innerHTML = out;
        //     }

        //     clickCount++
        // }

        // function dateOut() {
        //     var currentdate = new Date();
        //     var n = "Last Sync: " + currentdate.getDate() + "/" +
        //         (currentdate.getMonth() + 1) + "/" +
        //         currentdate.getFullYear() + " @ " +
        //         currentdate.getHours() + ":" +
        //         currentdate.getMinutes() + ":" +
        //         currentdate.getSeconds();
        //     document.getElementById("test2").innerHTML = n;
        // }
    </script>
</body>

</html>
