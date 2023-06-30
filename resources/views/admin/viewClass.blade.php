@if (count($data) < 1)
<span class="h4 text2">There are No Classes</span>
@else

  @foreach ($data as $data )
  <tr onclick="selectClass({{ $data->id }})" id="row{{$data->id}}" class="text2 Trow" >
      <th scope="row">{{ $data->id }}</th>

      <td>{{ $data->grade->name }}</td>
      <td>{{ $data->name }}</td>
      <td>{{ $data->admin->full_name }}</td>
  </tr>
  @endforeach


@endif
