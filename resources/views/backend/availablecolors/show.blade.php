@extends('layouts.backend')

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
                        <th class='col-md-2'><h6>Name</h6></th>
                        <td class=''>
                            <p>{{ $availablecolor->name ?? '---' }}</p>
                        </td>
                    </tr>

                    
                    <tr>
                        <th class='col-md-2'><h6>Color Code</h6></th>
                        <td class=''>
                            <p>{{ $availablecolor->color_code ?? '---' }}</p>
                        </td>
                    </tr>
 
                    <tr>
                    <th><h6>Status</h6></th>    
                    <td>
                      @php if($availablecolor->active == '1'){
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
                       <th><h6>Created</h6></th>
                       <td>
                           <p>{{ $availablecolor->created_at }}</p>
                       </td>
                    </tr>  
                    <tr>
                       <th><h6>Modified</h6></th>
                       <td>
                           <p>{{ $availablecolor->updated_at }}</p>
                       </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    

</div>


    <!--Add new section end here-->
	</div>
</section>	
@endsection

