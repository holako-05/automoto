@extends($layout)
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="py-3 mb-4">Gestion des products</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('product.index') }}">Liste des products</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header"></h5>
        <form class="card-body" method="POST" action="{{ route('product.store') }}">
            @csrf
            <div class="row g-3">
                   @can('product.category_id.create')
   <div class="col-md-4">
       <label class="form-label" for="category_id">Catégorie</label>
       <select name="category_id" id="category_id" class="select2 form-control" data-allow-clear="true">
    @foreach ($categorieRecords as $row)
    <option class="option" {{ $row->id == old('category_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->name }}</option>
    @endforeach
</select>
       @error('category_id')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('product.name.create')
   <div class="col-md-4">
       <label class="form-label" for="name">Nom</label>
       <input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="{{ old('name') }}" />
       @error('name')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('product.stock_quantity.create')
   <div class="col-md-4">
       <label class="form-label" for="stock_quantity">Quantité en stock</label>
       <input type="text" name="stock_quantity" id="stock_quantity" class="form-control" placeholder="Quantité en stock" value="{{ old('stock_quantity') }}" />
       @error('stock_quantity')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('product.type.create')
   <div class="col-md-4">
       <label class="form-label" for="type">Type</label>
           <select name="type" id="type" class="select2 form-control" data-allow-clear="true">
        <option value="stockable" > Stockable </option> 
"<option value="nstockable" > Non-Stockable </option> 
"
    </select>
       @error('type')
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
                <a href="{{ route('product.index') }}" class="btn btn-label-secondary">Retour</a>
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
