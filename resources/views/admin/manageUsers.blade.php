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
                        <span class="text2 h2">Search Users</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row py-4  ">
                    <div class="col-lg-6 col-12">
                        <input onkeyup="searchUser();" type="text" id="word" class="input form-control py-2"
                            placeholder="Search by Name, Mobile, Email">
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row d-flex flex-row justify-content-center ">
                            <div class="col-6  mt-lg-0 mt-2 ">
                                <select onchange="searchUser();" id="grade" class="form-control input">
                                    <option value="0"><span class="d-none d-lg-block">Select Grade</span> </option>
                                    @foreach ($grade as $grade)
                                        <option value="{{ $grade->name }}" ><span class="d-none d-lg-block">Grade</span>
                                            {{ $grade->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-6 mt-lg-0 mt-2">
                                <select onchange="searchUser();" id="class" class="form-control input">
                                    <option value="0"><span class="d-none d-lg-block">Select Class</span> </option>
                                    @foreach ($class as $class)
                                        <option value=" {{ $class->name }}" ><span class="d-none d-lg-block">class</span>
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
                    <tbody id="userBody">
                        @foreach ($data as $data)
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
                                        @if ($data->user_status->name == 'Active')
                                            <button onclick="blockUser({{ $data->id }});"
                                                class="btn py-2 buttonRed rounded-1 col"><span class="h4 textOther"
                                                    style="font-size: 20px">Block</span> <i
                                                    class="fa-solid textOther fa-ban"></i></button>
                                        @else
                                            <button onclick="blockUser({{ $data->id }});"
                                                class="btn py-2 buttonYellow rounded-1 col"><span class="h4 text-dark"
                                                    style="font-size: 20px">UnBlock</span> <i
                                                    class="h5 bi bi-check-circle-fill text-dark "></i></button>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <button style="font-size: 20px" onclick="showStudentDetails({{ $data->id }});"
                                            class="btn py-2 buttonBlue rounded-1 col textOther"><span>More</span> <i
                                                class="fa-sharp fa-solid  fa-circle-info"></i></button>
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
@section('bmodels')
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content backColor">
                <div class="modal-header">
                    <h5 class="modal-title text2" id="exampleModalLabel">User Data</h5>
                    <button class="btn closeButton" onclick="closeModel();"> <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-12 py-3 d-flex justify-content-center">
                            <img src="{{ asset('images/emptyUser.jpg') }}" class="img-thumbnail" style="height: 300px"
                                alt="">
                        </div>
                        <div class="col-12 px-lg-4">
                            <div class="row">

                                <div class=" py-3  col-12">
                                    <span class="h5 d-block text2">Full Name : </span>
                                    <input class=" input form-control" id="fullName" value="Charuka Jayasinghe" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Addno : </span>
                                    <input class=" input form-control" id="addno" type="number" value="25218" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Mobile : </span>
                                    <input class=" input form-control" id="mobile" value="0715518287" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Grade : </span>
                                    <input class=" input form-control" id="grade" value="12" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Class : </span>
                                    <input class=" input form-control" id="class" value="B" />
                                </div>
                                <div class=" py-3  col-12 ">
                                    <span class="h5 d-block text2">Address : </span>
                                    <input class=" input form-control" id="address" value="972/262,Annasiwaththa,Oruwala,Athurugiriya" />
                                </div>
                                <div class=" py-3  col-12 ">
                                    <span class="h5 d-block text2">Email : </span>
                                    <input class=" input form-control" id="email" value="charuka25218@gmail.com" />
                                </div>


                            </div>

                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="closeModel();">Close</button>
                    <button type="button" class="btn btn-primary">Edit Details</button>
                </div>
            </div>
        </div>
    </div>
@endsection
