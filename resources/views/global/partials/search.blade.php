<div class="card card-custom mb-4">

    <div class="card-body">

        <div class="row align-items-end">

            <div class="col-lg-12">

                <label class="form-label fw-bold">

                    🌍 Select Monitoring Country

                </label>

                <select
                    id="countrySelect"
                    class="form-select">

                    <option value="">
    🌍 -- Select Country --
</option>


@foreach($countries as $country)

<option
value="{{ $country->name }}"

@if(isset($selectedCountry) && $selectedCountry == $country->name)

selected

@endif

>

🌐 {{ $country->name }}

</option>


@endforeach

                </select>

            </div>

        </div>

    </div>

</div>

<script>

document
.getElementById("countrySelect")
.addEventListener("change",function(){

    const country=this.value;

    window.location.href=
        "{{ route('global.index') }}" +
        "?country=" +
        encodeURIComponent(country);

});

</script>