@extends('layouts.userDashboard')
@section('adminDashboard')
    <div class="dash-content p-lg-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">My Posts</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">

                <div class="row px-lg-4 pb-3">

                    @if ($post == 'none')
                        <h1>You haven't Posted Anything</h1>
                    @else
                        @foreach ($post as $post)
                            <div class="col-lg-4 col-12 pt-4">
                                <div class="card w-100 userDashBackground myShadow">

                                    @if ($post->approval == '1')
                                        <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                            <span class=" bg-success p-2 text-white me-3 mt-3">Approved</span>
                                        </div>
                                    @elseif ($post->approval == '0' && $post->delete == '0')
                                        <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                            <span class="text-dark bg-warning p-2 text-white me-3 mt-3">Pending</span>
                                        </div>
                                    @elseif ($post->delete == '1')
                                        <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                            <span class=" bg-danger p-2 text-white me-3 mt-3">Disapproved</span>
                                        </div>
                                    @endif


                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top "
                                        style="height: 300px" alt="...">

                                    <div class="card-body">
                                        <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                            <div style="display: inline-block;">
                                                @if ($post->nalanda_user->profileImg != null)
                                                    <img src="{{ asset('storage/' . $post->nalanda_user->profileImg) }}"
                                                        style="width: 50px" class="img-fluid rounded-circle" alt="">
                                                @else
                                                    <img src="{{ asset('images/emptyUser.jpg') }}" style="width: 50px"
                                                        class="img-fluid rounded-circle" alt="">
                                                @endif

                                                <span class="ps-2 text2">{{ $post->nalanda_user->full_name }}</span>
                                            </div>
                                            <span class="ms-auto">{{ $post->created_at->format('Y-m-d H:i') }} </span>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="card-title h3 text2">{{ $post->title }}</h4>
                                            <p class="card-text text2">{{ Str::limit($post->description, 205) }}</p>
                                            <a href="{{ route('singlePostView', ['id' => $post->id]) }}"
                                                class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif


                </div>
            </div>

        </div>
    </div>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
