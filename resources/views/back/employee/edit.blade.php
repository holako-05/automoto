@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des employées</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('employee.index') }}">Liste des employées</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <form class="card-body" method="POST" action="{{ route('employee.update', ['employee' => $record->id]) }}">
                @csrf
                @method('Put')
                <div class="row g-3">
                    @can('employee.last_name.update')
                        <div class="col-md-4">
                            <label class="form-label" for="last_name">Nom</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Nom"
                                value="{{ old('last_name', $record->last_name) }}" />
                            @error('last_name')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.first_name.update')
                        <div class="col-md-4">
                            <label class="form-label" for="first_name">Prénom</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Prénom"
                                value="{{ old('first_name', $record->first_name) }}" />
                            @error('first_name')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    {{-- @can('employee.user_id.update')
                        <div class="col-md-4">
                            <label class="form-label" for="user_id">Utilisateur</label>
                            <select name="user_id" id="user_id" class="select2 form-control" data-allow-clear="true">
                                @foreach ($userRecords as $row)
                                    <option class="option" {{ $row->id == old('user_id', $record->user_id) ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->login }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan --}}
                    @can('employee.position.update')
                        <div class="col-md-4">
                            <label class="form-label" for="position">Position</label>
                            <select name="position" id="position" class="select2 form-control" data-allow-clear="true">
                                @foreach ($positionRecords as $row)
                                    <option class="option"
                                        {{ $row->id == old('position', $record->position) ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->label }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.speciality.update')
                        <div class="col-md-4">
                            <label class="form-label" for="speciality">Specialité</label>
                            <select name="speciality" id="speciality" class="select2 form-control" data-allow-clear="true">
                                @foreach ($specialityRecords as $row)
                                    <option class="option"
                                        {{ $row->id == old('speciality', $record->speciality) ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->label }}</option>
                                @endforeach
                            </select>
                            @error('speciality')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.hire_date.update')
                        <div class="col-md-4">
                            <label class="form-label" for="hire_date">Date d'embauche</label>
                            <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD" id="hire_date"
                                name="hire_date" value="{{ old('hire_date', $record->hire_date) }}" />
                            @error('hire_date')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.shift_start_time.update')
                        <div class="col-md-4">
                            <label class="form-label" for="shift_start_time">Heure de début</label>
                            <input type="text" class="form-control quicky-time" placeholder="HH:MM" id="shift_start_time"
                                name="shift_start_time" value="{{ old('shift_start_time', $record->shift_start_time) }}" />
                            @error('shift_start_time')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.shift_end_time.update')
                        <div class="col-md-4">
                            <label class="form-label" for="shift_end_time">Heure de fin</label>
                            <input type="text" class="form-control quicky-time" placeholder="HH:MM" id="shift_end_time"
                                name="shift_end_time" value="{{ old('shift_end_time', $record->shift_end_time) }}" />
                            @error('shift_end_time')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.salary.update')
                        <div class="col-md-4">
                            <label class="form-label" for="salary">Salaire</label>
                            <input type="text" name="salary" id="salary" class="form-control" placeholder="Salaire"
                                value="{{ old('salary', $record->salary) }}" />
                            @error('salary')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.phone.update')
                        <div class="col-md-4">
                            <label class="form-label" for="phone">Téléphone</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Téléphone" value="{{ old('phone', $record->phone) }}" />
                            @error('phone')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    @can('employee.emergency_contact.update')
                        <div class="col-md-4">
                            <label class="form-label" for="emergency_contact">Contact d'urgence</label>
                            <input type="text" name="emergency_contact" id="emergency_contact" class="form-control"
                                placeholder="Contact d'urgence"
                                value="{{ old('emergency_contact', $record->emergency_contact) }}" />
                            @error('emergency_contact')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan

                    @can('employee.address.update')
                        <div class="col-md-4">
                            <label class="form-label" for="address">Adresse</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $record->address) }}</textarea>
                            @error('address')
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
                    <a href="{{ route('employee.index') }}" class="btn btn-label-secondary">Retour</a>
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
                noCalendar: true
            });
        });
    </script>
@stop
