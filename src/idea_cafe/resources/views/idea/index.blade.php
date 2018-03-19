@extends('layouts.app')

@section('content')
  @foreach ($ideas as $idea)
    <tr>
      <td>
        {{$idea->idea}}
      </td>
    </tr>
  @endforeach
@endsection
