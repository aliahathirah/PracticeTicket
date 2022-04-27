@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ticket Show') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" name="title" class="form-control" value="{{ $ticket->id }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $ticket->title }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" readonly>{{ $ticket->description }}</textarea>
                    </div>
                    
                    @if($ticket->attachment)
                        <div class="form-group">
                            <label>Attachment (if any)</label>
                            <a
                                target="_blank"
                                href="{{ asset('storage/'.$ticket->attachment) }}"
                                class="btn btn-warning">

                                Open this attachment: {{ $ticket->attachment }}
                            </a>
                        </div>
                    @endif

                    <div class="form-group">
                        <a class="btn btn-link" href="{{ route('ticket:index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection