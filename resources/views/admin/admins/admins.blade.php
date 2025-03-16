@extends('admin.layout.layout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1></h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h1 class="card-title">{{$title}}</h1>
              <!-- Table with stripped rows -->
              <table class="table datatable"   id="admins">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>mobile</th>
                    <th>email</th>
                    <th>image</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                  <tr>
                    <td>{{$admin['id']}}</td>
                    <td>{{$admin['name']}}</td>
                    <td>{{$admin['type']}}</td>
                    <td>{{$admin['mobile']}}</td>
                    <td>{{$admin['email']}}</td>
                    <td>
                        @if ($admin ['image']!="")
                        <img src="{{ asset ($admin ['image']) }}" class="rounded-circle" style="height:80 px; height:80px" >
                        @endif
                    </td>
                    <td>
                    @if($admin ['status']==1)
                    <a   class="updateAdminStatus"    id=" admin-{{ $admin ['id']}}" admin_id="{{ $admin ['id']}}"
                   href="javascript:void(0)">
                   <i style="font-size: 25px;" class="bi bi-toggle-on" id="status-{{$admin ['id']}}"  status="Active"></i></a>
                    @else
                    <a   class="updateAdminStatus"    id="admin-{{$admin ['id']}}" admin_id="{{$admin ['id']}}"
                   href="javascript:void(0)">
                     <i style="font-size: 25px;" class="bi bi-toggle-off" id="status-{{$admin ['id']}}" status="Inactive"></i></a>
                    @endif
                </td>
                <td>
                    @if($admin['type']=="enseignant")
                    <a href="{{ url('admin/view-enseignant-details/'.$admin['id']) }}">
                    <i style="font-size: 25px;" class="ri-user-received-fill"></i></a>
                    @endif
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
