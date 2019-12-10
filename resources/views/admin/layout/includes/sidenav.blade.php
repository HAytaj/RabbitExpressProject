<div class="bg-dark text-white text-center p-3">
    <h4>Dashboard</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('product.index')}}">All Products</a>
                    <a class="dropdown-item" href="{{route('product.create')}}">Add Product</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Order
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('admin/orders/index/pending')}}">Pending Orders</a>
                    <a class="dropdown-item" href="{{url('admin/orders/index/delivered')}}">Delivered Orders</a>
                    <a class="dropdown-item" href="{{url('admin/orders/index')}}">All Orders</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Address
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('admin/address')}}">Addresses</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('admin/users')}}">Users</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="dropdown">
                <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    City
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{url('admin/city')}}">Cities</a>
                    <a class="dropdown-item" href="{{url('admin/city/create')}}">Add City</a>
                </div>
            </div>
        </li>
        <li class="list-group-item">
                <div class="dropdown">
                    <a style="text-decoration: none;" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Country
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{url('admin/country')}}">Countries</a>
                        <a class="dropdown-item" href="{{url('admin/country/create')}}">Add Country</a>
                    </div>
                </div>
            </li>
    </ul>
</div>