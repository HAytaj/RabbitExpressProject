@extends('admin.layout.admin')
@section('title', "Shirts")
@section('content')
<!-- products listing -->
<!-- Latest SHirts -->

<div class="row">

    <div class="col-md-6 col-sm-6 text-center">
        <img style="object-fit:contain;width:300px;height:300px;"
            src="{{route('image', $product->image_name)}}" />

    </div>
    <div class="col-md-6 col-sm-6">
        <h1>${{$product->price}}</h1>
        @if ((int)$product_rating == 0)
        <p>No Rating Yet</p>
        @else
        <h3 class="my-3">{{ (int)$product_rating}}
            @for ($i = 1; $i <= $product_rating; $i++) <i class="fas fa-star review-star"></i>
                @endfor

        </h3>
        @endif

        <small>{{$product->category->name}}</small>
        <h3>{{$product->name}}</h3>
        <p>{{$product->description}}</p>


    </div>

</div>
<div>
    <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-primary float-right mx-2">Edit</a>
    {!! Form::open(["action" => ["ProductsController@destroy", $product->id],"method"=>"DELETE"]) !!}
 
     <div class="form-group">
            {{Form::submit('Delete',["class"=>"btn btn-danger float-right", "id" => "delete-btn"])}}
     </div>
     
{!! Form::close() !!}
    
</div>
@endsection
@section("scripts")
<script>
    $("document").ready(function(){
        $(".review-submit-btn").on("click",function(e){
            $("#review-form").submit();
        });


        $(".size-form-btn").on("click",function(){
            $(".size-form").submit();
        });

// Star Part


let overallRating = -1;


$("document").on("click",function(event) {
    if (!$(event.target).closest(".review-star-hover").length) {
        for(let i=0; i<= 4; i++)
                $(".review-star-hover").eq(i).css("color","black");  
    }
});


        $(".review-star-hover").on("mouseover",function(){
            let id = $(this).attr("data-star");
            for(let i=0; i<= id; i++)
                $(".review-star-hover").eq(i).css("color","#ffe234");   
           id++;
            for(let i =id; i <= 4; i++)
                $(".review-star-hover").eq(i).css("color","black");
            
        });


        $(".review-star-hover").on("click",function(){
            $(".review-star-hover").css("color","black");
            let id = $(this).attr("data-star");
            overallRating = id;
            for(let i = 0; i <= overallRating; i++){
                $(".review-star-hover").eq(i).css("color","#ffa534");
            }

            $("#rating-value").val(parseInt(overallRating) + 1);

        });

$("#delete-btn").on("click",function(){
    if(!confirm("Are you sure?"))
    {
return false;
    }
});
      
    });
</script>
@endsection