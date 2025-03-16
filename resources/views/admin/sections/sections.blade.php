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
                href="{{ url('admin/add-edit-section') }}" class="btn btn-outline-success">
                Add Section</a>
              <h5 class="card-title">section</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable"   id="sec">
                <thead>
                  <tr>
                    <th>
                     ID
                    </th>
                    <th>Name</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section)


                  <tr>
                    <td>{{$section['id']}}</td>
                    <td>{{$section['name']}}</td>
                    <td>
                    @if($section ['status']==1)
                    <a   class="updateSectionStatus"    id=" section-{{ $section ['id']}}" section_id="{{ $section ['id']}}"
                   href="javascript:void(0)">
                   <i style="font-size: 25px;" class="bi bi-toggle-on" id="status-{{$section ['id']}}"  status="Active"></i></a>
                    @else
                    <a   class="updateSectionStatus"    id="section-{{$section ['id']}}" section_id="{{$section ['id']}}"
                   href="javascript:void(0)">
                     <i style="font-size: 25px;" class="bi bi-toggle-off" id="status-{{$section ['id']}}" status="Inactive"></i></a>
                    @endif
                </td>
                <td>
                    <a href="{{ url('admin/add-edit-section/'.$section['id']) }}">
                    <i style="font-size: 25px;" class="bi bi-brush-fill"></i></a>
                    <a href="javascript:void(0)" module="section" moduleid="{{ $section ['id'] }}" title="section" class="confirmDelete">
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
