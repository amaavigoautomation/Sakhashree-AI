{{-- @extends('layouts.backend')

@section('content')
<section class="section">
	<div class="container-fluid">
		 <!-- BreathCrum -->
     @include('partials.breadcrumb')



    <!--Add new section start here-->
<div class="card-style mt-20">

            <div class="table-wrapper table-responsive mt-10">
                <table class="table striped-table">
                    <tbody>

                    <tr>
                        <th class='col-md-2'><h6>Video Category</h6></th>
                        <td class=''>
                            <p>{{ $videocategorylanguage->videocategory->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Language</h6></th>
                        <td class=''>
                            <p>{{ $videocategorylanguage->languages->name }}</p>
                        </td>
                    </tr>

                    <tr>
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $videocategorylanguage->name }}</p>
                        </td>
                    </tr>

                    <tr>
                    <th><h6>Status</h6></th>
                    <td>
                      @php if($videocategorylanguage->active == '1'){
                        $class = 'activelabel';
                        $data = 'Active';
                        }
                        else{
                        $class = 'inactivelabel';
                        $data = 'Inactive';
                        } @endphp
                        <div class="{{ $class; }}">{{ $data }}</div>
                    </td>
                    </tr>
                    <tr>
                       <th><h6>Created At</h6></th>
                       <td>
                           <p>{{ $videocategorylanguage->created_at }}</p>
                       </td>
                    </tr>
                    <tr>
                       <th><h6>Updated At</h6></th>
                       <td>
                           <p>{{ $videocategorylanguage->updated_at }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


</div>



	</div>
</section>
@endsection
 --}}
