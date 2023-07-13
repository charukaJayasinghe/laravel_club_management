@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Approve Users</span>
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
                        <thead class="back">
                            <tr class="textOther">
                                <th scope="col"># </th>

                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Addno</th>
                                <th scope="col">Class</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userBody">



                            @foreach ($data as $data)
                                @if ($data->user_approvement_id == '2')
                                    <?php continue; ?>
                                @endif
                                <tr class="text2 Trow userRow">
                                    <td scope="row">{{ $data->id }}</td>

                                    <td style=" vertical-align: middle;">{{ $data->full_name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->mobile }}</td>
                                    <td>{{ $data->addno }}</td>
                                    <td>{{ $data->class_room->grade->name }} - {{ $data->class_room->name }}</td>
                                    <td class="row">
                                        <div class="col-6">
                                            {{-- <button class="btn btn-danger w-100">Block <i class="fa-solid fa-ban"></i></button> --}}


                                            <button onclick="approveUser({{ $data->id }});"
                                                class="btn py-2 btn-success rounded-1 col"><span class="h4 text-white"
                                                    style="font-size: 20px">Approve</span> <i
                                                    class="h5 bi bi-check-circle-fill text-white "></i></button>

                                        </div>
                                        <div class="col-6">
                                            <button style="font-size: 20px"
                                                class="btn py-2 buttonYellow rounded-1 col text-dark"><span>Disapprove</span>
                                                <i class="bi bi-x-circle-fill"></i></button>
                                            {{-- <button class="btn btn-primary w-100">More <i class="fa-sharp fa-solid fa-circle-info"></i></button> --}}
                                        </div>


                                    </td>
                                </tr>
                            @endforeach





                        </tbody>
                    </table>
                @else
                    <table class="table">
                        <thead class="back">
                            <tr class="textOther">
                                <th scope="col">#</th>

                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Addno</th>
                                <th scope="col">Class</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <h1 class="fs-1 text-center text2">No Users To Approve</h1>
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
