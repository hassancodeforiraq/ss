@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EDIT PRODUCT</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{route('products.update',['id' => $produc->id])}}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Edit Name:</label>
                        <input type="text" class="form-control" name="name"  value="{{$produc->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


