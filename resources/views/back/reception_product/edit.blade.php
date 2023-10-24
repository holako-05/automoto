@extends($layout)
@section('css')
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="py-3 mb-4">Gestion des reception_products</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin') }}">Accueil</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('reception_product.index') }}">Liste des reception_products</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Multi Column with Form Separator -->
        <div class="card mb-4">
            <h5 class="card-header"></h5>
            <form class="card-body" method="POST"
                action="{{ route('reception_product.update', ['reception_product' => $record->id]) }}">
                @csrf
                @method('Put')
                <div class="row g-3">
                    @can('reception_product.reception_id.update')
                        <div class="col-md-6">
                            <label class="form-label" for="reception_id">Réception</label>
                            <select name="reception_id" id="reception_id" class="select2 form-control" data-allow-clear="true">
                                @foreach ($receptionRecords as $row)
                                    <option class="option"
                                        {{ $row->id == old('reception_id', $record->reception_id) ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->received_date }}</option>
                                @endforeach
                            </select>
                            @error('reception_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reception_product.product_id.update')
                        <div class="col-md-6">
                            <label class="form-label" for="product_id">Produit</label>
                            <select name="product_id" id="product_id" class="select2 form-control" data-allow-clear="true">
                                @foreach ($productRecords as $row)
                                    <option class="option"
                                        {{ $row->id == old('product_id', $record->product_id) ? 'selected' : '' }}
                                        value="{{ $row->id }}"> {{ $row->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <span class="helper-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endcan @can('reception_product.receiver_quantity.update')
                        <div class="col-md-6">
                            <label class="form-label" for="receiver_quantity">Quantité réceptionné</label>
                            <input type="text" name="receiver_quantity" id="receiver_quantity" class="form-control"
                                placeholder="Quantité réceptionné"
                                value="{{ old('receiver_quantity', $record->receiver_quantity) }}" />
                            @error('receiver_quantity')
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
                    <a href="{{ route('reception_product.index') }}" class="btn btn-label-secondary">Retour</a>
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
