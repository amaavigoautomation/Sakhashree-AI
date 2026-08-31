@extends('layouts.login')
@section('content')

    <section class="signin-section">
        <div class="container">
            <div class="title mb-30 mt-20 text-center"> </div>
            <div class="row g-0 auth-row">
                <div class="col-lg-12 title text-center"> </div>
                <div class="col-lg-3">
                </div>

                <div class="col-lg-6">
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}.
                                    @endforeach
                                </div>
                            @endif
                            <div class="title mb-30">
                                <div class="title mb-30 mt-20 text-center">
                                    <img src="{{ asset('dist/img/logo.svg') }}" alt="Logo" style="width: 100%; height:100px;" />
                                </div>

                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label style="color: black;">Username</label>
                                            <input type="text" placeholder="Username" name="email" required />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label style="color: black;">Password</label>
                                            <input type="password" placeholder="Password" id="password" name="password"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center btnlink"
                                                type='submit'>Sign in</button>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>

            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- ========== signin-section end ========== -->
@endsection
