@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tags</div>
                    
                <div class="card-body">
                    @if ($tags->count() > 0)
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->tag }}</td>
                                <th> 
                                    <a href="{{ route('tag.edit',['id' => $tag->id]) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </th>
                                <th> 
                                    <a href="{{ route('tag.delete',['id' => $tag->id]) }}">
                                         <i class="far fa-trash-alt"></i>
                                    </a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>                
                    
                @else
                    <p class="text-center">No Tags Here</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
