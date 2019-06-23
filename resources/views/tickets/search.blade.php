@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Show Search Tickets</div>

                <div class="card-body">
                    @if ($tickets->count() > 0)
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">PLace</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->name }}</td>
                                <td>{{ $ticket->age }}</td>
                                <td>{{ $ticket->gender }}</td>
                                <td>{{ $ticket->place }}</td>
                                <td>{{ $ticket->phone }}</td>
                                <th> 
                                    <a href="{{ route('tickets.edit',['id' => $ticket->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </th>
                                <th> 
                                    <a href="{{ route('tickets.delete',['id' => $ticket->id]) }}">
                                         <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>                
                    
                @else
                    <p class="text-center">No Ticket Here</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
