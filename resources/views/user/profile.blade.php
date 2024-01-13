@extends('layouts.userDashboard')
@section('adminDashboard')
    <div class="dash-content py-3 px-lg-3 p-0" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">My Profile</span>
            </div>


        </div>
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-6 py-3 d-flex flex-column flex-lg-row justify-content-start">
                        <span class="d-none" id="defImgPath">{{ asset('images/Nouser2.png') }}</span>
                       @if (($profile->profileImg) == null || empty($profile->profileImg))
                       <img id="prev0" src="{{ asset('images/Nouser2.png') }}"
                       class="img-thumbnail rounded-circle border border-white border-4 mx-auto mx-lg-0"
                       style="height: 20rem;width: 300px;" alt="">
                       @else
                       <img id="prev0" src="{{  asset('storage/' . $profile->profileImg)}}"
                       class="img-thumbnail rounded-circle border border-white border-4 mx-auto mx-lg-0"
                       style="height: 20rem;width: 300px;" alt="">
                       @endif
                        <div class="d-flex flex-column p-3  justify-content-center">
                            <input type="file" class="d-none" id="profileimg" accept="img/*" />
                            <label class="btn btn-primary fs-5 mt-3 p-3" for="profileimg" onclick="changeImage();"><i
                                    class="bi bi-cloud-arrow-up fs-3"></i>&nbsp; Change Picture</label>
                            <button onclick="removeImage();" class=" rounded-2 p-3 fs-5 customeBtn mt-3 text2"><i class="bi bi-trash"></i> Delete
                                Picture</button>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center">


                            <img src="{{ asset('images/updateProfile.svg') }}" style="height: 25rem;" alt="">

                    </div>
                    <div class="col-12 d-flex justify-content-center">

                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="form-group pt-3 col-12">
                                <span class="fs-4 text2">Full Name</span>
                                <input type="text" id="fname" value="{{ $profile->full_name }}" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="fs-4 text2">Email</span>
                                <input type="text" id="email" value="{{ $profile->email }}" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="fs-4 text2">Mobile</span>
                                <input type="text" id="mobile" value="{{ $profile->mobile }}" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-12 col-lg-6">
                                <span class="fs-4 text2">Index Number</span>
                                <input type="number" id="index" value="{{ $profile->addno }}" class="input form-control py-2">
                            </div>
                            <div class="form-group pt-3 col-6 col-lg-3">
                                <span class="fs-4 text2" >Grade</span>
                                <select class="form-select input" id="grade">
                                    @foreach ($grade as $grade )
                                    <option >{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pt-3 col-6 col-lg-3 ">
                                <span class="fs-4 text2" >Class</span>
                                <select class="form-select input" id="class" >

                                    @foreach ($class as $class )
                                    <option >{{ $class->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="form-group pt-3 col-12">
                                <span class="fs-4 text2" >Address</span>
                                <input type="text" id="address" value="{{ $profile->address }}" class="input form-control py-2">
                            </div>

                            <div class="form-group pb-1 pt-4  d-flex">
                                <button class="btn btn-secondary me-2 fs-5" style="flex:1;" onclick="location.reload()">Refresh</button>
                                <button class="btn btn-primary ms-2 fs-5" style="flex:1;" onclick="updateProfile();">Update</button>
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
