@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{ Form::model($contact, ['route' => ['admin.contact.update-contact', $contact], 'method' => 'PUT']) }}
                <div class="card shadow">
                    <div class="card-header">Reply to contact</div>
                    <div class="card-body">
                    <p>Name: {{ $contact->name }}</p>
                    <p>Email: {{ $contact->email }}</p>
                    <p>Sent at: {{ $contact->created_at }}</p>
                    Message: <p>{{ $contact->message }}</p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group required">
                                    {{ Form::label('answer', 'Answer:', ['class' => 'control-label']) }}
                                    {{ Form::textarea('answer', null, ['class' => 'form-control', 'required' => true, 'rows' => 4]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                {{ Form::submit('Reply', ['class' => 'btn btn-primary btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
