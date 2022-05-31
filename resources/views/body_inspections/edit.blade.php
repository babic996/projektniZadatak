<x-home-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Dodaj inspekcijsko tijelo</h5>
            <div class="card-body">
                <form method="POST" action="{{route('update.body-inspections',$bodyInspection->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" id="name" class="form-control"
                               name="name" required
                               autocomplete="name"
                               value="{{$bodyInspection->name}}"
                               autofocus/>
                        <label class="form-label mt-2" for="name">Naziv</label>
                    </div>
                    <div class="mb-3">
                        <select name="jurisdiction" id="jurisdiction" class="form-select" required>
                            <option value="" disabled selected hidden>{{$bodyInspection->jurisdiction->name}}</option>
                            @foreach($jurisdictions as $jurisdiction)
                                <option value="{{$jurisdiction->id}}">{{$jurisdiction->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="jurisdiction">Jurisdikcija</label>
                    </div>
                    <div class="mb-3">
                        <select name="inspectorate" id="inspectorate" class="form-select" required>
                            <option value="" disabled selected hidden>{{$bodyInspection->inspectorate->name}}</option>
                            @foreach($inspectorates as $inspectorate)
                                <option value="{{$inspectorate->id}}">{{$inspectorate->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="inspectorate">Inspektorat</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="contact_person" class="form-control"
                               name="contact_person" required
                               autocomplete="contact_person"
                               value="{{$bodyInspection->contactPerson}}"
                               autofocus/>
                        <label class="form-label mt-2" for="contact_person">Kontakt osoba</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-home-master>
