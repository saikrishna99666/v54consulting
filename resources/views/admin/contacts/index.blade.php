@extends('adminlte::page')

@section('title', 'Contact Messages')

@section('content_header')
    <h1>Contact Messages</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Inquiry Messages</h3>
                    <div class="card-tools d-flex align-items-center" style="gap: 10px;">

                        {{-- Source Filter --}}
                        <form action="{{ route('admin.contacts.index') }}" method="GET" class="d-flex align-items-center" style="gap: 6px;">
                            <input type="hidden" name="search" value="{{ request('search') }}">
                            <select name="source" class="form-control form-control-sm" style="min-width: 160px;" onchange="this.form.submit()">
                                <option value="">All Sources</option>
                                <option value="Contact Form" {{ request('source') === 'Contact Form' ? 'selected' : '' }}>Contact Form</option>
                                <option value="Careers" {{ request('source') === 'Careers' ? 'selected' : '' }}>Careers (All Positions)</option>
                            </select>
                        </form>

                        {{-- Search --}}
                        <form action="{{ route('admin.contacts.index') }}" method="GET">
                            <input type="hidden" name="source" value="{{ request('source') }}">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search inquiries..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-valign-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Source</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th style="width: 120px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                                    <td><strong>{{ $contact->Firstname }} {{ $contact->Lastname }}</strong></td>
                                    <td>{{ $contact->EmailAddress }}</td>
                                    <td>{{ $contact->Phoneno }}</td>
                                    <td>
                                        @if(str_starts_with($contact->source ?? '', 'Careers'))
                                            <span class="badge badge-success px-2 py-1" title="{{ $contact->source }}">
                                                <i class="fas fa-briefcase mr-1"></i> {{ $contact->source }}
                                            </span>
                                        @else
                                            <span class="badge badge-primary px-2 py-1">
                                                <i class="fas fa-envelope mr-1"></i> Contact Form
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($contact->Message, 50) }}</td>
                                    <td>{{ $contact->created_at?->format('d M Y') ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact->contactid) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.contacts.destroy', $contact->contactid) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this message?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No messages found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
