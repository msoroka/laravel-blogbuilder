@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <iframe src="{{ url('laravel-filemanager') }}" style="width: 100%; height: 500px; overflow: hidden;"></iframe>
        </div>
    </div>
</div>
@endsection
