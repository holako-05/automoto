@extends($layout)
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="py-3 mb-4">Gestion des factures</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('facture.index') }}">Liste des factures</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header"></h5>
        <form class="card-body" method="POST" action="{{ route('facture.update', ['facture' => $record->id]) }}">
            @csrf
            @method('Put')
            <div class="row g-3">
                   @can('facture.code.update')
   <div class="col-md-6">
       <label class="form-label" for="code">Code</label>
       <input type="text" name="code" id="code" class="form-control" placeholder="Code" value="{{ old('code', $record->code) }}" />
       @error('code')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.title.update')
   <div class="col-md-6">
       <label class="form-label" for="title">Titre</label>
       <input type="text" name="title" id="title" class="form-control" placeholder="Titre" value="{{ old('title', $record->title) }}" />
       @error('title')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.prix_total.update')
   <div class="col-md-6">
       <label class="form-label" for="prix_total">Prix</label>
       <input type="text" name="prix_total" id="prix_total" class="form-control" placeholder="Prix" value="{{ old('prix_total', $record->prix_total) }}" />
       @error('prix_total')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.condition_paiment.update')
   <div class="col-md-6">
       <label class="form-label" for="condition_paiment">Condition</label>
       <input type="text" name="condition_paiment" id="condition_paiment" class="form-control" placeholder="Condition" value="{{ old('condition_paiment', $record->condition_paiment) }}" />
       @error('condition_paiment')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.is_tva.update')
   <div class="col-md-6">
       <label class="form-label" for="is_tva">Tva</label>
       <input type="text" name="is_tva" id="is_tva" class="form-control" placeholder="Tva" value="{{ old('is_tva', $record->is_tva) }}" />
       @error('is_tva')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.echeance.update')
   <div class="col-md-6">
       <label class="form-label" for="echeance">Echéance</label>
       <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD" id="echeance" name="echeance" value="{{ old('echeance', $record->echeance) }}" />
       @error('echeance')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan

                <!--updates_fields-->
            </div>
            <hr class="my-4 mx-n4" />
            <div class="pt-4 float-end">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
            </div>
            <div class="pt-4 float-start">
                <button type="reset" class="btn btn-label-secondary">Vider</button>
                <a href="{{ route('facture.index') }}" class="btn btn-label-secondary">Retour</a>
            </div>
        </form>
    </div>
</div>
@stop
@section('js')
<script src="/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/js/forms-selects.js"></script>
<script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>

<script type="text/javascript">
    // Select all date inputs
    const flatpickrDates = document.querySelectorAll('.quicky-date');

    // Apply flatpickr to each date input
    flatpickrDates.forEach(function(flatpickrDate) {
        flatpickrDate.flatpickr({
            monthSelectorType: 'static'
        });
    });

    // Select all time inputs
    const flatpickrTimes = document.querySelectorAll('.quicky-time');

    // Apply flatpickr to each time input
    flatpickrTimes.forEach(function(flatpickrTime) {
        flatpickrTime.flatpickr({
            enableTime: true,
            noCalendar: true,
            time_24hr:true
        });
    });
</script>
@stop
