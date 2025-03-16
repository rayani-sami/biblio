@extends('subfront.layout.layout')
@section('content')
<div class="content-body">
<div class="container-fluid">
	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">liste des rapports</h4>
                <a style="max-width: 130px; float: right; display: inline-block; "
                href="{{ url('subfront/add-edit-rapport') }}" class="btn btn-outline-success">
                ajouter votre rapport</a>
                <br>


            <br>
            </div>
             @if(Session::has('success_message'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success: </strong> {{Session::get('success_message')}}
             <button type="button" class="close" data-dismiss="alert" aria-label="close">x</button>
          </div>
           @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850"   class="datatable">
                        <thead>
                            <tr>
                                <th>titre</th>
                                <th>ajoute par </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rapports as $rapport)


                            <tr>
                                <td>
                                    {{$rapport['titre']}}
                                </td>
                                <td>
                                    {{$rapport['user']['name']}}
                                </td>
                                <td>




               <a title="telecharger Pdf "  href="{{ route('rapportdownload',$rapport['id'])  }}">

                   <i style="font-size: 45px;" class="mdi mdi-file-pdf"></i></a>

                   <a title="View pdf"  href="{{ route('view-pdf', ['id' => $rapport['id']]) }}">

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
