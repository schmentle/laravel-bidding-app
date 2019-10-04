<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard') }}">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('bids.index') }}">
            <span data-feather="file"></span>
            Bids
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <span data-feather="shopping-cart"></span>
            Products
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <span data-feather="users"></span>
            Users
        </a>
    </li>
</ul>