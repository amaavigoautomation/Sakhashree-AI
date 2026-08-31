@extends('layouts.backend')

@section('content')
<section class="section">
    <div class="container-fluid">
        @include('partials.breadcrumb')

        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>
                        <tr>
                            <th class='col-md-2'><h6>Country</h6></th>
                            <td><p>{{ $events->name }}</p></td>
                        </tr>
                        <tr>
                            <th><h6>Status</h6></th>
                            <td>
                                @php 
                                    $class = $events->active == '1' ? 'activelabel' : 'inactivelabel';
                                    $data = $events->active == '1' ? 'Active' : 'Inactive';
                                @endphp
                                <div class="{{ $class }}">{{ $data }}</div>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Created</h6></th>
                            <td><p>{{ $events->created_at }}</p></td>
                        </tr>
                        <tr>
                            <th><h6>Updated</h6></th>
                            <td><p>{{ $events->updated_at }}</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card-style mt-20">
            <div class="table-wrapper table-responsive mt-10">
            <table class="table table-bordered">
                <h4>Event Images</h4>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    
                @foreach ($eventImages as $image => $eventImage)
                    @php
                        $imagePath = $eventImage->image_file ? asset("public/images/event_images/image_file/{$eventImage->image_file}") : asset("dist/no-image.png");
                    @endphp
                    <tr>
                        <td> <p>{{ $eventImage->order }}</p></td>
                        <td><img src="{{ $imagePath }}" alt="Event Image" id="imageBox"> </td>
                        <td>
                            @php if($eventImage->active == '1'){
                                $class = 'activelabel';
                                $data = 'Active';
                                }
                                else{
                                $class = 'inactivelabel';
                                $data = 'Inactive';
                                } @endphp
                                <div class="{{ $class; }}">{{ $data }}</div>
                            </td>    
                        <td>
                            <a href="{{ route('events.edit', ['event' => $events->id, 'image' => $eventImage->id]) }}"><i class="lni lni-pencil-alt"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        </div>
    </div>
</section>
@endsection
