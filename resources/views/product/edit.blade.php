<x-home-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Uredi proizvod</h5>
            <div class="card-body">
                <form method="POST" action="{{route('update.product',$product->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="text" id="name" class="form-control"
                               name="name" required
                               autocomplete="name"
                               value="{{$product->name}}"
                               autofocus/>
                        <label class="form-label mt-2" for="name">Naziv</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="manufacturer" class="form-control"
                               name="manufacturer" required
                               autocomplete="manufacturer"
                               value="{{$product->manufacturer}}"
                               autofocus/>
                        <label class="form-label mt-2" for="manufacturer">Proizvodjač</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="serial_number" class="form-control"
                               name="serial_number"
                               autocomplete="serial_number"
                               value="{{$product->serialNumber}}"
                               autofocus/>
                        <label class="form-label mt-2" for="serial_number">Serijski broj</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="country" class="form-control"
                               name="country" required
                               autocomplete="country"
                               value="{{$product->country}}"
                               autofocus/>
                        <label class="form-label mt-2" for="country">Zemlja porijekla</label>
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control" name="description" id="description" rows="5">{{$product->description}}</textarea>
                        <label class="form-label mt-2" for="description">Opis</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-home-master>
