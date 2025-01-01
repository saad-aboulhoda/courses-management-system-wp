<?php
$items = wp_get_nav_menu_items(get_nav_menu_locations()['menu-1']);
?>
<header class="box-shadow">
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">{{ get_bloginfo( 'title' )  }}</a>
            <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto me-2 mb-2 mb-md-0">
                    @foreach ($items as $item)
                                            <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{$item->url}}">{{ $item->title }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="input-group w-fit">
                    <input type="text" class="form-control form-control-sm" placeholder="Search...">
                    <button class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </nav>
</header>