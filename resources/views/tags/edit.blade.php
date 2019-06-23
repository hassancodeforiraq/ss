@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EDIT TAG</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('tag.update',$tags->id) }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="tag">Edit Name Tag</label>
                        <input type="text" class="form-control" name="tag"  value="{{ $tags->tag }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
