@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SHOW P</div>
                <div class="card-body">
                    <input type="text" class="js-range-slider" name="" value=""/>



                  {{-- Form Add --}}
                  <form action="{{ route('products') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                      <div class="form-group">
                          <label for="name">Name:</label>
                        
                          <input type="text" class="form-control" name="name"  value="">
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                  </form>

                    {{-- Form Edit --}}
                    {{-- @include('products.edit') --}}

                  {{$products->count('id')+$products->count('id')}}

                 
                {{-- Table --}}
                <table class="table table-striped">
                  <thead>
                      <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                      </tr>
                  </thead>
                <tbody>
               
               
                    @foreach ($products as $product)
                    <tr>
                    <th scope="row">
                        <button 
                        type="button" 
                        class="btn btn-light"    
                        data-placement="left"
                        data-toggle="popover"
                        title= "<h6 class='custom-title'><i class='fa fa-info-circle'></i> Popover Info</h6>"
                        data-content=
                        "
                        <div class='popover-body bg-info'>
                        <table border='2'>
                          <thead>
                            <tr>
                              <th class='bg-danger'>No</th>
                              <th>Name</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                          </tr>
                          </tbody>
                        </table>
                        </div>
                        "
                        >
                        {{ $product->id }}
                        </button>
                    </th>
                    <td>{{ $product->name }}</td>
                    <th> 
                    <a href="{{ route('products.edit',['id' => $product->id]) }}">
                      <i class="far fa-edit"></i>
                    </a>
                    </th>
                    <th> 
                    <a href="{{ route('products.delete',['id' => $product->id]) }}">
                      <i class="far fa-trash-alt"></i>
                    </a>
                    </th>
                    </tr>
                    @endforeach
                </tbody>
                </table>                
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
