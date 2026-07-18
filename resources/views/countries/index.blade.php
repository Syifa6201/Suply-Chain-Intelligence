@extends('layouts.app')

@section('content')

<div class="row mb-4">

    <div class="col-lg-3">

        <div class="card card-custom p-4 text-center">

            <h6>Total Countries</h6>

            <h2 class="text-primary">
                {{ $totalCountries }}
            </h2>

        </div>

    </div>

    <div class="col-lg-9">

        <div class="card card-custom p-3">

            <form method="GET">

                <div class="row">

                    <div class="col-md-6">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search country...">

                    </div>

                    <div class="col-md-4">

                        <select
                            name="region"
                            class="form-select">

                            <option value="">All Region</option>

                            @foreach($regions as $region)

                                <option
                                    value="{{ $region }}"
                                    {{ request('region')==$region?'selected':'' }}>

                                    {{ $region }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary w-100">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<div class="card card-custom p-4">


    <div class="table-responsive">


        <table class="table table-hover table-striped align-middle">


            <thead>

                <tr>

                    <th>Flag</th>
                    <th>Country</th>
                    <th>Code</th>
                    <th>Currency</th>
                    <th>Region</th>
                    <th>Language</th>
                    <th width="170">Action</th>

                </tr>

            </thead>


            <tbody>


            @foreach($countries as $country)


                <tr>


                    <td>

                        @if($country['flag'])

                        <img
                            src="{{ $country->flag }}"
                            width="50"
                            class="rounded shadow-sm">

                        @endif

                    </td>


                    <td>

                        <b>
                        {{ $country->name }}
                        </b>

                    </td>


                    <td>

                        {{ $country->code }}

                    </td>


                    <td>

                        {{ $country->currency }}

                    </td>


                    <td>

                        {{ $country->region }}

                    </td>


                    <td>

                        {{ $country->language }}

                    </td>


                    <td>

    <div class="d-flex gap-2">

        <a href="{{ route('country.show', $country->code) }}"
        class="btn btn-primary btn-sm">

            <i class="bi bi-eye"></i>

            View

        </a>

        <form
            action="{{ route('watchlist.store', $country->code) }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="btn btn-warning btn-sm">

                <i class="bi bi-star-fill"></i>

            </button>

        </form>

    </div>

</td>


                </tr>


            @endforeach


            </tbody>


        </table>


    </div>

    <div class="mt-4 d-flex justify-content-center">

            {{ $countries->links() }}

        </div>


</div>


@endsection