@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des statuts</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('statut.index') }}">Liste des statuts</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <form class="card-body" method="POST" action="{{ route('statut.store') }}">
                @csrf
                <div class="row g-3">
                    @can('statut.code.create')
                        <div class="col-md-6">
                            <label class="form-label" for="code">Code</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Code"
                                value="{{ old('code') }}" />
                            @error('code')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('statut.value.create')
                        <div class="col-md-6">
                            <label class="form-label" for="value">Valeur</label>
                            <input type="text" name="value" id="value" class="form-control" placeholder="Valeur"
                                value="{{ old('value') }}" />
                            @error('value')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('statut.order.create')
                        <div class="col-md-6">
                            <label class="form-label" for="order">Ordre</label>
                            <input type="text" name="order" id="order" class="form-control" placeholder="Ordre"
                                value="{{ old('order') }}" />
                            @error('order')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('statut.color.create')
                        <div class="col-md-6">
                            <label for="select2Basic" class="form-label">Couleur</label>
                            <select id="select2Basic" class="form-select" name="color" data-allow-clear="true">
                                <option value="">Selectionner une couleur</option>
                                <option value="primary" class="text-white bg-primary">Bleu</option>
                                <option value="info" class="text-white bg-info">Bleu Ciel</option>
                                <option value="danger" class="text-white bg-danger">Rouge</option>
                                <option value="success" class="text-white bg-success">Vert</option>
                                <option value="warning" class="text-white bg-warning">Jaune</option>
                                <option value="secondary" class="text-white bg-secondary">Gris</option>
                                <option value="light" class="text-dark bg-light">Blanc</option>
                                <option value="dark" class="text-white bg-dark">Noir</option>
                            </select>
                            @error('color')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('statut.icon.create')
                        <div class="col-md-6">
                            <label class="form-label" for="icon">Icone</label>
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="Icone"
                                value="{{ old('icon') }}" />
                            @error('icon')
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
                    <a href="{{ route('statut.index') }}" class="btn btn-label-secondary">Retour</a>
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
                time_24hr: true
            });
        });
    </script>
@stop
