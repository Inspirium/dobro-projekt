@extends('jutarnji_layout')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Ime</th>
                <th>Lokacija</th>
                <th>Odgovor</th>
                <th>Marker</th>
                <th>Vrijeme</th>
                <th>Akcije</th>
            </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry['id'] }}</td>
                    <td>{{ $entry['name'] }}</td>
                    <td>{{ $entry['location'] }}</td>
                    <td>{{ $entry['description'] }}</td>
                    <td>{{ $entry['marker'] }}</td>
                    <td>{{ $entry['created_at'] }}</td>
                    <td>
                        @if(!$entry['approved'])
                        <a href="{{ url('/admin/approve/'.$entry['id']) }}" class="btn btn-primary">Odobri</a>
                        @endif
                        <a href="{{ url('/admin/delete/'.$entry['id']) }}" class="btn btn-danger">Obriši</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
