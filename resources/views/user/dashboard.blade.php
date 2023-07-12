@extends('layouts.userDashboard')
@section('adminDashboard')
    <div class="dash-content pb-4" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 pt-4 px-3">
                <span class="text2 h1">Home</span>
            </div>
            <div class="col-12 ">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 px-3 pt-4">
                <div class="row pt-lg-0 pt-3 pr-4">
                    <div class="col-12 d-flex  justify-content-between">
                        <span class="text2 h2">Posts</span>
                        <span class="text2 h4" style="cursor: pointer;">See All <i
                                class="bi bi-arrow-right-circle-fill"></i></span>
                    </div>
                    <div class="col-12">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">

                <div class="row px-4 pb-3">

                    @foreach ($post as $post )
                    <div class="col-4 pt-4">
                        <div class="card w-100 userDashBackground myShadow">
                            <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                            </div>
                            <img src="{{ asset('storage/' .  $post->image) }}" class="card-img-top " style="height: 300px" alt="...">

                            <div class="card-body">
                                <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                    <div style="display: inline-block;">
                                        <img src="{{ asset('images/posts/author.jpg') }}" style="width: 50px"
                                            class="img-fluid rounded-circle" alt="">
                                        <span class="ps-2 text2">{{ $post->nalanda_user->full_name }}</span>
                                    </div>
                                    <span class="ms-auto">{{ $post->created_at->format('Y-m-d H:i') }} </span>
                                </div>
                                <div class="col-12">
                                    <h4 class="card-title h3 text2">{{ $post->title }}</h4>
                                    <p class="card-text text2">{{  Str::limit($post->description, 205) }}</p>
                                    <a href="#" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach



                <div class="col-12 px-3 pt-5">
                    <div class="row pt-lg-0 pt-3 pr-4">
                        <div class="col-12 d-flex  justify-content-between align-items-baseline align-items-end">
                            <span class="text2 h2">News</span>
                            <span class="text2 h4" style="cursor: pointer;">See All <i
                                    class="bi bi-arrow-right-circle-fill"></i></span>
                        </div>
                        <div class="col-12">
                            <hr class=" borderOther ">
                        </div>
                    </div>
                </div>
                <div class="col-12 ">

                    <div class="row px-4 pb-3">

                        <div class="col-4 pt-4">
                            <div class="card w-100 userDashBackground myShadow">
                                <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                    <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                                </div>
                                <img src="{{ asset('images/posts/emptyUser.jpg') }}" class="card-img-top" alt="...">

                                <div class="card-body">
                                    <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                        <div style="display: inline-block;">
                                            <img src="{{ asset('images/posts/author.jpg') }}" style="width: 50px"
                                                class="img-fluid rounded-circle" alt="">
                                            <span class="ps-2 text2">John Doe</span>
                                        </div>
                                        <span class="ms-auto">2022-11-13 13:20 </span>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title h3 text2">Oldest Type Writer</h4>
                                        <p class="card-text text2">Some quick example text to build on the card title and
                                            make
                                            up the bulk
                                            of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-4 pt-4">
                            <div class="card w-100 userDashBackground myShadow">
                                <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                    <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                                </div>
                                <img src="{{ asset('images/posts/emptyUser.jpg') }}" class="card-img-top" alt="...">

                                <div class="card-body">
                                    <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                        <div style="display: inline-block;">
                                            <img src="{{ asset('images/posts/author.jpg') }}" style="width: 50px"
                                                class="img-fluid rounded-circle" alt="">
                                            <span class="ps-2 text2">John Doe</span>
                                        </div>
                                        <span class="ms-auto">2022-11-13 13:20 </span>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title h3 text2">Oldest Type Writer</h4>
                                        <p class="card-text text2">Some quick example text to build on the card title and
                                            make
                                            up the bulk
                                            of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-4 pt-4">
                            <div class="card w-100 userDashBackground myShadow">
                                <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                    <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                                </div>
                                <img src="{{ asset('images/posts/emptyUser.jpg') }}" class="card-img-top"
                                    alt="...">

                                <div class="card-body">
                                    <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                        <div style="display: inline-block;">
                                            <img src="{{ asset('images/posts/author.jpg') }}" style="width: 50px"
                                                class="img-fluid rounded-circle" alt="">
                                            <span class="ps-2 text2">John Doe</span>
                                        </div>
                                        <span class="ms-auto">2022-11-13 13:20 </span>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title h3 text2">Oldest Type Writer</h4>
                                        <p class="card-text text2">Some quick example text to build on the card title and
                                            make
                                            up the bulk
                                            of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>


                </div>
            @endsection
