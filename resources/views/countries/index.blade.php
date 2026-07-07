@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    <i class="bi bi-flag"></i>
    Countries Intelligence
</h2>


<div class="card card-custom p-4">


    <div class="table-responsive">


        <table class="table table-hover align-middle">


            <thead>

                <tr>

                    <th>Flag</th>
                    <th>Country</th>
                    <th>Code</th>
                    <th>Currency</th>
                    <th>Region</th>
                    <th>Language</th>
                    <th>Action</th>

                </tr>

            </thead>


            <tbody>


            @foreach($countries as $country)


                <tr>


                    <td>

                        @if($country['flag'])

                        <img 
                        src="{{ $country['flag'] }}"
                        width="45">

                        @endif

                    </td>


                    <td>

                        <b>
                        {{ $country['name'] }}
                        </b>

                    </td>


                    <td>

                        {{ $country['code'] }}

                    </td>


                    <td>

                        {{ $country['currency'] }}

                    </td>


                    <td>

                        {{ $country['region'] }}

                    </td>


                    <td>

                        {{ $country['language'] }}

                    </td>


                    <td>


                        <a href="/country/{{ urlencode($country['name']) }}"
                           class="btn btn-primary btn-sm">

                            View Intelligence

                        </a>


                    </td>


                </tr>


            @endforeach


            </tbody>


        </table>


    </div>


</div>


@endsection