@extends('admin.layout.layout')
@section('content')
<main id="main" class="main">



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <a style="max-width: 150px; float: right; display: inline-block;"
                href="{{ url('admin/add-edit-niveau') }}" class="btn btn-outline-success">
                Add Niveau</a>
              <h5 class="card-title">Niveau</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable" class="responsive"  id="niveaux"  >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Niveau</th>
                    <th>parent niveau </th>
                    <th>Section</th>
                    <th>Url</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
               @foreach ($niveaux as $niveau)
                     @if(isset($niveau['parentniveau'] ['niveau_name'])&&!empty(
                      $niveau ['parentniveau'] ['niveau_name']
                    ))
                       @php $parent_niveau=$niveau ['parentniveau'] ['niveau_name']; @endphp
                    @else
                        @php $parent_niveau = "Root" ;

                        @endphp
                   @endif

                  <tr>
                    <td>{{$niveau['id']}}</td>
                    <td>{{$niveau['niveau_name']}}</td>
                    <td>{{$parent_niveau}}</td>
                    <td>{{$niveau['section']['name']}}</td>
                    <td>{{$niveau['url']}}</td>

                    <td>
                    @if($niveau ['status']==1)
                    <a   class="updateNiveauStatus"    id=" niveau-{{ $niveau ['id']}}" niveau_id="{{ $niveau ['id']}}"
                   href="javascript:void(0)">
                   <i style="font-size: 25px;" class="bi bi-toggle-on"  status="Active"></i></a>
                    @else
                    <a   class="updateNiveauStatus"    id=" niveau-{{ $niveau ['id']}}" niveau_id="{{ $niveau ['id']}}"
                   href="javascript:void(0)">
                     <i style="font-size: 25px;" class="bi bi-toggle-off" status="Inactive"></i></a>
                    @endif
                </td>
                <td>
                    <a href="{{ url('admin/add-edit-niveau/'.$niveau['id']) }}">
                    <i style="font-size: 25px;" class="bi bi-brush-fill"></i></a>
                    <a href="javascript:void(0)" module="niveau" moduleid="{{ $niveau ['id'] }}" title="niveau" class="confirmDelete">
                        <i style="font-size: 25px;color:brown;" class="bi bi-trash-fill"></i></a>
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

@endsection
