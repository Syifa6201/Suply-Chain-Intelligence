@extends('layouts.app')

@section('content')

<div class="card card-custom p-4">
    <h2 class="mb-4">Countries Data</h2>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Flag</th>
                    <th>Country</th>
                    <th>Code</th>
                    <th>Currency</th>
                    <th>Region</th>
                    <th>Language</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>
                            <img src="{{ $country['flag'] }}" width="40">
                        </td>
                        <td>{{ $country['name'] }}</td>
                        <td>{{ $country['code'] }}</td>
                        <td>{{ $country['currency'] }}</td>
                        <td>{{ $country['region'] }}</td>
                        <td>{{ $country['language'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection