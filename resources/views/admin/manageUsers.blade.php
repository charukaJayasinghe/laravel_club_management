@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Manage Users</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <div class="row pt-lg-0 pt-3">
                    <div class="col-12">
                        <span class="text2 h2">Users</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row py-4  ">
                    <div class="col-lg-6 col-12">
                        <input type="text" id="name" class="input form-control py-2"
                            placeholder="Search by Name, Mobile, Email">
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row d-flex flex-row justify-content-center ">
                            <div class="col-6  mt-lg-0 mt-2 ">
                                <select id="grade" class="form-control input">
                                    <option value=""><span class="d-none d-lg-block">Grade</span> </option>
                                    @foreach ($grade as $grade)
                                        <option value="{{ $grade->id }}"><span class="d-none d-lg-block">Grade</span>
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-6 mt-lg-0 mt-2">
                                <select id="grade" class="form-control input">
                                    <option value=""><span class="d-none d-lg-block">Class</span> </option>
                                    @foreach ($class as $class)
                                        <option value="{{ $class->id }}"><span class="d-none d-lg-block">class</span>
                                            {{ $class->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-3">
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
                    <tbody id="Tbody">
                        @foreach ($data as $data )
                        <tr  class="text2 Trow userRow" >
                            <td scope="row">{{ $data->id }}</td>

                            <td style=" vertical-align: middle;">{{ $data->full_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->mobile }}</td>
                            <td>{{ $data->addno }}</td>
                            <td>{{ $data->class_room->grade->name }} - {{ $data->class_room->name }}</td>
                            <td class="row">
                                <div class="col-6">
                                    {{-- <button class="btn btn-danger w-100">Block <i class="fa-solid fa-ban"></i></button> --}}
                                    <button  class="btn py-2 buttonRed rounded-1 col"><span class="h4 textOther" style="font-size: 20px">Block</span>  <i class="fa-solid textOther fa-ban"></i></button>
                                </div>
                                <div class="col-6">
                                    <button style="font-size: 20px" class="btn py-2 buttonBlue rounded-1 col textOther" ><span >More</span> <i class="fa-sharp fa-solid fa-circle-info"></i></button>
                                    {{-- <button class="btn btn-primary w-100">More <i class="fa-sharp fa-solid fa-circle-info"></i></button> --}}
                                </div>


                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
