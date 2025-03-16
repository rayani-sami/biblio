@extends('admin.layout.layout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Users</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title">All users</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable"   id="users">
                <thead>
                  <tr>
                    <th> ID</th>
                    <th>name</th>
                    <th>email </th>
                    <th>mobile</th>
                    <th>status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
               @foreach ($users as $user)
                  <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['mobile']}}</td>
                    <td>
                    @if($user ['status']==1)
                    <a   class="updateUserStatus"    id=" user-{{ $user ['id']}}" user_id="{{ $user ['id']}}"
                   href="javascript:void(0)">
                   <i style="font-size: 25px;" class="bi bi-toggle-on"  status="Active"></i></a>
                    @else
                    <a   class="updateUserStatus"    id=" user-{{ $user ['id']}}" user_id="{{ $user ['id']}}"
                   href="javascript:void(0)">
                     <i style="font-size: 25px;" class="bi bi-toggle-off" status="Inactive"></i></a>
                    @endif
                </td>
                <td>
                    <a href="javascript:void(0)" module="user" moduleid="{{ $user ['id'] }}" title="user" class="confirmDelete">
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
