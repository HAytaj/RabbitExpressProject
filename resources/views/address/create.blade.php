@extends('layout.main')
@section("title","New Address Form")
@section('content')
<h1>Shipping Information</h1>
{!! Form::open(["action" => "AddressesController@store","method"=>"POST"]) !!}
{{csrf_field()}}
<div class="form-group">
       {{Form::label('address', 'Enter Address')}}
       {{Form::text('address', '', ['class' => 'form-control'])}}
</div>
<div class="form-group">
       {{Form::label('country_id', 'Enter country')}}
       {{Form::select('country_id',$countries, null, ["id"=>"countries","class"=>"form-control",'placeholder' => 'Select a country'])}}
</div>
<div class="form-group">
       {{Form::label('city_id', 'Enter city')}}
       {{-- {{Form::select('city_id',null, null, ["id"=>"cities","class"=>"form-control",'placeholder' => 'Select a city'])}}
       --}}
       <input type="hidden" name="city_id" id="hidden-city-id">
       <select class="form-control" id="city-select">
              <option id="city-select-placeholder">Select a city</option>
       </select>
</div>
<div class="form-group">
       {{Form::label('zip', 'Enter Zip')}}
       {{Form::number('zip', '', ['class' => 'form-control'])}}
</div>

<div class="form-group">
       {{Form::submit('Submit',["class"=>"btn btn-primary"])}}
</div>

{!! Form::close() !!}
@endsection

@section('scripts')
<script>
$(document).on("ready",function(){

$("#countries").on("change",function(e){
       let id = $("#countries").val();

       e.preventDefault();
       $.ajax({
              type: 'POST',
              url: '/address/appropriateCities/'+id,
              success: function(cities) {
              $("#city-select").empty();
              $("#city-select").append("<option>Select a city</option>");
              for(let i = 0; i < Object.keys(cities).length; i++)              
              {
                     $("#city-select").append("<option value='"+Object.values(cities)[i].id+"'>"+ Object.values(cities)[i].name+"</option>");
              }
              },
              error: function(data) {
              alert("eeror");
              }
       });
       return false;
});

$("#city-select").on("change",function(){
       $("#hidden-city-id").val($(this).val());
       console.log($(this).val());
});
});
</script>

@endsection