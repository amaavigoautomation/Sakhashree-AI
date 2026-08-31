<!-- ======== sidebar-nav start =========== -->
<?php $currentRouteName = Route::currentRouteName(); ?>
<aside class="sidebar-nav-wrapper">
    <div class="searchscroller">
        <div class="navbar-logo">
            <a href="{{ route('dashboards.index') }}">
                <img src="{{ asset('dist/img/logo.svg') }} " alt="Sakhashree" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                @include('partials.adminMenu')
            </ul>
        </nav>
    </div>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->
