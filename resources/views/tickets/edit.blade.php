@extends('layouts.go')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Ticket</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf

                    

                <div class="card-body">
                <form action="{{ route('tickets.update',['id' => $tickets->id]) }}" method="POST">
                @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ?? $tickets->name}}"  placeholder="Enter Name">
                    </div>

                    <div class="container w-100">
                        <input type="text" class="js-range-slider" name="age" value="{{ old('age') ?? $tickets->age}}"
                        data-skin="big"
                        data-min="0"
                        data-max="110"
                        
                       
                    />
                </div>


                    {{-- <div class="form-group">
                        <label for="many">Age:</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age') ?? $tickets->age}}"  placeholder="Enter Age">
                    </div> --}}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="gender" id="gender"  value="{{ old('gender')  ?? $tickets->gender}}"
                        @if ($tickets->gender == 1)
                            checked
                        @else
                            unchecked
                        @endif
                        >                       
                        <label class="custom-control-label" for="gender">Mirred or Unmarred</label>
                      </div>
                    {{-- <div class="form-group">
                        <label>Gender:</label>
                        <input type="text" class="form-control" name="gender" value="{{ old('gender') ?? $tickets->gender}}" placeholder="Enter Gender">
                    </div> --}}
                    <div class="form-group">
                        <label>PLace:</label>
                        <input type="text" class="form-control" name="place" value="{{ old('place') ?? $tickets->place}}" placeholder="Enter PLace">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $tickets->phone}}" placeholder="Enter Phone">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
