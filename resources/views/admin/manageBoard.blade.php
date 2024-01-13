@extends('layouts.admin')
@section('adminDashboard')
<div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
    <div class="row">
        <div class="col-12 title">
            <span class="text2 h1">Manage Official Board Members</span>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <hr class=" borderOther ">
                </div>
            </div>
        </div>

        <div class="col-12 pt-5">
            <table class="table">
                <thead class="back">
                    <tr class="textOther">
                        <th  class="d-none d-lg-table-cell" scope="col">Index</th>


                        <th scope="col">Position</th>
                        <th class="d-none d-lg-table-cell" scope="col">Name</th>
                        <th  scope="col">Mobile</th>
                        <th  class="d-none d-lg-table-cell" scope="col">image</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($members as $member )
                  <tr class="text2 Trow userRow">
                    <td  class="d-none d-lg-table-cell" scope="row">{{ $member["index"] }}</td>

                    <td  class="d-none d-lg-table-cell">{{ $member["Pname"] }}</td>
                    <td  style=" vertical-align: middle;">{{$member["Bname"]  }}</td>
                    <td  style=" vertical-align: middle;">{{$member["mobile"]  }}</td>


                    <td  class="d-none d-lg-table-cell">
                        <img width="200px" src="{{ asset('storage/' . $member['Bimage']) }}" alt="">
                    </td>
                    <td>



                        <button style="font-size: 20px"
                            class="btn py-2 my-1 btn-primary rounded-1 col text-white"
                            onclick="showMemberDetails({{ $member['Bid'] }});">
                            <span>Update</span> <i class="fa-solid fa-wrench"></i>
                        </button>



                        <button style="font-size: 20px" onclick="deleteMember({{ $member['Bid'] }});"
                            class="btn py-2 my-1 btn-warning rounded-1 col text-dark">
                            <span>Delete</span> <i class="bi bi-x-circle-fill"></i>
                        </button>


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
                    <h5 class="modal-title text2" id="exampleModalLabel">Board Member Data</h5>
                    <button class="btn closeButton" onclick="closeModel();"> <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-12 py-3 d-flex justify-content-center">
                            <img id="prev0" src="{{ asset('images/emptyUser.jpg') }}" class="img-thumbnail" style="height: 300px"
                                alt="">

                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <input type="file" class="d-none" id="profileimg" accept="img/*" />
                            <label class="btn btn-primary  mt-3" for="profileimg" onclick="changeImage();"> <span class="h4" style="font-weight: normal;"><i
                                class="bi bi-cloud-arrow-up-fill"></i>&nbsp;Change Image</span></label>
                        </div>
                        <div class="col-12 px-lg-4">
                            <div class="row">
                                 <span id="mID" style="display: none;"></span>
                                <div class=" py-3  col-12">
                                    <span class="h5 d-block text2">Name : </span>
                                    <input class=" input form-control" id="name" value="Charuka Jayasinghe" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Position : </span>
                                    <select class="form-control input" id="position">
                                         @foreach ($positions as $position)
                                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                                         @endforeach
                                    </select>
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Mobile : </span>
                                    <input class=" input form-control" id="mobile" value="0715518287" />
                                </div>

                                <div class=" py-3  col-12 ">
                                    <span class="h5 d-block text2">Email : </span>
                                    <input class=" input form-control" id="email" value="972/262,Annasiwaththa,Oruwala,Athurugiriya" />
                                </div>



                            </div>

                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="closeModel();">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveMemberChanges();">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
