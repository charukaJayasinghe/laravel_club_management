@foreach ($data as $data)
<tr class="text2 Trow userRow">
    <td scope="row">{{ $data->id }}</td>

    <td style=" vertical-align: middle;">{{ $data->full_name }}</td>
    <td>{{ $data->email }}</td>
    <td>{{ $data->mobile }}</td>
    <td>{{ $data->addno }}</td>
    <td>{{ $data->class_room->grade->name }} - {{ $data->class_room->name }}</td>
    <td class="row">
        <div class="col-6">
            {{-- <button class="btn btn-danger w-100">Block <i class="fa-solid fa-ban"></i></button> --}}
            @if ($data->user_status->name == 'Active')
                <button onclick="blockUser({{ $data->id }});"
                    class="btn py-2 buttonRed rounded-1 col"><span class="h4 textOther"
                        style="font-size: 20px">Block</span> <i
                        class="fa-solid textOther fa-ban"></i></button>
            @else
                <button onclick="blockUser({{ $data->id }});"
                    class="btn py-2 buttonYellow rounded-1 col"><span class="h4 text-dark"
                        style="font-size: 20px">UnBlock</span> <i
                        class="h5 bi bi-check-circle-fill text-dark "></i></button>
            @endif
        </div>
        <div class="col-6">
            <button style="font-size: 20px" onclick="showStudentDetails({{ $data->id }});"
                class="btn py-2 buttonBlue rounded-1 col textOther"><span>More</span> <i
                    class="fa-sharp fa-solid  fa-circle-info"></i></button>
            {{-- <button class="btn btn-primary w-100">More <i class="fa-sharp fa-solid fa-circle-info"></i></button> --}}
        </div>


    </td>
</tr>
@endforeach
