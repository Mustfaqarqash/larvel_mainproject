<<<<<<< HEAD
=======
<<<<<<< HEAD
{{--@extends('layouts.dashboard_master')--}}
{{--@section("headTitle", "Show Trip Info")--}}

{{--@section('content')--}}
{{--    <style>--}}
{{--        .fixed-size-img {--}}
{{--            height: 200px;--}}
{{--            object-fit: cover;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <!-- Recent Updates Section -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 grid-margin stretch-card">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="card-title">{{$trip->name}}</h4>--}}
{{--                            <div class="d-flex mb-3">--}}

{{--                                <div class="d-flex align-items-center text-muted font-weight-light">--}}
{{--                                    <span>start:{{date('y/m/d' , strtotime($trip->start_at))}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex align-items-center text-muted font-weight-light">--}}
{{--                                    <span>|end:{{date('y/m/d' , strtotime($trip->start_at))}}</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Trip Images Section -->--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-6 pe-1">--}}
{{--                                    @foreach($tripImages->take(2) as $tripimag)--}}
{{--                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <div class="col-6 ps-1">--}}
{{--                                    @foreach($tripImages->skip(2)->take(2) as $tripimag)--}}
{{--                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Update Description Section -->--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Recent Tickets Section -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 grid-margin">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="card-title">Recent Tickets</h4>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-striped">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th> Assignee </th>--}}
{{--                                        <th> Subject </ th>--}}
{{--                                        <th> Gender </th>--}}
{{--                                        <th> Age </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($tripGuids as $tripGuid)--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <img src="{{ asset($tripGuid->image) }}" class="img-fluid rounded-circle me-2" alt="Guide Image" style="width: 40px; height: 40px;">--}}
{{--                                                {{ $tripGuid->name }}--}}
{{--                                            </td>--}}
{{--                                            <td> {{ $tripGuid->description }} </td>--}}
{{--                                            <td> {{ $tripGuid->gender }} </td>--}}
{{--                                            <td> {{ $tripGuid->age }} </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Action Buttons -->--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <a href="{{ route('guides.index') }}" class="btn btn-light">Back to List</a>--}}
{{--                <div>--}}
{{--                    <a href="" class="btn btn-warning">Edit</a>--}}
{{--                    <form action="" method="POST" class="d-inline-block">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends("layouts/user_side_master")
@section("pagename" , "Trip Details")
@section("login_active" , "active")
@section("content")
    <!-- Trip Details Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <!-- Trip Images -->
                <div class="col-lg-6">
                    <div id="tripCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($tripImages as $index => $tripImage)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($tripImage->image) }}" class="d-block w-100 rounded" alt="Trip Image" style="height: 400px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#tripCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#tripCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Trip Details -->
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded">
                        <h2 class="mb-3">{{ $trip->name }}</h2>
                        <div class="mb-4">
                            <span class="me-2"><strong>Start Date:</strong> {{ date('Y/m/d', strtotime($trip->start_at)) }}</span><br>
                            <span class="me-2"><strong>End Date:</strong> {{ date('Y/m/d', strtotime($trip->end_at)) }}</span>
                        </div>
                        <h5 class="mb-3">Description:</h5>
                        <p>{{ $trip->description }}</p>

                        <h5 class="mb-3">Guide Information:</h5>
                        <div class="row">
                            @foreach($tripGuids as $guide)
                                <div class="col-md-6 mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($guide->image) }}" class="img-fluid rounded-circle me-3" alt="Guide Image" style="width: 60px; height: 60px;">
                                        <div>
                                            <p class="mb-1"><strong>{{ $guide->name }}</strong></p>

                                            <small class="text-muted">{{ $guide->gender }}, {{ $guide->age }} years old</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trip Details End -->
=======
>>>>>>> main
@extends('layouts.dashboard_master')
@section("headTitle", "Show Trip Info")

@section('content')
    <style>
        .fixed-size-img {
            height: 200px;
            object-fit: cover;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <!-- Recent Updates Section -->
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{$trip->name}}</h4>
                            <div class="d-flex mb-3">

                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <span>start:{{date('y/m/d' , strtotime($trip->start_at))}}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <span>|end:{{date('y/m/d' , strtotime($trip->start_at))}}</span>
                                </div>
                            </div>

                            <!-- Trip Images Section -->
                            <div class="row">
                                <div class="col-6 pe-1">
                                    @foreach($tripImages->take(2) as $tripimag)
                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                    @endforeach
                                </div>
                                <div class="col-6 ps-1">
                                    @foreach($tripImages->skip(2)->take(2) as $tripimag)
                                        <img src="{{ asset($tripimag->image) }}" class="img-fluid mb-2 w-100 rounded fixed-size-img" alt="Trip Image">
                                    @endforeach
                                </div>
                            </div>

                            <!-- Update Description Section -->

                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Tickets Section -->
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Tickets</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Assignee </th>
                                        <th> Subject </ th>
                                        <th> Gender </th>
                                        <th> Age </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset($tripGuids->image) }}" class="img-fluid rounded-circle me-2" alt="Guide Image" style="width: 40px; height: 40px;">
                                            {{ $tripGuids->name }}
                                        </td>
                                        <td> {{ $tripGuids->description }} </td>
                                        <td> {{ $tripGuids->gender }} </td>
                                        <td> {{ $tripGuids->age }} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('guides.index') }}" class="btn btn-light">Back to List</a>
                <div>
                    <a href="" class="btn btn-warning">Edit</a>
                    <form action="" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
>>>>>>> 7cb0ed37abfae3e3330789c8e117517d8cb8e5d7
>>>>>>> main
@endsection
