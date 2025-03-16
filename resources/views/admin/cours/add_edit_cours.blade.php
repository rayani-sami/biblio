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
              <form @if (empty($cour ['id'] )) action="{{url('admin/add-edit-cours')}}"  @else action="{{url('admin/add-edit-cours/'.$cour ['id']) }}"@endif method="post"
               enctype="multipart/form-data">@csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">cours </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Entrer name" name="name"
                    @if (!empty($cour['name'])) value="{{ $cour ['name'] }}" @else value="{{ old ('name') }}" @endif>
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
                    <label for="pdf">PDF de cours</label>
                    <input type="file" class="form-control" id="pdf" name="pdf">
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
