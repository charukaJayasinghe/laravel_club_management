@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content pb-4" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-6 pt-4 px-3">
                <span class="text2 h1">Create News</span>

            </div>
            <div class="col-6">
              <img src="" alt="">
            </div>

            <div class="col-12 pt-0 mt-0">
                <div class="row">
                    <div class="col-3">
                        <hr class="borderOther">
                    </div>
                </div>
            </div>


        </div>
        <div class="container">
            <div class="container">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 py-3 d-flex flex justify-content-center">
                            <img id="prev0" src="{{ asset('images/noImage.jpg') }}" class="img-thumbnail" style="height: 400px"
                                alt="">

                        </div>
                         <div class="col-12 d-flex justify-content-center">
                            <input type="file" class="d-none" id="profileimg" accept="img/*" />
                            <label class="btn btn-primary fs-5 mt-3" for="profileimg" onclick="changeImage();"><i class="bi bi-cloud-arrow-up-fill"></i>&nbsp; Upload Image</label>
                         </div>
                        <div class="col-12">
                            <div class="form-group pt-3">
                                <span class="h3 text2">Title</span>
                                <input type="text" id="title" class="input form-control py-2" >
                            </div>

                            <div class="form-group pt-3">
                                <span class="h3 text2">Description</span>
                                <textarea class="form-control  input" id="description" rows="20" name="content" ></textarea>
                            </div>
                            <div class="form-group pt-3">
                                <button onclick="publishNews();" class="btn btn-primary w-100 fs-5">Publish</button>
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
