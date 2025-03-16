@extends('subfront.layout.layout')
@section('content')


<div class="content-body">
<div class="container-fluid">
	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">liste des examns</h4>

            <br>
            </div>


             @if(Session::has('success_message'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success: </strong> {{Session::get('success_message')}}
             <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
          </div>

           @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850"   class="datatable">
                        <thead>
                            <tr>
                                
                                <th>cours</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cours as $projet)


                            <tr>
                                <td>
                                    {{$projet['name']}}
                                </td>
                                <td>
                                    <a title="telecharger Pdf "  href="{{ route('download',$projet->id)  }}">

                                        <i style="font-size: 45px;" class="mdi mdi-file-pdf"></i></a>
                     
                                        
                                        <a title="View pdf"  href="{{ route('pdf', ['id' => $projet->id]) }}">
                     
                     
                                         <i style="font-size: 45px;" class="mdi mdi-printer"></i></a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection
