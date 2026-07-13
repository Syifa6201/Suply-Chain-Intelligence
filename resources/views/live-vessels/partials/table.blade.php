{{-- ================= SEARCH & FILTER ================= --}}

<div class="card card-custom shadow-sm border-0 mt-4">

    <div class="card-body">

        <div class="row g-3">

            <div class="col-lg-4">

                <input

                    type="text"

                    id="searchInput"

                    class="form-control"

                    placeholder="🔍 Search Vessel">

            </div>

            <div class="col-lg-3">

                <select

                    id="statusFilter"

                    class="form-select">

                    <option value="">All Status</option>

                    <option>Sailing</option>

                    <option>Loading</option>

                    <option>Arrived</option>

                    <option>Delayed</option>

                </select>

            </div>

            <div class="col-lg-3">

                <select

                    id="countryFilter"

                    class="form-select">

                    <option value="">All Country</option>

                    @foreach($vessels->pluck('country.name')->unique()->sort() as $country)

                        <option>

                            {{ $country }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-lg-2">

                <button

                    class="btn btn-primary w-100"

                    onclick="resetFilter()">

                    Reset

                </button>

            </div>

        </div>

    </div>

</div>



{{-- ================= TABLE ================= --}}

<div class="card card-custom shadow-sm border-0 mt-4">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4>

                🚢 Live Vessel Table

            </h4>

            <span class="badge bg-success">

                {{ $totalVessels }} Vessel

            </span>

        </div>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table

                class="table table-hover align-middle"

                id="vesselTable">

                <thead class="table-light">

                <tr>

                    <th>Vessel</th>

                    <th>Country</th>

                    <th>Destination</th>

                    <th>Status</th>

                    <th>Cargo</th>

                    <th>Speed</th>

                    <th>Risk</th>

                    <th>ETA</th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach($vessels as $vessel)

                <tr>

                    <td>

                        <strong>

                            {{ $vessel->name }}

                        </strong>

                        <br>

                        <small class="text-muted">

                            IMO {{ $vessel->imo }}

                        </small>

                    </td>

                    <td>

                        {{ $vessel->country->name }}

                    </td>

                    <td>

                        {{ $vessel->destination }}

                    </td>

                    <td>

                        @if($vessel->status=="Sailing")

                            <span class="badge bg-primary">

                                Sailing

                            </span>

                        @elseif($vessel->status=="Loading")

                            <span class="badge bg-warning text-dark">

                                Loading

                            </span>

                        @elseif($vessel->status=="Arrived")

                            <span class="badge bg-success">

                                Arrived

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Delayed

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $vessel->cargo }}

                    </td>

                    <td>

                        {{ $vessel->speed }}

                        Knot

                    </td>

                    <td>

                        @php

                            $riskColor='success';

                            if($vessel->risk_score>=70){

                                $riskColor='danger';

                            }elseif($vessel->risk_score>=40){

                                $riskColor='warning';

                            }

                        @endphp

                        <span

                            class="badge bg-{{ $riskColor }}">

                            {{ $vessel->risk_score }}

                        </span>

                    </td>

                    <td>

                        {{ $vessel->eta->diffForHumans() }}

                    </td>

                    <td>

                        <button

                            class="btn btn-outline-primary btn-sm"

                            onclick="showDetail(

                            '{{ $vessel->name }}',

                            '{{ $vessel->country->name }}',

                            '{{ $vessel->destination }}',

                            '{{ $vessel->cargo }}',

                            '{{ $vessel->speed }}',

                            '{{ $vessel->capacity }}',

                            '{{ $vessel->risk_score }}'

                            )">

                            Detail

                        </button>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- ================= MODAL ================= --}}

<div

class="modal fade"

id="detailModal"

tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5>

🚢 Vessel Detail

</h5>

<button

class="btn-close"

data-bs-dismiss="modal">

</button>

</div>

<div class="modal-body"

id="detailBody">

</div>

</div>

</div>

</div>



<script>

function showDetail(

name,

country,

destination,

cargo,

speed,

capacity,

risk

){

document.getElementById(

'detailBody'

).innerHTML=`

<table class="table">

<tr>

<th>Name</th>

<td>${name}</td>

</tr>

<tr>

<th>Country</th>

<td>${country}</td>

</tr>

<tr>

<th>Destination</th>

<td>${destination}</td>

</tr>

<tr>

<th>Cargo</th>

<td>${cargo}</td>

</tr>

<tr>

<th>Speed</th>

<td>${speed} Knot</td>

</tr>

<tr>

<th>Capacity</th>

<td>${Number(capacity).toLocaleString()}</td>

</tr>

<tr>

<th>Risk Score</th>

<td>${risk}</td>

</tr>

</table>

`;

new bootstrap.Modal(

document.getElementById(

'detailModal'

)

).show();

}



function filterTable(){

let keyword=document.getElementById("searchInput").value.toLowerCase();

let status=document.getElementById("statusFilter").value;

let country=document.getElementById("countryFilter").value;

document.querySelectorAll("#vesselTable tbody tr")

.forEach(row=>{

let vessel=row.cells[0].innerText.toLowerCase();

let rowCountry=row.cells[1].innerText;

let rowStatus=row.cells[3].innerText.trim();

let show=true;

if(keyword && !vessel.includes(keyword))

show=false;

if(status && rowStatus!=status)

show=false;

if(country && rowCountry!=country)

show=false;

row.style.display=show?"":"none";

});

}



document.getElementById("searchInput")

.addEventListener("keyup",filterTable);

document.getElementById("statusFilter")

.addEventListener("change",filterTable);

document.getElementById("countryFilter")

.addEventListener("change",filterTable);



function resetFilter(){

document.getElementById("searchInput").value="";

document.getElementById("statusFilter").value="";

document.getElementById("countryFilter").value="";

filterTable();

}

</script>