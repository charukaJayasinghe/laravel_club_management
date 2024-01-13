@extends('layouts.admin')
@section('adminDashboard')
    <div class="dash-content p-3" style="z-index: 20;overflow-x: hidden;">
        <div class="row">
            <div class="col-12 title">
                <span class="text2 h1">Manage Positions</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <hr class=" borderOther ">
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <div class="row  flex-lg-row flex-column-reverse">
                    <div class="col-12 col-lg-6 pt-lg-3 pt-5">
                        <div class="row pt-lg-0 pt-3">
                            <div class="col-12">
                                <span class="text2 h2">Positions</span>
                            </div>
                            <div class="col-12 pt-3">
                                <table class="table">
                                    <thead class="back">
                                        <tr class="textOther">
                                            <th scope="col">Index</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Tbody">
                                        @if (count($data) < 1)
                                            <span class="h4 text2">There are No Classes</span>
                                        @else
                                            @foreach ($data as $data)
                                                <tr onclick="selectPosition({{ $data->id }})"
                                                    id="row{{ $data->id }}" class="text2 Trow">
                                                    <th scope="row">{{ $data->index }}</th>

                                                    <td>{{ $data->name }}</td>

                                                    <td>{{ $data->admin->full_name }}</td>
                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6 pt-3">
                        <div class="row">
                            <div class="col-12 pb-3">
                                <span class="text2 h2">Add Position</span>
                            </div>


                            <div class="col-12 col-lg-4 pt-3">
                                <span class="text2 h4">Position Name :</span>
                            </div>
                            <div class="col-12  col-lg-8  pt-3">
                                <input id="posName" type="text" class="form-control input">
                            </div>
                            <div class="col-12 col-lg-4 pt-3">
                                <span class="text2 h4">Position Index :</span>
                            </div>
                            <div class="col-12  col-lg-8  pt-3">
                                <input id="indexVal" type="number" class="form-control input"
                                    aria-label="Default select example" />
                                <p style="color: red;" id="errorMSg"></p>

                            </div>
                            <div class="col-12 pt-4">
                                <button class="btn py-2 buttonBack rounded-1 col" onclick="addBoardPosition();"><span
                                        class="h4">Submit</span> </button>
                            </div>
                            <div class="col-12 pt-4">
                                <button disabled class="btn py-2 rounded-1 col" style="background-color: #4DA3FF;"
                                    id="updateBtn" onclick="vieWUpdatePosition();"><span class="h4 textOther">Update</span>
                                </button>
                            </div>
                            <div class="col-12 pt-4">
                                <button disabled class="btn py-2 buttonRed rounded-1 col" id="deleteBtn"
                                    onclick="deletePosition();"><span class="h4 textOther">Delete</span> </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('bmodels')
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content backColor">
                <div class="modal-header">
                    <h5 class="modal-title text2" id="exampleModalLabel">Update Position Data</h5>
                    <button class="btn closeButton" onclick="closeModel();"> <i class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row ">

                        <div class="col-12 px-lg-4">
                            <div class="row">
                                <span id="pID" style="display: none;"></span>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Position Name : </span>
                                    <input class=" input form-control" id="name"  />
                                </div>
                                <div class=" py-3  col-12 col-lg-6">
                                    <span class="h5 d-block text2">Position Index : </span>
                                    <input class="input form-control" id="index"  />
                                </div>

                            </div>

                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="closeModel();">Close</button>
                    <button type="button" class="btn btn-primary" onclick="savePositionChanges();">Save Changes</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        numberInput = document.getElementById("indexVal");
        errorMessage = document.getElementById('errorMSg');
        numberInput.addEventListener('input', function() {
            const value = parseInt(numberInput.value);

            // Check if the input is a valid number within the range
            if (isNaN(value) || value < 1 || value > 254) {
                errorMessage.textContent = 'Please enter a number between 0 and 255.';
                numberInput.style.borderColor = 'red';
            } else {
                errorMessage.textContent = '';
                numberInput.style.borderColor = ''; // Reset border color
            }
        });
    </script>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
