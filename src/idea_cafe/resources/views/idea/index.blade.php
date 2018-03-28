@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
<h2>Top</h2>

@if ($user != null)

<div class="row">
    <div class="col-md-12">
        <div class="idea_form">
            <form class="form-horizontal" action="/idea/add" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                <div class="form-group">
                    <label for="idea">あなたのアイデアを共有しよう！</label>
                    <textarea name="idea" class="form-control" rows="3" id="idea" placeholder="Your ideas ..."></textarea>
                </div>
                <button  type="submit" class="btn btn-default" id="idea_submit">Send</button>
            </form>
        </div>
    </div>
</div>
@endif
<div class="row">
</div>
<div class="row">
@foreach ($ideas as $idea)
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{$idea['idea']}}</p>
            <a href="/ideas/{{$idea['id']}}" class="btn btn-primary">もっと見る</a>
            @if($user != null)
                @if($idea['user_id'] == $user->id)
                    <a href="/ideas/edit/{{$idea['id']}}" class="btn btn-primary">編集</a>
                @endif
            @endif
        </div>
    </div>
</div>
@endforeach
</div>

</div>

@endsection
