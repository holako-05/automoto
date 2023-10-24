@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
    <style>
        .nav-pills .nav-link:not(.active, .disabled) {
            color: #566a7f;
            border: 1px solid #eaeaea;
        }
    </style>
@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des clients</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('client.index') }}">Liste des clients</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="card-body" method="POST" action="{{ route('client.update', ['client' => $record->id]) }}">
                @csrf
                @method('Put')
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="float-md-start d-grid d-md-inline-flex gap-2 my-2">
                            <button type="reset" class="btn btn-label-secondary">Vider</button>
                            <a href="{{ route('client.index') }}" class="btn btn-label-secondary">Retour</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="float-md-end d-grid gap-2">
                            <button type="submit" class="btn btn-primary ">Enregistrer</button>
                        </div>
                    </div>
                </div>
                <hr class="my-4 mx-n4" />

                <div class="row g-3">
                    @can('client.first_name.update')
                        <div class="col-md-4">
                            <label class="form-label" for="first_name">Nom</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nom"
                                value="{{ old('first_name', $record->first_name) }}" />
                            @error('first_name')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('client.last_name.update')
                        <div class="col-md-4">
                            <label class="form-label" for="last_name">Prénom</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Prénom"
                                value="{{ old('last_name', $record->last_name) }}" />
                            @error('last_name')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('client.email.update')
                        <div class="col-md-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email"
                                value="{{ old('email', $record->email) }}" />
                            @error('email')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('client.phone.update')
                        <div class="col-md-4">
                            <label class="form-label" for="phone">Téléphone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Téléphone"
                                value="{{ old('phone', $record->phone) }}" />
                            @error('phone')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('client.address.update')
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

            </form>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3 nav-fill mx-2" role="tablist">
                            <li class="nav-item mx-1">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                    aria-selected="true">
                                    <i class="tf-icons bx bxs-car-mechanic me-1"></i> Véhicules
                                    <span
                                        class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-info ms-1">{{ count($record->vehicules) }}</span>
                                </button>
                            </li>
                            <li class="nav-item mx-1">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-reservations"
                                    aria-controls="navs-justified-reservations" aria-selected="false">
                                    <i class="tf-icons bx bxs-calendar me-1"></i> Rendez-vous
                                </button>
                            </li>
                            <li class="nav-item mx-1">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                                    aria-selected="false">
                                    <i class="tf-icons bx bx-message-square me-1"></i> Factures
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" style="box-shadow: none;">
                            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                <div class="col-xl-12">
                                    <div class="nav-align-left mb-4">
                                        <ul class="nav nav-tabs" role="tablist">
                                            @foreach ($record->vehicules as $vehicule)
                                                <li class="nav-item">
                                                    <button type="button"
                                                        class="nav-link {{ $loop->first ? 'active' : '' }}"
                                                        role="tab" data-bs-toggle="tab"
                                                        data-bs-target="#navs-vehicule-{{ $vehicule->id }}"
                                                        aria-controls="navs-vehicule-{{ $vehicule->id }}"
                                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <img src="{{ $vehicule->marqueDetail->thumbnail }}"
                                                                alt="{{ $vehicule->marqueDetail->thumbnail }}"
                                                                class="rounded-circle">
                                                            <div class="d-flex mx-1 flex-column">
                                                                {{ $vehicule->marqueDetail->value }}
                                                            </div>
                                                        </div>
                                                    </button>
                                                </li>
                                            @endforeach
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab"
                                                    data-bs-toggle="tab" data-bs-target="#navs-vehicule-add"
                                                    aria-controls="navs-vehicule-add" aria-selected="false">
                                                    +
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            @foreach ($record->vehicules as $vehicule)
                                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                    id="navs-vehicule-{{ $vehicule->id }}">
                                                    <iframe src="/vehicule/{{ $vehicule->id }}/edit"
                                                        style="width: 100%;height:390px; overflow: hidden;"
                                                        frameborder="0"></iframe>
                                                </div>
                                            @endforeach
                                            <div class="tab-pane fade" id="navs-vehicule-add">
                                                <iframe src="/vehicule/create?client_id={{ $record->id }}"
                                                    style="width: 100%; height:390px; overflow: hidden;"
                                                    frameborder="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-justified-reservations" role="tabpanel">
                                <!-- Timeline Advanced-->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="timeline pt-3">
                                                @foreach ($record->reservations as $reservation)
                                                    <li
                                                        class="timeline-item pb-4 timeline-item-{{$reservation->statutDetails->color}} border-left-dashed">
                                                        <span
                                                            class="timeline-indicator-advanced timeline-indicator-{{$reservation->statutDetails->color}}">
                                                            <i class="bx bx-{{$reservation->statutDetails->icon}}"></i>
                                                        </span>
                                                        <div class="timeline-event">
                                                            <div class="timeline-header border-bottom mb-3">
                                                                <h6 class="mb-0">
                                                                    @if ($reservation->serviceDetails)
                                                                        {{ $reservation->serviceDetails->title }}
                                                                        @if ($reservation->typeserviceDetails)
                                                                            - {{ $reservation->typeserviceDetails->title }}
                                                                        @endif
                                                                    @endif
                                                                </h6>
                                                                <span class="text-muted">{{ $reservation->date }}
                                                                    {{ $reservation->time }}</span>
                                                            </div>
                                                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                                                <div>
                                                                    <span>{{ $reservation->message }}</span>
                                                                </div>
                                                                <div>
                                                                    <span>{{ $reservation->statutDetails->value }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <li class="timeline-end-indicator">
                                                    <i class="bx bx-check-circle"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Timeline Advanced-->
                            </div>
                            <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                                <p>
                                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon
                                    gummies
                                    cupcake gummi bears cake chocolate.
                                </p>
                                <p class="mb-0">
                                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie
                                    cake. Sweet
                                    roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert.
                                    Pudding jelly
                                    jelly-o tart brownie jelly.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script type="text/javascript">
        function resizeIframe(iframe) {
            iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
        }
    </script>
@stop
