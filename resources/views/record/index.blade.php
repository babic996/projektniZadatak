<x-home-master>
    @section('content')
        <form method="get" action="{{route('index.record')}}">
            <div class="row g-3 align-items-center mt-3">
                <div class="col-auto">
                    <label for="from_date" class="col-form-label">Od:</label>
                </div>
                <div class="col-auto">
                    <input type="datetime-local" id="from_date" class="form-control"
                           name="from_date" required
                           autocomplete="from_date" autofocus/>
                </div>
                <div class="col-auto">
                    <label for="to_date" class="col-form-label">Do:</label>
                </div>
                <div class="col-auto">
                    <input type="datetime-local" id="to_date" class="form-control"
                           name="to_date" required
                           autocomplete="to_date" autofocus/>
                </div>
                <div class="col-auto">
                    <select name="body_inspection" id="body_inspection" class="form-select" required>
                        <option value="">Izaberi inspekcijsko tijelo</option>
                        @foreach($body_inspections as $body_inspection)
                            <option value="{{$body_inspection->id}}">{{$body_inspection->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Potvrdi</button>
                </div>
            </div>
        </form>
        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">Naziv proizvoda</th>
                <th scope="col">Serijski broj proizvoda</th>
                <th scope="col">Zemlja porijekla proizvoda</th>
                <th scope="col">Datum i vrijeme kontrole</th>
                <th scope="col">Rezultati kontrole</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{$record->product->name}}</td>
                    <td>{{$record->product->serialNumber}}</td>
                    <td>{{$record->product->country}}</td>
                    <td>{{$record->date}}</td>
                    <td>{{$record->description}}</td>
                    <td>
                        <form method="POST" action="{{route('destroy.record',$record->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Izbriši</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{route('edit.record',$record->id)}}">Izmijeni</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
</x-home-master>
