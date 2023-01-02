<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/table.css') }} ">
    <title>Profile Page</title>
</head>
<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgb(101, 162, 246), rgb(133, 187, 253))
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

    <section class="vh-150 w-15" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100 w-100">
            <div class="row d-flex justify-content-center align-items-center h-200">
                <div class="col col-lg-14 mb-4 mb-lg-0 ">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <form action="{{ route('profile') }}" method="get">
                            <div class="row g-0">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white mb-4"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
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
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted">{{ $data->email }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Phone</h6>
                                                    <p class="text-muted">{{ $data->phone }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Adress</h6>
                                                    <p class="text-muted">{{ $data->adress }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Birth Date</h6>
                                                    <p class="text-muted">{{ $data->birthdate }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Hire Date</h6>
                                                    <p class="text-muted">{{ $data->date_hired }}</p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr class="tr_table">
                                        <th scope="col">Date</th>
                                        <th scope="col">attendance</th>
                                    </tr>
                                </thead>
                                @if ($data->attendance)
                                    @foreach ($attends as $attend)
                                        <tr>
                                            <td class="col-md-4">{{ $attend->time_in_out }}</td>
                                            <td class="col-md-4">{{ $attend->check_in_out }}</td>
                                    @endforeach
                                @else
                                    <td>null</td>
                                @endif
                                </tr>



                                </tbody>
                            </table>
                    </div>

                </div>

                {{-- <form action="{{ route('employee_paging') }}" method="get"> --}}

                <div class="mt-3 mb-4 pagging">{{ $attends->links() }} </div>

                </form>





            </div>
        </div>
        </div>
    </section>

</body>

</html>
