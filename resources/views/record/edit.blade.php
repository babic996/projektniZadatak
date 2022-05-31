<x-home-master>
    @section('content')
        <div class="card mt-5">
            <h5 class="card-header">Izmijeni inspekcijsku kontrolu</h5>
            <div class="card-body">
                <form method="POST" action="{{route('update.record',$record->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="datetime-local" id="date" class="form-control"
                               name="date" required
                               autocomplete="date"
                               autofocus/>
                        <label class="form-label mt-2" for="name">Datum kontrole ({{$record->date}})</label>
                    </div>
                    <div class="mb-3">
                        <select name="body_inspection" id="body_inspection" class="form-select" required>
                            <option value="">{{$record->bodyInspection->name}}</option>
                            @foreach($body_inspections as $body_inspection)
                                <option value="{{$body_inspection->id}}">{{$body_inspection->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="body_inspection">Inspekcijsko tijelo</label>
                    </div>
                    <div class="mb-3">
                        <select name="product" id="product" class="form-select" required>
                            <option value="">{{$record->product->name}}</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label mt-2" for="product">Proizvod</label>
                    </div>
                    <div class="mb-3">
                        <textarea  class="form-control" name="description" id="description" rows="5" required>{{$record->description}}</textarea>
                        <label class="form-label mt-2" for="description">Opis</label>
                    </div>
                    <div class="mb-3">
                        @if($record->safe==1)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="safe" id="safe" checked value="1">
                            <label class="form-check-label" for="safe">
                                Da
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="safe" id="safe" value="0">
                            <label class="form-check-label" for="safe">
                                Ne
                            </label>
                        </div>
                        <label class="form-label mt-2" for="safe">Prozvod siguran</label>
                            @endif
                            @if($record->safe==0)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="safe" id="safe"  value="1">
                                    <label class="form-check-label" for="safe">
                                        Da
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="safe" id="safe" checked value="0">
                                    <label class="form-check-label" for="safe">
                                        Ne
                                    </label>
                                </div>
                                <label class="form-label mt-2" for="safe">Prozvod siguran</label>
                            @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Potvrdi</button>
                </form>
            </div>
        </div>
    @endsection
</x-home-master>
