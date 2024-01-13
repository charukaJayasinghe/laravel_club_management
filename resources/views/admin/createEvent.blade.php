@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Create Events</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="form-group pt-3 col-12">
                                <span class="h5 text2">Title</span>
                                <input type="text" id="title" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="h5 text2">Start Time</span>

                                <input type="text" id="stime" class="time-picker  form-control" name="2" value="00:00"
                                    readonly>

                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="h5 text2">End Time</span>
                                <input readonly type="text" id="etime" class="time-picker  form-control" name="2" value="00:00">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6" >
                                <span class="h5 text2">Date</span>
                                <input type="date" id="date" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="h5 text2">Location</span>
                                <input type="text" id="location" class="input form-control py-2">
                            </div>

                            <div class="form-group pt-3 col-12 ">
                                <span class="h3 text2">Description</span>
                                <textarea class="form-control  input" id="description" rows="10" name="content"></textarea>
                            </div>

                            <div class="form-group pb-1 pt-4  w-100 px-2 d-flex">
                                <button class="btn btn-secondary mr-2 " style="flex:1;font-size: 1.6rem;"
                                    onclick="location.reload();">Refresh</button>
                                <button class="btn btn-primary ml-2"  style="flex:1;font-size: 1.6rem;"
                                    onclick="adminMakeEvent();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    <script>

    </script>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/timePicker.css') }}">
@endsection
@section('bmodels')
    <script>

    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-timepicker.js') }}"></script>
    <script>

        $().ready(function(e) {
            $(".time-picker").hunterTimePicker();
        });
    </script>
@endsection
