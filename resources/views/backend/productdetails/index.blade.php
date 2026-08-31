@extends('layouts.backend')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- BreathCrum -->
            @include('partials.breadcrumb')

            <div class="right-mob-left">
                <a href="{{ route('productdetail.create', ['umrah_product_id' => request('umrah_product_id')]) }}">
                    <button type="button" class="main-btn primary-btn btn-hover btn-xs">Create</button>
                </a>
            </div>

            <div class="card-style mt-20">
                <div class="table-wrapper table-responsive mt-10">
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Title</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Status</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productdetails as $productdetail)
                                <tr>

                                    <td>
                                        <p> {{ $productdetail->title ?? '---'}} </p>
                                    </td>

                                    <td class="text-center">
                                        @php if ($productdetail->active == '1') {
                                                $class = 'activelabel';
                                                $data = 'Active';
                                            } else {
                                                $class = 'inactivelabel';
                                                $data = 'Inactive';
                                        } @endphp
                                        <div class="{{ $class }}">{{ $data }}</div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{ route('productdetail.edit', $productdetail->id) }}"><i class="lni lni-pencil-alt"></i></a>
                                        <a href="{{ route('productdetail.show', $productdetail->id) }}"><i class="lni lni-list"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('partials.pagination', ['items' => $productdetails])
        </div>
    </section>
@endsection
