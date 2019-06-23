@section('sidebar')
    

{{$materalsk->count()}}

<div class="container mt-5 w-25">
        <input type="text" class="js-range-slider" name="my_range" value=""
        data-skin="big"
        data-min="0"
        data-max="100"
        data-from="{{$materalsk->count()}}"
        data-grid="true"
    />
   
</div>

@show
