@extends('admin.layout.layout')
@section('content')



<main id="main" class="main">

    <div class="pagetitle">
      <h1>les abonnees</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable"   id="sec">
                <thead>
                    <tr>
                        <th>
                          ID
                        </th>
                        <th>
                           Email
                        </th>
                        <th>
                           Subscribed on
                         </th>


                        <th>
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                    <tr>
                        <td>
                        {{ $subscriber ['id']}}
                        </td>
                        <td>
                        {{ $subscriber ['email']}}
                        </td>
                        <td>
                            {{ date('F j, Y, g:i a',strtotime($subscriber['created_at']))}}
                         </td>

                        <td>
                            <a href="javascript:void(0)" module="subscriber" moduleid="{{ $subscriber ['id'] }}" title="examen" class="confirmDelete">
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
