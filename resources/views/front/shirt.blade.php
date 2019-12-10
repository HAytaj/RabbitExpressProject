@extends('layout.main')
@section('title', $product->name)
@section('content')
<!-- products listing -->
<!-- Latest SHirts -->

<div class="row">
    <div class="col-md-4 col-sm-6 text-center">
        <img style="object-fit:contain;width:300px;height:300px;"
            src="{{route('image', $product->image_name)}}" />

    </div>
    <div class="col-md-8 col-sm-6">
        <h1>${{$product->price}}</h1>
        <a href="{{url('cart/store/'.$product->id)}}" class="btn btn-primary add-to-cart"><i
            class="fas fa-cart-plus"></i> Add to Cart</a>
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
        {!! Form::open(["action" => ["FrontController@changeSize",$product->id],"method"=>"PUT", "class"=>"size-form"])
        !!}
        {{ csrf_field() }}

        {{-- Change Size --}}
        <div class="form-group">
            {{Form::label('size', 'Enter size')}}
            {{Form::select('size',["S"=>"Small","M"=>"Medium","L"=>"Large"], $product->size, ["class"=>"form-control",'placeholder' => 'Pick the size'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Change the Size',["class"=>"btn btn-primary float-right size-form-btn"])}}
        </div>
        {!! Form::close() !!}

    </div>


</div>
<hr>
<div>
    <button type="button" data-toggle="modal" data-target="#exampleModal"
        class="btn btn-warning float-right align-middle">Write
        Review</button>
    <h1>All Reviews</h1>

    @if (count($reviews) == 0)
    <p>No Reviews yet</p>
    @else
    @foreach ($reviews as $review)
    <div class="p-3 bg-light row border border-secondary my-3">
        <div class="col-md-3 col-sm-6 my-1 p-3 border border-secondary">
            <div class="text-left">
                <h3>
                    @for ($i = 1; $i <= $review->rating; $i++)
                        <i class="fas fa-star review-star"></i>
                        @endfor
                </h3>
                {{$review->user->name}}
                <small>{{date('d/m/Y',strtotime($review->created_at))}}</small>
            </div>

        </div>
        <div class="col-md-9 col-sm-6">
            @if (auth()->user() != null)
            @if($review->user->id == auth()->user()->id)
            <div>
                {!! Form::open(["action" => ["ProfileController@destroy",
                $review->id],"method"=>"DELETE","class"=>"float-right"]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {{Form::submit('Delete',["class"=>"delete-btn btn btn-danger"])}}
                </div>

                {!! Form::close() !!}
            </div>
            @endif
            @endif
            <h3 class="text-left">{{$review->title}}</h3>
            <p class="text-left">{{$review->body}}</p>
        </div>
    </div>
    @endforeach
    @endif
    {{$reviews->links()}}
</div>

<!-- Create Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Reviews --}}
                {!! Form::open(["route" => "profile.storeReview","method"=>"POST","id"=>"review-form"]) !!}
                {{ csrf_field() }}
                {{-- Stars--}}
                <div>
                    <i class="fas fa-star review-star-hover" data-star="0"></i>
                    <i class="fas fa-star review-star-hover" data-star="1"></i>
                    <i class="fas fa-star review-star-hover" data-star="2"></i>
                    <i class="fas fa-star review-star-hover" data-star="3"></i>
                    <i class="fas fa-star review-star-hover" data-star="4"></i>
                </div>
                <div class="form-group">
                    {{Form::hidden('rating', '', ['min'=>1,'max'=>5,'class' => 'form-control',"id"=>"rating-value"])}}
                </div>
                <small>Use only letters, please</small>
                <div class="form-group">
                    {{Form::label('title', 'Enter title')}}
                    {{Form::text('title', '', ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('body', 'Enter body')}}
                    {{Form::textarea('body', '', ['class' => 'form-control'])}}
                </div>
                <input type="hidden" value="{{$product->id}}" name="product_id">
                <div class="form-group">
                    {{Form::submit('Submit',["class"=>"btn btn-primary review-submit-btn"])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
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

        $(".edit-review").on("click",function(){
        let data = $(this).attr("data-rating");
        console.log(data);
        });

        // Star Part


        let overallRating = -1;


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

        $(".delete-btn").on("click",function(){
            if(!confirm("Are you sure")){
                return false;
            }
        });
    });
</script>
@endsection