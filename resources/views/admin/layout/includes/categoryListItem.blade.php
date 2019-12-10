{{-- <ul class="tree navbar-nav">
    @foreach($childs as $child)
    <li class="nav-item">
        {{ $child->name }}
@if (isset($categories[$child->id]))
@include('admin.layout.includes.categoryListItem',["childs"=> $categories[$child->id]])
@endif
</li>
@endforeach
</ul> --}}
@foreach($childs as $child)
<ul class="sub-menu">
        
    @if (isset($categories[$child->id]))
    <li><a href="{{url('shirts/'.$child->id)}}">{{ $child->name }}
    <span class="drop-icon"><i class="fas fa-caret-down"></i></span>
        <label title="Toggle Drop-down" class="drop-icon"><i class="fas fa-caret-down"></i></label>
    </a>
        <input type="checkbox">

    @include('admin.layout.includes.categoryListItem',["childs"=> $categories[$child->id]])

    @else
    <li><a href="{{url('shirts/'.$child->id)}}">{{ $child->name }}</a>
    @endif

</li>
</ul>
@endforeach
