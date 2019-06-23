@extends('layouts.go')

@section('contents')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Show Tickets</div>

            @if (Session::has('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <a href="{{ route('tickets') }}" class="alert-link">Show all</a>
                {{Session::get('success')}}
                <audio autoplay loop>
                        <source  src="music/Zedge.mp3" type="audio/mpeg">
                </audio>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>
            @endif
            <div class="card-body bg-dark" style="border-radius:10px;">
                <form action="/tickets" method="get">
                    <input type="text" id="search" name="search" class="form-control mb-1" placeholder="Search ...">
                </form>
                <hr>
                    @if ($tickets->count() > 0)
                        <table class="table table-hover table-dark"  style="border-radius:10px;">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            {{-- <th scope="col">Ticket_No</th> --}}
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
                        
                           
                            {{-- @for ($i = 0; $i < 1; $i++)
                           
                            @endfor --}}
                            @foreach ($tickets as $ticket)
                            <tr>
                                {{-- <td>{{$i++}}</td> --}}
                                <td>{{ $ticket->id }}</td>
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
                                {{-- @if (Auth::user()) --}}
                                <th> 
                                    <a href="{{ route('tickets.delete',['id' => $ticket->id]) }}">
                                         <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                                {{-- @endif --}}
                            </tr>
                            @endforeach
                        </tbody>
                        </table> 

                      
                      {{ $tickets->appends(['search' =>  request('search') ])->links() }}
                     
                @else
                    <p class="text-center">No Ticket Here</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
