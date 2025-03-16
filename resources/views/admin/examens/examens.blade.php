@extends('admin.layout.layout')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Section</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <a style="max-width: 150px; float: right; display: inline-block;"
                href="{{ url('admin/add-edit-examen') }}" class="btn btn-outline-success">
                Add examen</a>
              <h5 class="card-title">examens</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable"   id="sec">
                <thead>
                  <tr>
                    <th>
                     ID
                    </th>
                    <th>Name</th>
                    <th>date d'ajout</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($examns as $examn)


                  <tr>
                    <td>{{$examn['id']}}</td>
                    <td>{{$examn['examen_name']}}</td>
                    <td>{{ date('Y-m-d h:i:s',strtotime($examn['created_at']))}}</td>

                </td>
                <td>
                    <a href="{{ url('admin/add-edit-examen/'.$examn['id']) }}">
                    <i style="font-size: 25px;" class="bi bi-brush-fill"></i></a>
                    <a href="javascript:void(0)" module="examen" moduleid="{{ $examn ['id'] }}" title="examen" class="confirmDelete">
                    <i style="font-size: 25px;color:brown;"  class="bi bi-trash-fill"></i></a>
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
