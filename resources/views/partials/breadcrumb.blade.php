<!-- ========== title-wrapper start ========== -->
<?php
// dd($firstKey);

if ($parameteresNames == 'id') {
    $url = !empty($parameteres) ? route($action, ['id' => $parameteres]) : route($action);
} else {
    $url = !empty($parameteres) ? route($action, $firstKey . '=' . $parameteres) : route($action);
    // dd($url);
}

// dd($firstKey);
if (!empty($firstKey)) {
    if ($currentPage != 'index') {
        $moduleUrl = route($PageUrl . '.index') . '?' . $firstKey . '=' . $parameteres;
    } else {
        $moduleUrl = route($action, $firstKey . '=' . $parameteres);
    }
} else {
    $moduleUrl = route($PageUrl . '.index');
}

// dd($moduleUrl);

?>
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-5">
            <div class="title mb-10">
                <h2>{{ ucfirst($PageTitle) }}</h2>
            </div>
        </div>
        <!-- end col -->
        <div class="col-md-7 rowmargin10">
            <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards.index') }}"><i
                                    class="lni lni-home"></i></a></li>
                        <li class="breadcrumb-item " aria-current="page"><a href="{{ $moduleUrl }}"
                                class="active">{{ ucfirst($PageTitle) }}</a></li>
                        <?php if($currentPage != 'index'){ ?>
                        <li class="breadcrumb-item" aria-current="page">
                                <a href="javascript:void(0)" class="active">{{ $currentPage }}</a>
                            </li>
                        <?php } ?>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->
