<!-- ========== header start ========== -->
<header class="header">
<div class="container-fluid">
<div class="row">
<div class="col-lg-5 col-md-5 col-6">
<div class="header-left d-flex align-items-center">
<div class="menu-toggle-btn mr-20">
<button id="menu-toggle" class="main-btn primary-btn btn-hover"><i class="lni lni-chevron-left me-2"></i> Menu</button>
</div>
<div class="header-search d-none d-md-flex">
<form action="#" style="position: relative;">
    <input type="text" placeholder="Search..." id="searchInput" autocomplete="off" />
    <button type="button"><i class="lni lni-search-alt"></i></button>

    <div class="search-results">
        <ul class="menu-list">
            <?php foreach ($menuLinks as $key => $menuLink) {
                foreach ($menuLink->children as $childLink) {
                    $routeKey1 = $childLink->link;
                    $url1 = ($routeKey1 != '#') ? route($routeKey1) : '#';
            ?>
            <li data-url="<?php echo $url1; ?>"><?php echo $childLink->title; ?></li>
            <?php }} ?>
        </ul>
    </div>
</form>
</div>
</div>
</div>
<div class="col-lg-7 col-md-7 col-6">
<div class="header-right">
<!-- profile start -->
<div class="profile-box ml-15">
    <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="profile-info">
            <div class="info">
                @php
                    $firstImage = Auth::user()->image;
                    $id = Auth::user()->id;
                    $imagePath = $firstImage ? asset("public/images/users/image/$id/$firstImage") : asset('dist/images/no-image.png');
                @endphp
                <p class="hidden-xs" style="color: black;">{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}</p>
                <div class="image" style="background: #fff">
                    <img src="{{ $imagePath }}" alt="image" />
                    <span class="status"></span>
                </div>
            </div>
        </div>
        <i class="lni lni-chevron-down" style="color: black;"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
        <div class="profileboxinner">
            <div class="profileboxinnerimg">
                <img src="{{ $imagePath }}" alt="profileboxinnerimg">
            </div>
            <h6>{{ (isset(Auth::user()->name)) ? Auth::user()->name : ''; }}</h6>
        </div>
        <li><a href="{{ route('users.show', $id) }}"><i class="lni lni-user"></i> View Profile</a></li>
        <li><a href="{{ route('users.changepassword') }}"><i class="lni lni-alarm"></i> Change Password</a></li>
        <li><a href="{{ route('logout') }}"> <i class="lni lni-exit"></i> Sign Out </a></li>
    </ul>
</div>
<!-- profile end -->
</div>
</div>
</div>
</div>
</header>
<!-- ========== header end ========== -->
