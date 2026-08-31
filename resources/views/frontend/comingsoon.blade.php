@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">

        <!-- Middle section start -->
        <section class="middlecontarea">
            <div class="container">
                <div class="comingsoonarea">
                    <div class="mainheading">
                        <h2>Coming Soon!</h2>
                    </div>
                    <div class="topmargin10"><a href="{{ route('home') }}"><button type="button" class="primarybtn btnmd">Back
                                to
                                Home</button></a></div>
                </div>
            </div>
        </section>
        <!-- Middle section end -->

    </div>
@endsection
