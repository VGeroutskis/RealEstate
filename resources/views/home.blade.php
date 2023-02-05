@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-12 text-center border border-3 border-dark">
                    <h3 class="pt-2">
                        Σύστημα διαχείρισης αγγελιών (καλώς ήλθες {{ Auth::user()->name }})
                    </h3>
                </div>
                <div class="row">
                    <h1 class="text-center">Λίστα αγγελιών</h1>
                    <div class="col-4 row align-items-center">
                        {{-- <form data-action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
                            id="create-realty"> --}}
                        <form id="realty_form">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3 row">
                                <label for="price" class="col-sm-4 col-form-label">Τιμή:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="price" class="form-control" id="price" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="territory" class="col-sm-4 col-form-label">Περιοχή:</label>
                                <div class="col-sm-8">
                                    <select name="territory" class="form-select" id="territory" required>
                                        <option value="" disabled selected>Please select</option>
                                        <option value="Αθήνα">Αθήνα</option>
                                        <option value="Θεσσαλονίκη">Θεσσαλονίκη</option>
                                        <option value="Πάτρα">Πάτρα</option>
                                        <option value="Ηράκλειο">Ηράκλειο</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="availability" class="col-sm-4 col-form-label">Διαθεσιμότητα:</label>
                                <div class="col-sm-8">
                                    <select name="availability" class="form-select" id="availability" required>
                                        <option value="" disabled selected>Please select</option>
                                        <option value="Ενοικίαση">Ενοικίαση</option>
                                        <option value="Πώληση">Πώληση</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="square" class="col-sm-4 col-form-label">Τετραγωνικά:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="square" class="form-control" id="square" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input type="submit" class="form-control create-realty">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-8" id="realty-list">
                        @foreach ($realty as $realties)
                            <div class="row">
                                <p>
                                    {{ $realties->territory }},
                                    {{ $realties->availability }},
                                    {{ $realties->price }} ευρώ,
                                    {{ $realties->square }} τ.μ.
                                    <a href="javascript:void(0)" data-url="{{ route('destroy', $realties->id) }}"
                                        class="delete-realty">Διαγραφή</a>
                                </p>
                                {{-- <form class="col-2" action="{{ route('destroy', $realties->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="realty_id" value="{{ $realties->id }}">
                                    <button class="btn btn-link delete" type="submit">Διαγραφή</button>
                                </form> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
