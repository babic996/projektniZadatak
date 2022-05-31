<x-home-master>
    @section('content')
        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">Naziv</th>
                <th scope="col">Inspektorat</th>
                <th scope="col">Jurisdikcija</th>
                <th scope="col">Kontakt osoba</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($body_inspections as $body_inspection)
                <tr>
                    <td>{{$body_inspection->name}}</td>
                    <td>{{$body_inspection->jurisdiction->name}}</td>
                    <td>{{$body_inspection->inspectorate->name}}</td>
                    <td>{{$body_inspection->contactPerson}}</td>
                    <td>
                        <form method="POST" action="{{route('destroy.body-inspections',$body_inspection->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Izbriši</button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning" href="{{route('edit.body-inspections',$body_inspection->id)}}">Izmijeni</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
</x-home-master>
