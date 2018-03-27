@extends('layouts.app')

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <!-- <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
            <p class="card-text">{{$idea->idea}}</p>
            <!-- <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a> -->
        </div>
    </div>
</div>
</div>
</div>
@endsection
