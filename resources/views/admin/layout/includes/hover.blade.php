@foreach ($items as $item)
<ul class="dropdown-menu">
        <li><a tabindex="-1" href="#">{{$item->name}}</a></li>
</ul>
@if (isset($categories[$item->id]))
@include('admin.layout.includes.hover',["items"=>$categories[$item->id]])
@endif
@endforeach