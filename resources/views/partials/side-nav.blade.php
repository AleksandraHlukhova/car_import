<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('proposition.show') }}">
                    <span data-feather="home"></span>
                    Propositions <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bookmark.show') }}">
                    <span data-feather="file"></span>
                    Bookmarks
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <span data-feather="shopping-cart"></span>
                    Log out
                </a>
            </li>
            
        </ul>
    </div>
</nav>