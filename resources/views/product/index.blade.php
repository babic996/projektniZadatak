<x-home-master>
    @section('content')
        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">Naziv</th>
                <th scope="col">Proizvodjač</th>
                <th scope="col">Serijski broj</th>
                <th scope="col">Zemlja porijekla</th>
                <th scope="col">Opis</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->manufacturer}}</td>
                <td>{{$product->serialNumber}}</td>
                <td>{{$product->country}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <form method="POST" action="{{route('destroy.product',$product->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Izbriši</button>
                    </form>
                </td>
                <td><a class="btn btn-warning" href="{{route('edit.product',$product->id)}}">Izmijeni</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
</x-home-master>
