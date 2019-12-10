<nav id="menu">
    <label for="tm" id="toggle-menu">Rabbit Express<span class="drop-icon"><i
                class="fas fa-caret-down"></i></span></label>
    <input type="checkbox" id="tm">
    <ul class="main-menu clearfix">
        <li><a href="{{url("/")}}">Rabbit Express</a></li>
        <li><a href="{{url("/")}}">Home</a></li>
        <li><a href="{{url("/shirts")}}">Products</a></li>
        <li class="float-right">
            <a href="{{url('cart/cartItems')}}">
                <i class="fas fa-shopping-cart 7x"></i>
                CART
                <span class="badge badge-info">
                    {{Session::has("cart") ? Session::get("cart")->totalQuantity:'0'}}
                </span>
            </a>
        </li>
        @if (Auth::check())
        <li class="float-right">
            <a href="#"> {{ Auth::user()->name }}
                <span class="drop-icon"><i class="fas fa-caret-down"></i></span>
                <label title="Toggle Drop-down" class="drop-icon"><i class="fas fa-caret-down"></i></label>
            </a>
            <input type="checkbox">
            <ul class="sub-menu">
                    <li><a href="{{url("/profile/index")}}">Profile</a></li>
                    <li><a href="{{url("/logout")}}">Logout</a></li>
            </ul>
        </li>
        @else
        <li class="float-right">
            <a href="{{url("/login")}}">
                Login
            </a>
        </li>
        <li class="float-right">
            <a href="{{url("/register")}}">
                Register
            </a>
        </li>
        @endif
        @include("admin.layout.includes.categoryList")
    </ul>
</nav>