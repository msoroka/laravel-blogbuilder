@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Contacts list</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($contacts->isNotEmpty())
                                <table class="table table-striped table-vertical">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th class="min-width text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->created_at }}</td>
                                                <td class="min-width text-right">
                                                    <a href="{{ route('admin.contact.reply-contact', $contact) }}" class="btn btn-primary" title="Reply">
                                                        Reply
                                                    </a>
                                                    {{ Form::open(['route' => ['admin.contact.remove-contact', $contact], 'method' => 'DELETE', 'class' => 'confirm d-inline']) }}
                                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger" title="Delete">
                                                            Delete
                                                        </button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">Nothing to show</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
