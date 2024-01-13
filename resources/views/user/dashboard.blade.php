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
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <span class="text2 h2">Upcoming Events {{ $date }} </span>

                            </div>
                             <div class="col-lg-4 col-12 pt-lg-0 pt-4  d-flex justify-content-end">
                                <span class="text2 h4 " style="cursor: pointer;">See All
                                    <i class="bi bi-arrow-right-circle-fill"></i>
                                </span>
                             </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">

                <div class="row  p-lg-3 ">
                    @php
                        $count = 0;
                        $n = 99;
                        $month;
                    @endphp

                    @foreach ($event as $event)
                        @php
                            if ($count > 3) {
                                break;
                            }
                            $futureDate = $event->date;
                            $futureDateTime = new DateTime($futureDate);
                            $currentDateTime = new DateTime();
                            if ($futureDateTime < $currentDateTime || $event->delete == '1') {
                                continue;
                            } else {
                                $count += 1;
                            }
                        @endphp

                        @if ($n != substr($event->date, -5, -3))
                            @php

                                $n = substr($event->date, -5, -3);
                                if ($n == '1') {
                                    $month = 'January';
                                } elseif ($n == '2') {
                                    $month = 'February';
                                } elseif ($n == '3') {
                                    $month = 'March';
                                } elseif ($n == '4') {
                                    $month = 'April';
                                } elseif ($n == '5') {
                                    $month = 'May';
                                } elseif ($n == '6') {
                                    $month = 'June';
                                } elseif ($n == '7') {
                                    $month = 'July';
                                } elseif ($n == '8') {
                                    $month = 'August';
                                } elseif ($n == '9') {
                                    $month = 'September';
                                } elseif ($n == '10') {
                                    $month = 'October';
                                } elseif ($n == '11') {
                                    $month = 'November';
                                } elseif ($n == '12') {
                                    $month = 'December';
                                }
                            @endphp
                            <span class="d-block fs-3 ps-3 text2 pt-3">{{ $month }}</span>
                        @endif
                        <div class="col-lg-6 col-12 px-3 pt-lg-0 pt-3 ">
                            <div class="row  border border-2 border-secondary rounded-3 ps-0 g-0 shadow">
                                <div style="background-color: #4DA3FF;border-end-end-radius: 0px;border-end-start-radius: 0px;border-start-start-radius: 5px;border-end-start-radius: 5px;"
                                    class="col-lg-2 col-12 d-flex flex-column justify-content-center align-items-center  p-4 text-center text-white fw-bold">
                                    <span
                                        class="fs-2 d-block ">{{ substr(\Carbon\Carbon::parse($event->date)->format('l'), 0, 3) }}</span>
                                    <span class="fs-2 d-block ">{{ substr($event->date, -2) }}</span>
                                </div>
                                <div class="userDashBackground d-inline-block p-2 col-lg-10 col-12"
                                    style="border-end-end-radius: 0.4rem;border-start-end-radius: 0.4rem;">
                                    <div class="row py-3 d-flex flex-lg-row  flex-column">
                                        <div
                                            class="col-lg-5  col-12  text-center fs-5 d-flex flex-column align-items-center justify-content-center border-2 border-end border-secondary ">

                                            <div class="text3">
                                                <i class="fa-solid fa-clock text3 pt-3"></i>
                                                <span>{{ substr($event->start_time, 0, -3) }} -
                                                    {{ substr($event->end_time, 0, -3) }}</span>
                                            </div>
                                            <div class="text3">
                                                <i class="fa-solid fa-location-dot text3 pt-3"></i>
                                                <span>{{ $event->location }}</span>
                                            </div>

                                        </div>
                                        <hr class="mt-3 d-block d-lg-none pt-lg-0">
                                        <div class="col-lg-7  col-12 d-flex text3 flex-column text-center ">
                                            <span class="fs-3 fw-bold" style="color: #ff9470;">{{ $event->title }}</span>
                                            <p class="fs-6 text-center">{{ $event->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

            <div class="col-12 px-lg-3 pt-5">
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

                <div class="row px-lg-4 pb-3">

                    @foreach ($news as $news)
                        <div class="col-lg-4 col-12 pt-4">
                            <div class="card w-100 userDashBackground myShadow">
                                <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                    <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                                </div>
                                <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top "
                                    style="height: 300px" alt="...">

                                <div class="card-body">
                                    <div class="col-12 py-3  d-flex align-items-center justify-content-between">
                                        {{-- <span class="text2">{{ $news->admin->full_name }}</span> --}}
                                        <span class="ms-auto text2">{{ $news->created_at->format('Y-m-d H:i') }}
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title h3 text2">{{ $news->title }}</h4>
                                        <p class="card-text text2">{{ Str::limit($news->description, 205) }}</p>
                                        <a href="{{ route('singleNewsView', ['id' => $news->id]) }}"
                                            class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach


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

                <div class="row px-lg-4 pb-3">

                    @foreach ($post as $post)
                        <div class="col-lg-4 col-12 pt-4">
                            <div class="card w-100 userDashBackground myShadow">
                                <div class="d-flex position-absolute align-items-end justify-content-end  w-100">
                                    <span class=" bg-primary p-2 text-white mr-3 mt-3">latest</span>
                                </div>
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
                                        <span class="ms-auto text2">{{ $post->created_at->format('Y-m-d H:i') }} </span>
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
                </div>
            </div>


        </div>
    </div>
    </div>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
