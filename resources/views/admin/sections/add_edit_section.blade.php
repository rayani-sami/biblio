@extends('admin.layout.layout')
@section('content')

 <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/sections')}}">section</a></li>
          <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$title}}</h5>
              @if ($errors->any())
              <div class="alert alert-danger">
                   <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
              <!--  Form -->
              <form @if (empty($section ['id'] )) action="{{url('admin/add-edit-section')}}"  @else action="{{url('admin/add-edit-section/'.$section ['id']) }}"@endif method="post"
               enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="section_name" class="col-sm-2 col-form-label">section Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="section_name" placeholder="Entrer section_name" name="section_name"
                    @if (!empty($section['name'])) value="{{ $section ['name'] }}" @else value="{{ old ('section_name') }}" @endif>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
              <!-- End Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>




@endsection
