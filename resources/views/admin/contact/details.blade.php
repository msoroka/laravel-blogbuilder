@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">Contact details</div>
                    <div class="card-body">
                    <p>Name: {{ $contact->name }}</p>
                    <p>Email: {{ $contact->email }}</p>
                    <p>Sent at: {{ $contact->created_at }}</p>
                    Message: <p>{{ $contact->message }}</p>
                    <p>Anwered by {{ $contact->author->full_name }} at {{ $contact->updated_at }}</p>
                    Answer: <p>{{ $contact->answer }}</p>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
