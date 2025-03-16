@extends('subfront.layout.layout')
@section('content')
<div class="content-body">
<div class="container-fluid">
    <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
          @endif
          @if(isset($errorMessage))
    <div class="alert alert-danger">
        {{ $errorMessage }}
    </div>
        @endif
            <div class="card-body">
                <div class="basic-form">
                    <form @if (empty($rapport ['id'] )) action="{{url('subfront/add-edit-rapport')}}"  @else action="{{url('subfront/add-edit-rapport/'.$rapport ['id']) }}"@endif method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group row">


                            <label class="col-sm-3 col-form-label">titre</label>
                            <div class="col-sm-9">
                                <input type="text" id="titre" name="titre"class="form-control" placeholder="titre"
                                @if (!empty($rapport['titre'] )) value="{{ $rapport ['titre'] }}" @else value="{{ old('titre') }}" @endif>
                            </div>
                            <label class="col-sm-3 col-form-label">date</label>


                            <div class="col-sm-9">
                                <input type="date" id="date" name="date" class="form-control" placeholder="date"
                                @if (!empty($rapport['date'] )) value="{{ $rapport ['date'] }}" @else value="{{ old('date') }}" @endif>
                            </div>
                            <label class="col-sm-3 col-form-label">PDF de rapport</label>
                            <div class="col-sm-9">

                                <input type="file" class="form-control" id="pdf" name="pdf">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('scripts')
<script>
    // Function to validate date before March 14, 2024
    function validateDate() {
        var inputDate = document.getElementById('date').value;
        var cutoffDate = new Date('2024-03-14');
        var selectedDate = new Date(inputDate);
        if (selectedDate >= cutoffDate) {
            alert("La date doit être antérieure au 14 mars 2024.");
            return false;
        }
        return true;
    }

    // Attach the validation function to the form submission
    document.querySelector('form').onsubmit = function() {
        return validateDate();
    };
</script>
@endpush
