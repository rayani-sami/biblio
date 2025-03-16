@extends('admin.layout.layout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">ho</h5>

              <!-- Horizontal Form -->
              <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" value="{{$enseignantDetails ['enseignant'] ['name']}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" value="{{$enseignantDetails ['enseignant'] ['email']}}" readonly>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">mobile</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" value="{{$enseignantDetails ['enseignant'] ['mobile']}}" readonly>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">image</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" value="{{$enseignantDetails ['enseignant'] ['email']}}" readonly>
                    </div>
                  </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">information proffessionel</h5>

              <!-- Vertical Form -->
              <form class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">departement</label>
                  <input type="text" class="form-control" id="inputNanme4" value="{{$enseignantDetails ['enseignantprofessionel'] ['departement']}}" readonly>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Grade</label>
                  <input type="email" class="form-control" id="inputEmail4" value="{{$enseignantDetails ['enseignantprofessionel'] ['grade']}}" readonly>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">nationnalite</label>
                  <input type="password" class="form-control" id="inputPassword4" value="{{$enseignantDetails ['enseignantprofessionel'] ['nationnalite']}}" readonly>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">statut</label>
                  <input type="text" class="form-control" id="inputAddress"  value="{{$enseignantDetails ['enseignantprofessionel'] ['statut']}}" readonly>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

@endsection
