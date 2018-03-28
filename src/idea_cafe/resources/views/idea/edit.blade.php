@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="idea_form">
        <form class="form-horizontal" action="/ideas/edit/{{$idea['id']}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="user_id" value="{{$user->id}}"/>
            <div class="form-group">
                <label for="idea">アイデア編集</label>
                <textarea name="idea" class="form-control" rows="3" id="idea">{{$idea['idea']}}</textarea>
            </div>
            <button type="submit" class="btn btn-default" id="idea_submit">Send</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
