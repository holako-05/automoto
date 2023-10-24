@extends('layouts/iframe')
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
    <style>
        .card {
            box-shadow: none !important;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid flex-grow-1">
        <!-- Multi Column with Form Separator -->
        <div class="card">
            <form class="card-body" method="POST" action="{{ route('vehicule.store') }}">
                @csrf
                <div class="row g-3">
                    @can('vehicule.client_id.create')
                        <div class="col-md-4">
                            <label class="form-label" for="client_id">Client</label>
                            <select class="select2 form-control" data-allow-clear="true">
                                <option value="?" class="option">Séléctionner un client</option>
                                @foreach ($clientRecords as $row)
                                    <option class="option" {{ $row->id == $clientId ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->last_name . ' ' . $row->first_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="client_id" value="{{ $clientId }}">
                            @error('client_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.marque_id.create')
                        <div class="col-md-4">
                            <label class="form-label" for="marque_id">Marque</label>
                            <select name="marque_id" id="marque_id" class="select2 form-control" data-allow-clear="true">
                                {{-- <option value="?" class="option">Séléctionner une marque</option> --}}
                                @foreach ($marqueRecords as $row)
                                    <option class="option" {{ $row->id == old('marque_id') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->title }}</option>
                                @endforeach
                            </select>
                            @error('marque_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.modele_id.create')
                        <div class="col-md-4">
                            <label class="form-label" for="modele_id">Modèle</label>
                            <select name="modele_id" id="modele_id" class="select2 form-control" data-allow-clear="true">
                                <option value="?" class="option">Séléctionner un modèle</option>
                                @foreach ($modeleRecords as $row)
                                    <option class="option" {{ $row->id == old('modele_id') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->title }}</option>
                                @endforeach
                            </select>
                            @error('modele_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.year.create')
                        <div class="col-md-4">
                            <label class="form-label" for="year">Année</label>
                            <select name="year" id="year" class="select2 form-control" data-allow-clear="true">
                                @foreach ($anneeRecords as $row)
                                    <option class="option" {{ $row->id == old('year') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->year }}</option>
                                @endforeach
                            </select>
                            @error('year')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.chassis.create')
                        <div class="col-md-4">
                            <label class="form-label" for="chassis">N° de châssis</label>
                            <input type="text" name="chassis" id="chassis" class="form-control" placeholder="N° de châssis"
                                value="{{ old('chassis') }}" />
                            @error('chassis')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.numberOfDoors.create')
                        <div class="col-md-4">
                            <label class="form-label" for="numberOfDoors">Nombre de portes</label>
                            <input type="text" name="numberOfDoors" id="numberOfDoors" class="form-control"
                                placeholder="Nombre de portes" value="{{ old('numberOfDoors') }}" />
                            @error('numberOfDoors')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.fuelType.create')
                        <div class="col-md-4">
                            <label class="form-label" for="fuelType">Type de Carburant</label>
                            <select name="fuelType" id="fuelType" class="select2 form-control" data-allow-clear="true">
                                <option value="diesel"> Diesel </option>
                                <option value="essence"> Essence </option>
                                <option value="hybride"> Hybride </option>
                                <option value="electrique"> Élecrtique </option>
                            </select>
                            @error('fuelType')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.mileage.create')
                        <div class="col-md-4">
                            <label class="form-label" for="mileage">Kilométrage</label>
                            <input type="text" name="mileage" id="mileage" class="form-control" placeholder="Kilométrage"
                                value="{{ old('mileage') }}" />
                            @error('mileage')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('vehicule.registrationDate.create')
                        <div class="col-md-4">
                            <label class="form-label" for="registrationDate">Date d'immatriculation</label>
                            <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD"
                                id="registrationDate" name="registrationDate" value="{{ old('registrationDate') }}" />
                            @error('registrationDate')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan


                    <!--updates_fields-->
                </div>
                <div class="pt-4 float-end">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
                </div>
                <div class="pt-4 float-start">
                    <button type="reset" class="btn btn-label-secondary">Vider</button>
                    {{-- <a href="{{ route('vehicule.index') }}" class="btn btn-label-secondary">Retour</a> --}}
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

    <script>
        $(document).ready(function() {
            // Function to update "modele" dropdown based on "marque"
            function updateModeleOptions(selectedMarqueId) {
                $.ajax({
                    url: '/getModelesByMarque/' + selectedMarqueId, // Replace with your API endpoint
                    method: 'GET',
                    success: function(data) {
                        // Clear existing "modele" options
                        $('#modele_id').empty();

                        // Add new "modele" options
                        $.each(data, function(index, modele) {
                            $('#modele_id').append($('<option>', {
                                value: modele.id,
                                text: modele.title
                            }));
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            // Initialize "modele" dropdown when the page loads
            const initialMarqueId = $('#marque_id').val();
            if (initialMarqueId) {
                updateModeleOptions(initialMarqueId);
            }

            // Update "modele" dropdown when "marque" changes
            $('#marque_id').on('change', function() {
                const selectedMarqueId = $(this).val();
                updateModeleOptions(selectedMarqueId);
            });
        });
    </script>
@stop
