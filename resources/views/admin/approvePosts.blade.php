@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Approve Posts</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>

            <div class="col-12 pt-5">
                @if (count($data) >= 1)
                    <table class="table">
                        <thead class="back">
                            <tr class="textOther">
                                <th  class="d-none d-lg-table-cell" scope="col">#</th>

                                <th class="d-none d-lg-table-cell" scope="col">User</th>
                                <th scope="col">Title</th>

                                <th  class="d-none d-lg-table-cell" scope="col">image</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userBody">



                            @foreach ($data as $data)
                                <tr class="text2 Trow userRow">
                                    <td  class="d-none d-lg-table-cell" scope="row">{{ $data->id }}</td>

                                    <td  class="d-none d-lg-table-cell">{{ $data->nalanda_user->full_name }}</td>
                                    <td  style=" vertical-align: middle;">{{ $data->title }}</td>

                                    <td  class="d-none d-lg-table-cell">
                                        <img width="200px" src="{{ asset('storage/' . $data->image) }}" alt="">
                                    </td>
                                    <td>

                                        <button onclick="approvePost({{ $data->id }});"
                                            class="btn py-2 my-1 btn-success rounded-1 col"><span>Approve</span> <i
                                                class="h5 bi bi-check-circle-fill text-white "></i></button>



                                        <button style="font-size: 20px"
                                            class="btn py-2 my-1 btn-primary rounded-1 col text-white"
                                            onclick="showPostDetails({{ $data->id }});">
                                            <span>View</span> <i class="bi bi-eye-fill "></i></button>



                                        <button style="font-size: 20px"
                                            class="btn py-2 my-1 buttonYellow rounded-1 col text-dark">
                                            <span>Delete</span> <i class="bi bi-x-circle-fill"></i></button>





                                    </td>
                                </tr>
                            @endforeach





                        </tbody>
                    </table>
                @else
                    <table class="table">
                        <thead class="back">
                            <tr class="textOther">
                                <th scope="col">#</th>

                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Addno</th>
                                <th scope="col">Class</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6">
                                    <h1 class="fs-1 text-center text2">No Users To Approve</h1>
                                <td>
                            </tr>
                        </tbody>
                    </table>
                @endif
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
                    <h5 class="modal-title text2" id="exampleModalLabel">View Post</h5>
                    <button class="btn closeButton" onclick="closeModel();"> <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-12 py-3 d-flex justify-content-center">
                            <img src="{{ asset('images/noImage.jpg') }}" id='postImg' class="img-thumbnail" style="width: 500px"
                                alt="">
                        </div>
                        <div class="col-12 px-lg-4">
                            <div class="row">

                                <div class=" py-3  col-12">
                                    <span class="h5 d-block text2">User : </span>
                                    <input class=" input form-control" id="user" value="Charuka Jayasinghe" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Submit Date : </span>
                                    <input class=" input form-control" id="created_date" value="12" />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Submit Time : </span>
                                    <input class=" input form-control" id="created_time" value="B" />
                                </div>
                                <div class=" py-3  col-12">
                                    <span class="h5 d-block text2">Title : </span>
                                    <input class=" input form-control" id="title" value="Charuka Jayasinghe" />
                                </div>

                                <div class=" py-3  col-12 col-lg-12">
                                    <span class="h5 d-block text2">Description : </span>
                                   <p id="description" class="text2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi doloribus optio, amet
                                        error architecto itaque iusto sequi eveniet laborum suscipit asperiores aliquid
                                        autem cupiditate fugit voluptas sapiente totam consectetur magnam sit dicta
                                        repudiandae expedita dolores vitae soluta? Sed quis obcaecati dolores fugit tempore
                                        perspiciatis ipsa cupiditate vero consequuntur. Saepe sapiente facilis doloribus
                                        iure soluta ut aut quas repellendus laboriosam consequuntur. Vero unde qui quod
                                        dolor quae sunt sint totam ex, mollitia harum debitis. Ex explicabo laboriosam
                                        aperiam eos cupiditate, officia accusamus voluptas tenetur recusandae provident
                                        pariatur, rem quos minus laudantium corporis! Maiores laborum aliquam dolorem quis
                                        saepe, veritatis velit commodi.</p>
                                </div>




                            </div>

                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="closeModel();">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
