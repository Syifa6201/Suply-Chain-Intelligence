@if($focusCountry)

<div class="card card-custom mb-4 shadow-sm">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-lg-2 text-center">

                @if($focusCountry->flag)

                    <img
                        src="{{ $focusCountry->flag }}"
                        class="img-fluid rounded shadow"
                        style="max-height:90px">

                @else

                    <div class="display-4">
                        🌍
                    </div>

                @endif

            </div>


            <div class="col-lg-6">

                <h3 class="fw-bold">

                    {{ $focusCountry->name }}

                </h3>


                <p class="text-muted mb-1">

                    {{ $focusCountry->capital ?? '-' }}

                </p>


                <span class="badge bg-primary">

                    {{ $focusCountry->region ?? 'Global' }}

                </span>

            </div>



            <div class="col-lg-4">

                <table class="table table-borderless table-sm mb-0">


                    <tr>

                        <td>
                            <strong>Currency</strong>
                        </td>

                        <td>
                            {{ $focusCountry->currency ?? '-' }}
                        </td>

                    </tr>



                    <tr>

                        <td>
                            <strong>Language</strong>
                        </td>

                        <td>
                            {{ $focusCountry->language ?? '-' }}
                        </td>

                    </tr>



                    <tr>

                        <td>
                            <strong>ISO3</strong>
                        </td>

                        <td>
                            {{ $focusCountry->iso3 ?? '-' }}
                        </td>

                    </tr>



                    <tr>

                        <td>
                            <strong>Ports</strong>
                        </td>

                        <td>

                            {{ $focusCountry->ports()->count() }}

                        </td>

                    </tr>


                </table>

            </div>


        </div>

    </div>

</div>


@else


<div class="card card-custom mb-4 shadow-sm">

    <div class="card-body text-center p-5">


        <div class="display-3 mb-3">
            🌍
        </div>


        <h4 class="fw-bold">

            No Country Selected

        </h4>


        <p class="text-muted">

            Please select a country to view supply chain intelligence data

        </p>


    </div>

</div>


@endif