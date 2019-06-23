@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD TAG</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="tag">Name</label>
                        <input type="text" class="form-control" name="tag" placeholder="Enter tag name">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
