@extends($layout)
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />

@stop
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="py-3 mb-4">Gestion des notifications</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('notification.index') }}">Liste des notifications</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header"></h5>
        <form class="card-body" method="POST" action="{{ route('notification.update', ['notification' => $record->id]) }}">
            @csrf
            @method('Put')
            <div class="row g-3">
                   @can('notification.title.update')
   <div class="col-md-6">
       <label class="form-label" for="title">Titre</label>
       <input type="text" name="title" id="title" class="form-control" placeholder="Titre" value="{{ old('title', $record->title) }}" />
       @error('title')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('notification.description.update')
   <div class="col-md-6">
       <label class="form-label" for="description">Description</label>
       <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{ old('description', $record->description) }}" />
       @error('description')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('notification.link.update')
   <div class="col-md-6">
       <label class="form-label" for="link">Link</label>
       <input type="text" name="link" id="link" class="form-control" placeholder="Link" value="{{ old('link', $record->link) }}" />
       @error('link')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('notification.notified.update')
   <div class="col-md-6">
       <label class="form-label" for="notified">Notified</label>
       <input type="text" name="notified" id="notified" class="form-control" placeholder="Notified" value="{{ old('notified', $record->notified) }}" />
       @error('notified')
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
                <a href="{{ route('notification.index') }}" class="btn btn-label-secondary">Retour</a>
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
