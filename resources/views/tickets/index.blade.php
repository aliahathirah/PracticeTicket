@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">

            @if(session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                {{ session()->get('alert') }}
                 </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Ticket Index</h3>
                    <div class="float-start">
                        <form action="" method="">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword')}}"
                                    placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch"/>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>
                    <div class="float-end"> 
                        <a href="{{ route('ticket:create') }}" class="btn btn-primary">+ Create New Ticket</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Attachment</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->title}}</td>
                                    <td>{{$ticket->description}}</td>
                                    <td>{{$ticket->attachment}}</td>

                                    <td>
                                       <a href="{{ route('ticket:show', $ticket) }}" class="btn btn-primary">Show</a>
                                       <a href="{{ route('ticket:edit', $ticket) }}" class="btn btn-success">Edit</a>
                                       <a onclick="return confirm('Are you sure?')"
                                        href="{{ route('ticket:destroy', $ticket) }}"
                                        class="btn btn-danger">Delete</a>
                                       <hr>
                                       <a onclick="return confirm('Are you sure want to force delete?')" 
                                        href="{{ route('ticket:force-destroy', $ticket) }}" 
                                        class="btn btn-danger">Force Delete</a>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tickets->links( )}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection