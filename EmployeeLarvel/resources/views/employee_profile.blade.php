<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Profile Page</title>
</head>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        /* background: #f6d365; */
        /* width: 40%;
        align-content: center; */

        /* Chrome 10-25, Safari 5.1-6 */
        /* background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1)); */

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        /* background: linear-gradient(to right bottom, rgb(101, 162, 246), rgb(133, 187, 253)) */
    }

    img {
        border-radius: 55px;
    }

    h5 {
        color: black;
    }

    h6 {
        font-weight: bold;
    }

    .tr_table {
        color: black;
        font-weight: bold;
        border: black;
        font-size: 16px;
        background-color: #f6d365;
    }

    a {
        text-decoration: none;


    }
</style>

<body>

    <section class="vh-150 w-15">
        <div class="container py-5 h-100 w-10">
            <div class="row d-flex justify-content-center align-items-center h-200">
                <div class="col col-lg-14 mb-4 mb-lg-0 ">
                    <div class=" " style="border-radius: .5rem;">
                        <form action="{{ route('profile') }}" method="get">
                            <div class="row g-0">
                                <div class=" gradient-custom text-center text-white align-items-center mb-4"
                                    style="">
                                    <img src="/image/{{ $data->image }}" class="img-fluid my-5"
                                        style="width: 150px;" />
                                    <a href="show_user_details">
                                        <h5>{{ $data->name }}</h5>
                                    </a>
                                    @if ($data->position)
                                        <h5 style="color: #f0c538;">{{ $data->position->title }}</h5>
                                    @else
                                        <td> -- </td>
                                    @endif
                                    <i class="far fa-edit mb-5"></i>
                                    <button class=" btn btn-danger mb-2"><a class="text-decoration-none text-light"
                                            href="logout">Logout</a></button>

                        </form>

                        {{-- @dd($data->attendance->isEmpty()); --}}
                        {{-- @dd($data->attendance->isEmpty()); --}}
                        @if ($data->attendance->isEmpty() || $data->attendance->last()->check_in_out == 'check_out')
                            <form method="POST" class="mx-1 mx-md-4" action="{{ route('check_in') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <button class=" btn btn-success" name="time_in" onclick="dateIn()">Check
                                    In</button>
                                {{-- <p style="color: black;">last check out at {{ $data->attendance->last()->time_in_out }} --}}
                                {{-- </p> --}}


                            </form>
                        @else
                            <form method="POST" class="mx-1 mx-md-4" action="{{ route('check_out') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <button class=" btn btn-danger" name="time_in" onclick="dateIn()">Check
                                    out</button>

                                <p style="color: black;">last check In at {{ $data->attendance->last()->time_in_out }}
                                </p>

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

</body>

</html>
