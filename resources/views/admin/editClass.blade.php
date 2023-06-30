@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Manage Classes</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <div class="row  flex-lg-row flex-column-reverse">
                    <div class="col-12 col-lg-6 pt-lg-3 pt-5">
                        <div class="row pt-lg-0 pt-3">
                            <div class="col-12">
                                <span class="text2 h2">Classes</span>
                            </div>
                            <div class="col-12 pt-3">
                                <table class="table">
                                    <thead class="back">
                                        <tr class="textOther">
                                            <th scope="col">#</th>

                                            <th scope="col">Grade</th>
                                            <th scope="col">Class</th>
                                            <th scope="col">Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Tbody">
                                        @if (count($data) < 1)
                                          <span class="h4 text2">There are No Classes</span>
                                        @else

                                            @foreach ($data as $data )
                                            <tr onclick="selectClass({{ $data->id }})" id="row{{$data->id}}" class="text2 Trow" >
                                                <th scope="row">{{ $data->id }}</th>

                                                <td>{{ $data->grade->name }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->admin->full_name }}</td>
                                            </tr>
                                            @endforeach


                                        @endif


                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6 pt-3">
                        <div class="row">
                            <div class="col-12">
                                <span class="text2 h2">Add Class</span>
                            </div>
                            <div class="col-12  pt-3">
                                <input type="text" id="name" class="input form-control py-2" placeholder="Class Name">
                            </div>

                            <div class="col-12 col-lg-4 pt-3">
                                <span class="text2 h4">Select Grade :</span>
                            </div>
                            <div class="col-12  col-lg-8  pt-3">
                                <select id="grade" class="form-control input" aria-label="Default select example">
                                    <option value="0" selected>Select a Grade</option>
                                    @foreach ($grade as  $grade)
                                    <option value="{{ $grade->id }}">Grade {{ $grade->name }}</option>
                                    @endforeach


                                  </select>
                            </div>
                            <div class="col-12 pt-4">
                                 <button class="btn py-2 buttonBack rounded-1 col" id="classSubmit"><span class="h4">Submit</span> </button>
                            </div>
                            <div class="col-12 pt-4">
                                <button disabled class="btn py-2 buttonRed rounded-1 col" id="btn"><span class="h4 textOther">Delete</span> </button>
                           </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
