@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Contacts list history</div>
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
                                            <th>Replied at</th>
                                            <th class="min-width text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->created_at }}</td>
                                                <td>{{ $contact->updated_at }}</td>
                                                <td class="min-width text-right">
                                                    <a href="{{ route('admin.contact.details-contact', $contact) }}" class="btn btn-primary" title="Details">
                                                        Details
                                                    </a>
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
