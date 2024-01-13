@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Add Official Board Members</span>
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
            <div class="container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3 d-flex flex justify-content-center">
                            <img id="prev0" src="{{ asset('images/noImage.jpg') }}" class="img-thumbnail"
                                style="height: 400px" alt="">

                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <input type="file" class="d-none" id="profileimg" accept="img/*" />
                            <label class="btn btn-primary  mt-3" for="profileimg" onclick="changeImage();"> <span class="h4" style="font-weight: normal;"><i
                                class="bi bi-cloud-arrow-up-fill"></i>&nbsp;Upload Image</span></label>
                        </div>
                        <div class="col-12 pt-3">
                            <div class="row">
                                <div class="form-group pt-3 col-12 col-lg-6">
                                    <span class="h3 text2">Member Name</span>
                                    <input type="text" id="memberName" class="input form-control py-2">
                                </div>
                                <div class="form-group pt-3 col-12 col-lg-6">
                                    <div class="row">
                                         <div class="col-12">
                                            <span class="h3 text2">Member Position</span>
                                         </div>
                                         <div class="col-8 col-lg-10">
                                            <select id="position" class="form-control input">
                                                <option value="0">Select Position</option>
                                                @foreach ($positions as $position)
                                                     <option value="{{ $position->id }}">{{ $position->name }}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                         <div class="col-4 col-lg-2 d-flex ">
                                               <button class="btn btn-primary w-100" onclick='window.location="/dashboard/viewManagePosition"' >Add</button>
                                         </div>
                                    </div>


                                </div>


                                <div class="form-group pt-3 col-12 col-lg-6">
                                    <span class="h3 text2">Email</span>
                                    <input type="text" id="memberEmail" class="input form-control py-2">
                                </div>
                                <div class="form-group pt-3 col-12 col-lg-6">
                                    <span class="h3 text2">Mobile</span>
                                    <input type="text" id="memberMobile" class="input form-control py-2">
                                </div>




                                <div class="form-group pb-1 pt-4  w-100 px-2 d-flex flex-lg-row flex-column">
                                    <button class="btn btn-secondary mr-lg-2 " style="flex:1;font-size: 1.6rem;"
                                        onclick="location.reload();">Refresh</button>
                                    <button class="btn btn-primary mt-3 mt-lg-0 ml-lg-2 " style="flex:1;font-size: 1.6rem;"
                                        onclick="addBoardMember();">Submit</button>
                                </div>
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
