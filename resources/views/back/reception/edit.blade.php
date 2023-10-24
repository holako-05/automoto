@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des receptions</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('reception.index') }}">Liste des receptions</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <form class="card-body" method="POST" action="{{ route('reception.update', ['reception' => $record->id]) }}">
                @csrf
                @method('Put')
                <div class="row g-3">
                    @can('reception.received_date.update')
                        <div class="col-md-6">
                            <label class="form-label" for="received_date">Date Réception</label>
                            <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD" id="received_date"
                                name="received_date" value="{{ old('received_date', $record->received_date) }}" />
                            @error('received_date')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reception.description.update')
                        <div class="col-md-6">
                            <label class="form-label" for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="Description" value="{{ old('description', $record->description) }}" />
                            @error('description')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endcan
                    <div class="source-item py-sm-3">
                        <div class="mb-3" data-repeater-list="products">
                            {{-- {{dd($record->products)}} --}}
                            @foreach ($record->products as $rproduct)
                                <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                    <div class="d-flex border rounded position-relative pe-0">
                                        <div class="row w-100 m-0 p-3">
                                            <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                                <p class="mb-2 repeater-title">Produit</p>
                                                <select class="form-select item-details mb-2" name="product_id">
                                                    @foreach ($products as $product)
                                                        @if ($product->type === 'stockable')
                                                            <option value="{{ $product->id }}" {{ $product->id == old('product_id', $rproduct->product_id) ? 'selected' : '' }}>{{ $product->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12 mb-md-0 mb-3">
                                                <p class="mb-2 repeater-title">Quantité</p>
                                                <input type="number" class="form-control invoice-item-qty" name="quantity"
                                                    value="{{$rproduct->receiver_quantity}}" placeholder="1" min="1" max="300" />
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                            <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" data-repeater-create>Ajouter des
                                    produits</button>
                            </div>
                        </div>
                    </div>
                    <!--updates_fields-->
                </div>
                <hr class="my-4 mx-n4" />
                <div class="pt-4 float-end">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
                </div>
                <div class="pt-4 float-start">
                    <button type="reset" class="btn btn-label-secondary">Vider</button>
                    <a href="{{ route('reception.index') }}" class="btn btn-label-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>
@stop
@section('js')
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/js/forms-selects.js"></script>
    <script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

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
        // repeater (jquery)
        $(function() {
            var sourceItem = $('.source-item');
            // Repeater init
            if (sourceItem.length) {
                sourceItem.on('submit', function(e) {
                    e.preventDefault();
                });
                sourceItem.repeater({
                    show: function() {
                        $(this).slideDown();
                        // Initialize tooltip on load of each item
                        const tooltipTriggerList = [].slice.call(document.querySelectorAll(
                            '[data-bs-toggle="tooltip"]'));
                        tooltipTriggerList.map(function(tooltipTriggerEl) {
                            return new bootstrap.Tooltip(tooltipTriggerEl);
                        });
                    },
                    hide: function(e) {
                        $(this).slideUp();
                    }
                });
            }
        });
    </script>
@stop
