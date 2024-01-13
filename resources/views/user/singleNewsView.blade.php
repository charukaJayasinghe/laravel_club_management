@extends('layouts.userDashboard')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="container pt-5">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <hr class=" borderOther ">
                        </div>
                    </div>
                </div>
                <div class="col-12">
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
                @if ($post->delete != '1')
                    <div class="col-12 text2">
                        <span class="fs-3">Comments</span>
                    </div>
                    <div class="col-12">
                        <div class="row py-2">
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
                                    <div class="col-lg-8 col-12 p-2 d-flex">
                                        <input id="comment" type="text" class="form-control input d-inline-block me-2"
                                            placeholder="Type your Comment Here"><button
                                            class="btn btn-primary d-inline-block"
                                            onclick="postNewsComment({{ $post->id }})">Post</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                        @if ($comment == 'none')
                        @else
                            @foreach ($comment as $comment)
                                <div class="row pt-2">
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
