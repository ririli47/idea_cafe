@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($ideas as $idea)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">{{$user['name']}}</h6>
                    <p class="card-text">{{$idea['idea']}}</p>
                    <a href="/ideas/{{$idea['id']}}" class="btn btn-primary">もっと見る</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
