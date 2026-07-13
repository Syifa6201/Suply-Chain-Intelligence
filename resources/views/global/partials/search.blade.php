<div class="card card-custom mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row align-items-end">

                <div class="col-lg-10">

                    <label class="form-label">

                        Search Country

                    </label>

                    <select
                        class="form-select"
                        name="country">

                        <option value="">

                            Select Country

                        </option>

                        @foreach($countries as $country)

                            <option
                                value="{{ $country->name }}"
                                {{ $selectedCountry==$country->name?'selected':'' }}>

                                {{ $country->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-lg-2">

                    <button
                        class="btn btn-primary w-100">

                        Search

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>