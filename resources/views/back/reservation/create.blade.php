@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des reservations</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('reservation.index') }}">Liste des reservations</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <form class="card-body" method="POST" action="{{ route('reservation.store') }}">
                @csrf
                <div class="row g-3">
                    @can('reservation.client_id.create')
                        <div class="col-md-6">
                            <label class="form-label" for="client_id">Client</label>
                            <select name="client_id" id="client_id" class="select2 form-control" data-allow-clear="true">
                                <option class="option"
                                value=" ">Sélectionner client</option>
                                @foreach ($clientRecords as $row)
                                    <option class="option" {{ $row->id == old('client_id') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->first_name." ". $row->last_name }}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('reservation.date.create')
                        <div class="col-md-6">
                            <label class="form-label" for="date">La date</label>
                            <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD" id="date"
                                name="date" value="{{ old('date') }}" />
                            @error('date')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reservation.time.create')
                        <div class="col-md-6">
                            <label class="form-label" for="time">l'heure</label>
                            <input type="text" class="form-control quicky-time" placeholder="HH:MM" id="time"
                                name="time" value="{{ old('time') }}" />
                            @error('time')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reservation.name.create')
                        <div class="col-md-6">
                            <label class="form-label" for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom et prénom"
                                value="{{ old('name') }}" />
                            @error('name')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan
                        @can('reservation.last_name.create')
                        <div class="col-md-6">
                            <label class="form-label" for="last_name">PRÉNOM</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="PRÉNOM" value="{{ old('last_name') }}" />
                            @error('last_name')
                            <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan
                        @can('reservation.telepohne.create')
                        <div class="col-md-6">
                            <label class="form-label" for="telepohne">Télépohne</label>
                            <input type="text" name="telepohne" id="telepohne" class="form-control" placeholder="Télépohne"
                                value="{{ old('telepohne') }}" />
                            @error('telepohne')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reservation.email.create')
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('reservation.statut.create')
                        <div class="col-md-6">
                            <label class="form-label" for="statut">Statut</label>
                            <select name="statut" id="statut" class="select2 form-control" data-allow-clear="true">
                                @foreach ($statutRecords as $row)
                                    <option class="option" {{ $row->id == old('statut') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->value }}</option>
                                @endforeach
                            </select>
                            @error('statut')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('reservation.service_id.create')
                        <div class="col-md-6">
                            <label class="form-label" for="service_id">Service</label>
                            <select name="service_id" id="service_id" class="select2 form-control" data-allow-clear="true">
                                @foreach ($serviceRecords as $row)
                                    <option class="option" {{ $row->id == old('service_id') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->title }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('reservation.type_service_id.create')
                        <div class="col-md-6">
                            <label class="form-label" for="type_service_id">Type de service</label>
                            <select name="type_service_id" id="type_service_id" class="select2 form-control"
                                data-allow-clear="true">
                                @foreach ($typeserviceRecords as $row)
                                    <option class="option" {{ $row->id == old('type_service_id') ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->title }}</option>
                                @endforeach
                            </select>
                            @error('type_service_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan

                    @can('reservation.message.create')
                        <div class="col-md-6">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3">{{ old('message') }}</textarea>
                            @error('message')
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
                    <a href="{{ route('reservation.index') }}" class="btn btn-label-secondary">Retour</a>
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
    $(document).ready(function(){
        $("#client_id").change(function(){
            // Get selected client id
            var client_id = $(this).val();

            if (client_id === " ") {
                // Empty all the boxes if "Sélectionner client" is selected
                $("#name").val("");
                $("#last_name").val("");
                $("#telepohne").val("");
                $("#email").val("");
            } else {
                // Perform AJAX request

                $.ajax({
                    url: '/reservation/getClientDetails', // Replace with the endpoint you have
                    type: 'GET',
                    data: { 'client_id': client_id },
                    success: function(response){


                        // Fill the text boxes
                        $("#name").val(response.first_name);
                        $("#last_name").val(response.last_name);
                        $("#telepohne").val(response.phone);
                        $("#email").val(response.email);
                    },
                    error: function(xhr, status, error){
                        console.error('AJAX Error: ', error);
                    }
                });
            }
        });
    });
</script>
@stop
