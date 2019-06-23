@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Xray</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('xrays.store') }}" method="POST">
                @csrf

                  <div class="form-group">
                    <label>Ticket</label>
                    <select class="form-control" name="ticket_id">
                        @foreach ($tickets as $ticket)
                        <option value="{{$ticket->id}}" >{{$ticket->id}}</option>
                        @endforeach
                    </select>
                  </div>

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title"  placeholder="Enter Title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Type:</label>
                        <input type="text" class="form-control" name="type"  placeholder="Enter Type">
                    </div>
                    <div class="form-group">
                        <label>Number:</label>
                        <input type="number" class="form-control" name="number" placeholder="Enter number">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
