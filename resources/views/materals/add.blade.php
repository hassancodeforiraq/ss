@extends('layouts.go')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADD MATERALS</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('materals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                     <div class="form-group">
                        <label for="products">Products</label>
                        <select class="form-control" id="products" name="product_id">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-check">
                          @foreach ($tags as $tag)
                          <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{$tag->tag}}">
                          <label class="form-check-label text-info" for="{{$tag->tag}}">
                              {{$tag->tag}}
                          </label><br>
                          @endforeach
                      </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="many">Number</label>
                        <input type="number" class="form-control" name="many"  placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control-file" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
