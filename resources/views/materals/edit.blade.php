@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">EDIT MATERALS</div>
                    @if(count($errors)>0)
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li> {{ $error}} </li>
                        @endforeach
                    </ul>
                    @endIf
                <div class="card-body">
                <form action="{{ route('materals.update',$materal) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="products">Products</label>
                        <select class="form-control" id="products" name="product_id">
                            @foreach ($products as $product)
                                @if ($product->id == $materal->product_id)
                                        <option value="{{$product->id}}" selected>{{$product->name}}</option>
                                @else
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- {{$product->id}}
                        <br> 
                        {{$materal->product_id}} --}}
                        {{-- {{ Auth::user()->email }} --}}
                        {{$materal->product->named ?? 'N/A'}}
                       
                        @php
                        $one = Array(1,2,4,5,6);
                        @endphp
                        @if(in_array(1,$one))
                            {{$two = 1}}
                        @else
                             {{1}}
                       @endif
                       {{$three = $two +3}}
                       @if ($three == 4)
                           {{!! '<h3 class="text-danger">♥</h3>' !!}}
                       @else
                           {{!! '<h3 class="text-warning">♥</h3>' !!}}    
                       @endif
                        <div class="form-check">
                                @foreach ($tags as $tag)
                                    <input class="form-check-input" type="checkbox" name="tags[]"  value="{{$tag->id}}" id="{{$tag->tag}}"
                                        @foreach ($materal->tag as $item)
                                            @if ($tag->id == $item->id)
                                            checked
                                            @endif
                                        @endforeach
                                    >
                                <label class="form-check-label text-info" for="{{$tag->tag}}">
                                    {{$tag->tag}}
                                </label><br>
                                @endforeach
                      </div>

                    <div class="form-group">
                        <label for="name">Edit Name:</label>
                        <input type="text" class="form-control" name="name"  value="{{ $materal->name }}">
                    </div>
                    <div class="form-group">
                        <label for="many">Edit Number</label>
                        <input type="number" class="form-control" name="many" min="0" max="100"  value="{{ $materal->many }}">

                        @php
                        $z = array();
                        @endphp
                        @for($i=0;$i<=100;$i++)
                            @php
                                $z[] = $i;
                            @endphp
                         @endfor
                            <select class="form-control"  name="many">
                                @foreach ($z as $item)
                                    @if ($item == $materal->many)
                                    <option value="{{$item}}" selected>{{ $item }}</option>
                                    @else
                                    <option value="{{$item}}" >{{ $item }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @if (in_array($materal->many,$z))
                            @php
                            $a = Array(20,21,22,23,24,25);
                            $b = Array(26,27,28,29,30,31,32,33,34,35,36,37,38,39);
                            $c = Array(40,41,42,43,44,45,46,47,48,49);
                            @endphp
                                @if ($materal->many <= 19 )
                                    {{'Less than 20'}}
                                    @php
                                     $avg = 3;  
                                    @endphp
                                @elseif(in_array($materal->many,$a))
                                    {{'20 - 25'}}
                                    @php
                                     $avg = 2;  
                                    @endphp
                                @elseif(in_array($materal->many,$b))
                                    {{'26 - 39'}}
                                    @php
                                     $avg = 0;  
                                    @endphp
                                @elseif(in_array($materal->many,$c))
                                    {{'40 - 49'}}
                                    @php
                                     $avg = 2;  
                                    @endphp
                                @else
                                    {{'50 or more'}}
                                    @php
                                     $avg = 3;  
                                    @endphp
                                @endif
                            {!! '<h1 class="text-info">♥</h1>' !!}
                            <input type="text" class="form-control" value="{{$avg+9}}">
                        @else
                            
                        @endif
                          



@php
    // function add(){ // طريقة حساب معدل الارقام وهي بجمع الارقام والتقسيم على عددهن
    //         $data = [
    //             1,2,3
    //         ];
    //         return collect($data)->avg(); 
    //     };

    // function add(){ // طريقة حساب معدل الارقام اذا كانت اسوسيتف اري
    //     $data = [
    //         ['price' => 10000],
    //         ['price' => 20000],
    //         ['price' => 30000]
    //     ];
    //     return collect($data)->avg('price');
    // };

    // function add(){ // طريقة حساب معدل الارقام اذا كانت اسوسيتف اري اكثر من حقل في آن واحد 
    //     $data = [
    //         ['price' => 10000, 'tax' => 500],
    //         ['price' => 20000, 'tax' => 700],
    //         ['price' => 30000, 'tax' => 900]
    //     ];
    //     return collect($data)->avg(function($value){
    //         return $value['price'] + $value['tax'];
    //     }); 
    // };

    // function add(){ // طريقة حساب معدل الارقام اذا كانت اسوسيتف اري اكثر من حقل في آن واحد مع شرط وجود الاكتف غير فعاله فالذي يحسب عكسه 
    //     $data = [
    //         ['price' => 10000, 'tax' => 500, 'active' => false],
    //         ['price' => 20000, 'tax' => 700, 'active' => false],
    //         ['price' => 30000, 'tax' => 900, 'active' => true]
    //     ];
    //     return collect($data)->avg(function($value){
    //         if( ! $value['active']) {
    //             return null;
    //         }
    //         return $value['price'] + $value['tax'];
    //     }); 
    // };

    // function add(){ // اكبر رقم في المجموعة 
    //     $data = [
    //        10000,
    //        20000,
    //        30000
    //     ];
    //     return collect($data)->max(); 
    // };
  
    // function add(){ // اكبر رقم في المجموعة من خلال الاسوسيتف اري 
    //     $data = [
    //         ['price' => 10000 ],
    //         ['price' => 20000 ],
    //         ['priceoooo' => 30000 ]
    //     ];
    //     return collect($data)->max('price'); 
    // };

    // function add(){ // اكبر رقم في المجموعة 
    //     $data = [
    //         ['price' => 10000, 'tax' => 500],
    //         ['price' => 20000, 'tax' => 700],
    //         ['price' => 30000, 'tax' => 900]
    //     ];
    //     return collect($data)->max(function($value){
           
    //         return $value['price'] + $value['tax'];
    //     }); 
    // };

    // function add(){ // اكبر رقم في المجموعة 
    //     $data = [
    //         ['price' => 10000, 'tax' => 500, 'active' => false],
    //         ['price' => 20000, 'tax' => 700, 'active' => true],
    //         ['price' => 30000, 'tax' => 900, 'active' => false]
    //     ];
    //     return collect($data)->max(function($value){
    //         if( ! $value['active']) {
    //             return null;
    //         }
    //         return $value['price'] + $value['tax'];
    //     }); 
    // };

    // function add(){ //متوسط رقم في المجموعة
    //     $data = [
    //        10000,
    //        20000,
    //        30000
    //     ];
    //     return collect($data)->median(); 
    // };

    //  function add(){ // متوسط رقم في المجموعة من خلال الاسوسيتف اري 
    //     $data = [
    //         ['price' => 10000 ],
    //         ['price' => 20000 ],
    //         ['price' => 30000 ]
    //     ];
    //     return collect($data)->median('price'); 
    // };

    //  function add(){ //اصغر رقم في المجموعة
    //     $data = [
    //        10000,
    //        20000,
    //        30000
    //     ];
    //     return collect($data)->min(); 
    // };

    //   function add(){ // اصغر رقم في المجموعة من خلال الاسوسيتف اري 
    //     $data = [
    //         ['price' => 10000 ],
    //         ['price' => 20000 ],
    //         ['price' => 30000 ]
    //     ];
    //     return collect($data)->min('price'); 
    // };

    //  function add(){ // اصغر رقم في المجموعة 
    //     $data = [
    //         ['price' => 10000, 'tax' => 500],
    //         ['price' => 20000, 'tax' => 700],
    //         ['price' => 30000, 'tax' => 900]
    //     ];
    //     return collect($data)->min(function($value){
           
    //         return $value['price'] + $value['tax'];
    //     }); 
    // };

    // function add(){ // اصغر رقم في المجموعة 
    //         $data = [
    //             ['price' => 10000, 'tax' => 500, 'active' => false],
    //             ['price' => 20000, 'tax' => 700, 'active' => true],
    //             ['price' => 30000, 'tax' => 900, 'active' => false]
    //         ];
    //         return collect($data)->min(function($value){
    //             if( ! $value['active']) {
    //                 return null;
    //             }
    //             return $value['price'] + $value['tax'];
    //         }); 
    // };


    //  function add(){ // [1,2,3,4,5,6] // دمج المصفوفات بمصفوفة واحده
    //     $data = [
    //        [1,2,3],
    //        [4,5,6]
    //     ];
    //     return collect($data)->collapse(); // ->first()
    // };

    // function add(){ // [["array1"],["array2"],3,4,5] // دمج المصفوفات بمصفوفة واحده
    //     $data = [
    //        [0 => ['array1']],
    //        [1 => ['array2']],
    //        [3,4,5]
    //     ];
    //     return collect($data)->collapse(); // ->first()
    // };

    // function add(){ // [1,9,3,4] or [[1,9,3,4],{"4":5,"5":6,"6":7,"7":8}] // دمج المصفوفات بمصفوفة واحده
    //     $data = [
    //       1, 2, 3, 4, 5, 6, 7, 8
    //     ];
    //     return collect($data)->chunk(3); //->first()
    // };

    // function add(){ // {"colmun1":"value1","colmun2":"value2"} // دمج المصفوفات بمصفوفة واحده
    //     $data = collect(['colmun1','colmun2']);
    //     return $data->combine(['value1','value2']);
    // };

    // function add(){ // {"colmun1":{"value1":123},"colmun2":{"value2":456}} // دمج المصفوفات بمصفوفة واحده
    //     $data = collect(['colmun1','colmun2']);
    //     return $data->combine([
    //         ['value1' => 123],
    //         ['value2' => 456]
    //     ]);
    // };

    // function add(){ // ["value1","value2"] // دمج المصفوفات بمصفوفة واحده
    //     $data = collect(['value1']);
    //     return $data->concat(['value2']);
    // };

    // function add(){ // {"key2":"value1","0":"value2"}// دمج المصفوفات بمصفوفة واحده
    //     $data = collect(['key2' => 'value1']);
    //     return $data->concat(['key1' => 'value2']);
    // };

    // function add(){ //  {"2":3,"1":2,"0":1}// دمج المصفوفات بمصفوفة واحده
       
    //     return collect([1,2,3])->reverse();
    // };

    // function add(){ //  {"1":{"product":"Banana","price":50}}// بحث عام
    //     return collect([
    //         ['product' => 'apple', 'price' => 60],
    //         ['product' => 'Banana', 'price' => 50],
    //         ['product' => 'Tamato', 'price' => 40],
    //         ['product' => 'Vagtable', 'price' => 30],
    //         ['product' => 'Orang', 'price' => 20] //50
            
    //         ])->where('price',50);
    // };

    // function add(){ //  {"1":{"product":"Banana","price":50}}// بحث صارم ودقيق سواء احرف او ارقام
    //         return collect([
    //         ['product' => 'apple', 'price' => 60],
    //         ['product' => 'Banana', 'price' => 50],
    //         ['product' => 'Tamato', 'price' => 40],
    //         ['product' => 'Vagtable', 'price' => 30],
    //         ['product' => 'Orang', 'price' => 20] //50
            
    //         ])->whereStrict('price',50);
    // };

    // function add(){ //      {"0":{"product":"apple","price":60},"2":{"product":"Tamato","price":90}}// بحث صارم ودقيق سواء احرف او ارقام
    //         return collect([
    //         ['product' => 'apple', 'price' => 60],
    //         ['product' => 'Banana', 'price' => 50],
    //         ['product' => 'Tamato', 'price' => 90],
    //         ['product' => 'Vagtable', 'price' => 30],
    //         ['product' => 'Orang', 'price' => 20]
            
    //         ])->where('price','>', 50); // === <= >= !=
    // };

    // function add(){ //      {"0":{"product":"apple","price":60},"2":{"product":"Tamato","price":90}}// بحث صارم ودقيق سواء احرف او ارقام
    //         $collection = collect([
    //                 ['product' => 'apple', 'price' => 60],
    //                 ['product' => 'Banana', 'price' => 50],
    //                 ['product' => 'Tamato', 'price' => 90],
    //                 ['product' => 'Vagtable', 'price' => 30],
    //                 ['product' => 'Orang', 'price' => 20]
    //             ]);
    //         $newCollection = $collection->where('price','>', 50); // === <= >= !=
    //     return $newCollection;
    // };

    //  function add(){ //     {"0":{"product":"apple","price":60},"1":{"product":"Banana","price":50},"3":{"product":"Vagtable","price":30}}// بحث صارم ودقيق سواء احرف او ارقام
    //         $collection = collect([
    //                 ['product' => 'apple', 'price' => 60],
    //                 ['product' => 'Banana', 'price' => 50],
    //                 ['product' => 'Tamato', 'price' => 90],
    //                 ['product' => 'Vagtable', 'price' => 30],
    //                 ['product' => 'Orang', 'price' => 20]
    //             ]);
    //         $newCollection = $collection->whereBetween('price',[30,60]); // === <= >= !=
    //     return $newCollection;
    // };

    //    function add(){ //     {"0":{"product":"apple","price":60},"1":{"product":"Banana","price":50},"3":{"product":"Vagtable","price":30}}// بحث صارم ودقيق سواء احرف او ارقام
    //             return collect([
    //             ['product' => 'apple', 'price' => 60],
    //             ['product' => 'Banana', 'price' => 50],
    //             ['product' => 'Tamato', 'price' => 90],
    //             ['product' => 'Vagtable', 'price' => 30],
    //             ['product' => 'Orang', 'price' => 20]
                
    //             ])->whereBetween('price',[30,60]); // === <= >= !=
    //     };

       function add(){ //      {"2":{"product":"Tamato","price":90},"4":{"product":"Orang","price":20}}// بحث صارم ودقيق سواء احرف او ارقام
                return collect([
                ['product' => 'apple', 'price' => 60],
                ['product' => 'Banana', 'price' => 50],
                ['product' => 'Tamato', 'price' => 90],
                ['product' => 'Vagtable', 'price' => 30],
                ['product' => 'Orang', 'price' => 20]
                
                ])->whereNotBetween('price',[30,60]); // === <= >= !=
        };
@endphp 
<pre>
    {{add()}}
</pre>

                        {{-- @php
                        print_r($z);
                        // print_r(count($z));
                        @endphp --}}


                        {{-- @php
                        print_r($g= Array(1990,1980,1986));
                        @endphp --}}


                    </div>
                    <div class="form-group">
                        <label for="photo">Edit Photo</label>
                        <input type="file" class="form-control-file" name="photo" value="{{ $materal->photo }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
