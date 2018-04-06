@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="idea_form">
        <form class="form-horizontal" action="/ideas/delete/{{$idea['id']}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="idea">アイデア削除</label>
                <p class="card-text">{{$idea->idea}}</p>
            </div>
            <button type="submit" class="btn btn-default" id="idea_submit">Delete</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
