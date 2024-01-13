@extends('layouts.userDashboard')
@section('adminDashboard')
    <div class="dash-content p-lg-3" style="z-index: 20;overflow-x: hidden;">
        <div class="container p-0 pt-5">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <hr class=" borderOther ">
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <span class="fs-1 text2">{{ $post->title }}</span>
                </div>
                <div class="col-lg-8 col-12 offset-lg-2 d-flex py-5">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid ms-auto me-auto " alt="">
                </div>
                <div class="col-12 pb-4">
                    <p class="text2 fs-5">
                        <?php echo $des; ?>
                    </p>
                </div>
                @if ($post->approval != '0' && $post->delete != '1')
                    <div class="col-12 text2">
                        <span class="fs-3">Comments</span>
                    </div>
                    <div class="col-12">
                        <div class="row px-1 py-2">
                            <div class="col-12  pt-3 " style="border-radius: 10px;">
                                <div class="row">
                                    <div class="col-12 align-items-center justify-content-between d-flex">
                                        <div>
                                            @if ($image != null)

                                            <img src="{{ asset('storage/' . $image) }}" style="width: 50px"
                                                    class="img-fluid rounded-circle" alt="">
                                            @else
                                                <img src="{{ asset('images/emptyUser.jpg') }}" style="width: 50px"
                                                    class="img-fluid rounded-circle" alt="">
                                            @endif

                                            <span class=" ps-3 text2">{{ $data }}</span>
                                        </div>

                                    </div>
                                    <div class="col-lg-8 col-12 py-3 ">
                                        <div class="row">
                                            <div class="col-12 col-lg-10">
                                                <input id="comment" type="text" class="form-control input d-inline-block me-lg-2" placeholder="Type your Comment Here">
                                            </div>
                                            <div class="col-12 col-lg-2 py-2 py-lg-0">

                                            <button class="btn btn-primary d-block w-100" onclick="postComment({{ $post->id }})">Post</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        @if ($comment == 'none')
                        @else
                            @foreach ($comment as $comment)
                                <div class="row px-3 px-lg-0 pt-2">
                                    <div class="col-lg-4 col-12 border border-primary pt-3 " style="border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-12 align-items-center justify-content-between d-flex">
                                                <div>
                                                    @if ($comment->nalanda_user->profileImg != null)
                                                        <img src="{{ asset('storage/' . $comment->nalanda_user->profileImg) }}"
                                                            style="width: 50px" class="img-fluid rounded-circle"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('images/emptyUser.jpg') }}"
                                                            style="width: 50px" class="img-fluid rounded-circle"
                                                            alt="">
                                                    @endif

                                                    <span class=" ps-3 text2">{{ $comment->nalanda_user->full_name }}</span>
                                                </div>
                                                <span class="text2">{{ explode(' ', $comment->created_at)[0] }}</span>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <p class="fs-5 text2">{{ $comment->comment }}</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                @endif



            </div>
        </div>
    </div>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
