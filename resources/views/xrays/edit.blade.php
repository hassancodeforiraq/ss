@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Xray</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('xrays.update',['id' => $xrays->id]) }}" method="POST">
                @csrf

                
                  
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{$xrays->title}}"  placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="many">Type:</label>
                        <input type="text" class="form-control" name="type" value="{{$xrays->type}}"  placeholder="Enter Type">
                    </div>
                    <div class="form-group">
                        <label>Number:</label>
                        <input type="number" class="form-control" name="number" value="{{$xrays->number}}" placeholder="Enter Number">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
