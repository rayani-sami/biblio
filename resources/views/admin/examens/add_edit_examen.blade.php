@extends('admin.layout.layout')
@section('content')

 <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>

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
              <form @if (empty($examen ['id'] )) action="{{url('admin/add-edit-examen')}}"  @else action="{{url('admin/add-edit-examen/'.$examen ['id']) }}"@endif method="post"
               enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="examen_name" class="col-sm-2 col-form-label">examen </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="examen_name" placeholder="Entrer examen_name" name="examen_name"
                    @if (!empty($examen['examen_name'])) value="{{ $examen ['examen_name'] }}" @else value="{{ old ('examen_name') }}" @endif>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">description </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="description" placeholder="Entrer description" name="description"
                      @if (!empty($examen['description'])) value="{{ $examen ['description'] }}" @else value="{{ old ('description') }}" @endif>
                    </div>
                  </div>
                <div class="form-group">
                    <label for="specialite">Spécialité</label>
                    <select class="form-control" id="specialite" name="specialite">
                        @foreach($specialites as $specialite)
                            <option value="{{ $specialite['id'] }}">{{ $specialite['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <select class="form-control" id="niveau" name="niveau">
                        @foreach($niveaux as $niveau)
                            <option value="{{ $niveau['id']}}">{{ $niveau['niveau_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="pdf">PDF de l'examen</label>
                    <input type="file" class="form-control" id="examen_pdf" name="examen_pdf">
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
