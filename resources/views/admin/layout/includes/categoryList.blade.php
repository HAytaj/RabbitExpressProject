@if (count($categories) >= 1)
    
@foreach($categories["root"] as $category)
@if(isset($categories[$category->id]))
<li>
    <a href="{{url('shirts/'.$category->id)}}">{{ $category->name }}
        <span class="drop-icon"><i class="fas fa-caret-down"></i></span>
        <label title="Toggle Drop-down" class="drop-icon"><i class="fas fa-caret-down"></i></label>
    </a>
    <input type="checkbox">
    @include('admin.layout.includes.categoryListItem',["childs"=>$categories[$category->id]])
</li>
    @else
<li>
<a href="{{url('shirts/'.$category->id)}}">{{ $category->name }}</a>
</li>

@endif
@endforeach
@endif
