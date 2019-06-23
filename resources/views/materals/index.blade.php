@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SHOW MATERALS</div>
                    
                <div class="card-body">
                    @if ($materals->count() > 0)
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materals as $materal)
                            <tr>
                                <td><img src="{{ $materal->photo }}" class="rounded" alt="{{ $materal->name }}" srcset="" width="100px" height="100px"></td>
                                <td>{{ $materal->name }}</td>
                                <td>{{ $materal->many }}</td>
                                <th> 
                                    <a href="{{ route('materals.edit',['id' => $materal->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </th>
                                <th> 
                                    <a href="{{ route('materals.delete',['id' => $materal->id]) }}">
                                         <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>                
                    
                @else
                    <p class="text-center">No Materal Here</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
