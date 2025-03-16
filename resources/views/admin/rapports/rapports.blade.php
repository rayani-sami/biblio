@extends('admin.layout.layout')
@section('content')
<main id="main" class="main">



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title">liste des rapports</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable" class="responsive"  id="niveaux"  >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>titre</th>
                    <th>ajoute par </th>
                    <th>Rapport </th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
               @foreach ($rapports as $rapport)

                  <tr>
                    <td>{{$rapport['id']}}</td>

                    <td>{{$rapport['titre']}}</td>
                    <td>{{$rapport  ['user'] ['name']}}</td>
                    <td>

                        <a title="View pdf"  href="{{ route('rapport_pdf', ['id' => $rapport['id']]) }}">


                            <i style="font-size: 45px;" class="bi bi-file-pdf"></i></a>
                    </td>

                    <td>
                    @if($rapport ['status']==1)
                    <a   class="UpdateRapportStatus"    id=" rapport-{{ $rapport ['id']}}" rapport_id="{{ $rapport ['id']}}"
                   href="javascript:void(0)">
                   <i style="font-size: 25px;" class="btn btn-outline-info"  status="Active">accepter</i></a>
                    @else
                    <a   class="UpdateRapportStatus"    id=" rapport-{{ $rapport ['id']}}" rapport_id="{{ $rapport ['id']}}"
                   href="javascript:void(0)">
                     <i style="font-size: 25px;" class="btn btn-outline-danger" status="Inactive">refuser</i></a>
                    @endif
                </td>
                <td>
                    <a href="javascript:void(0)" module="rapport" moduleid="{{ $rapport ['id'] }}" title="rapport" class="confirmDelete">
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
