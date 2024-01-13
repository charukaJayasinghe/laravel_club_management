@extends('layouts.admin')
@section('adminDashboard')
<div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
    <div class="row">
        <div class="col-12 title">
            <span class="text2 h1">Manage Events</span>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <hr class=" borderOther ">
                </div>
            </div>
        </div>

        <div class="col-12 pt-5">
            @if (count($data) >= 1)
                <table class="table">

                    <div class="back w-100 px-2 py-3 mb-0   row textOther h5 text-center">
                        <div  class="d-none col-lg-1 col-2 d-lg-table-cell " >#</div>

                        <div class="col-4 col-lg-2" >Title</div>
                        <div class="col-4 col-lg-2" >Date</div>

                        <div  class="d-none d-lg-table-cell col-lg-2" >Time</div>
                        <div  class="d-none d-lg-table-cell col-lg-4">Description</div>
                        <div class="col-3 col-lg-1" >Action</div>
                    </div>
                    <div id="userBody">



                        @foreach ($data as $data)

                        <div class=" w-100 px-2 py-2  row text2  userRow Trow text-center" style="font-size: 1.1rem;">
                            <div class="d-none col-lg-1 col-2 d-lg-table-cell">{{ $data->id }}</div>
                            <div class="col-4 col-lg-2">{{ $data->title }}</div>
                            <div class="col-4 col-lg-2">{{ $data->date }}</div>
                           <div class="d-none d-lg-table-cell col-lg-2">
                            {{ substr($data->start_time, 0, -3) }} -
                            {{ substr($data->end_time, 0, -3) }}
                           </div>
                           <div class="d-none d-lg-table-cell col-lg-4">
                            {{$data->description}}
                           </div>
                           <div class=" col-3 col-lg-1 d-flex align-items-center justify-content-center" >
                             <button class="btn btn-danger" onclick="deleteEvent({{ $data->id }});" >Delete</button>
                           </div>
                        </div>

                        @endforeach

                    </div>
                </table>
            @else
                <table class="table">
                    <div class="back w-100 px-2 py-3 mb-0   row textOther h5 text-center">
                        <div  class="d-none col-lg-1 col-2 d-lg-table-cell " >#</div>

                        <div class="col-4 col-lg-2" >Title</div>
                        <div class="col-4 col-lg-2" >Date</div>

                        <div  class="d-none d-lg-table-cell col-lg-2" >Time</div>
                        <div  class="d-none d-lg-table-cell col-lg-4">Description</div>
                        <div class="col-3 col-lg-1" >Action</div>
                    </div>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <h1 class="fs-1 text-center text2">No Events to Manage</h1>
                            <td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>


    </div>
</div>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

