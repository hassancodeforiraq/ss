@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Xrays</div>
       
                <div class="card-body">
                    @if ($xrays->count() > 0)
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col" class="bg-info">Name</th>
                            <th scope="col" class="bg-info">Age</th>
                            <th scope="col" class="bg-info">Gender</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Number</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($xrays as $xray)
                            <tr>
                                 {{-- @if(!empty($xray->ticket)){{$xray->ticket->name}}@endif --}}
                                 {{-- <td>{{ $item->category->name ?? '' }}</td> --}}
                                <td class="bg-info">{{$xray->ticket->name}}</td>
                                <td class="bg-info">{{$xray->ticket->age}}</td>
                                <td class="bg-info">{{$xray->ticket->gender}}</td>
                                <td>{{ $xray->title }}</td>
                                <td>{{ $xray->type }}</td>
                                <td>{{ $xray->number }}</td>
                                <th> 
                                    <a href="{{ route('xrays.edit',['id' => $xray->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </th>
                                <th> 
                                    <a href="{{ route('xrays.delete',['id' => $xray->id]) }}">
                                         <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>                
                    
                @else
                    <p class="text-center">No Xray Here</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
