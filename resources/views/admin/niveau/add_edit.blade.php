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
              <form @if (empty($niveau ['id'] )) action="{{url('admin/add-edit-niveau')}}"  @else action="{{url('admin/add-edit-niveau/'.$niveau ['id']) }}"@endif method="post"
               enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="niveau_name" class="col-sm-2 col-form-label">niveau Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="niveau_name" placeholder="Entrer niveau_name" name="niveau_name"
                    @if (!empty($niveau['name'])) value="{{ $niveau ['name'] }}" @else value="{{ old('niveau_name') }}" @endif>
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="section_id">Section </label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label=" select section " name="section_id" id="section_id" style="color:#008000;" >
                        <option value=""> select</option>
                        @foreach($getSections as $section)
                      <option value="{{ $section ['id'] }}" @if(!empty($niveau ['section_id'] ) && $niveau ['section_id']  == $section ['id'] )  selected="" @endif >{{ $section ['name'] }}</option>
                      @endforeach
                      </select>
                    </div>
                </div>
                <div id="appendNiveauLevel">
                    @include('admin.niveau.append_niveau_level')
                </div>
                <div class="row mb-3">
                    <label for="section_name" class="col-sm-2 col-form-label">url</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="url" placeholder="Entrer url" name="url"
                      @if (!empty($niveau['url'])) value="{{ $niveau ['url'] }}" @else value="{{ old('url') }}" @endif>
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
