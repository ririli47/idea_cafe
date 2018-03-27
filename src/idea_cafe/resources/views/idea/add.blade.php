@extends('layouts.app')

@section('content')

@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach

<form action="/idea/add" method="POST">
    <table>
        {{csrf_field()}}
        <tr><th>user_id: </th><td><input type="number" name="user_id" /></td></tr>
        <tr><th>idea:    </th><td><input type="text" name="idea" /></td></tr>
        <tr><th></th><td><input type="submit" value="send" /></td></tr>
    </table>
</form>

@endsection
