{{-- ================= SEARCH ================= --}}

<div class="card card-custom shadow-sm border-0 mt-4">

    <div class="card-body">

        <div class="row g-3 align-items-end">

            <div class="col-lg-4">

                <label class="form-label fw-semibold">

                    Search Vessel

                </label>

                <input

                    type="text"

                    id="searchInput"

                    class="form-control"

                    placeholder="Search by Vessel, IMO or Destination">

            </div>

            <div class="col-lg-3">

                <label class="form-label fw-semibold">

                    Status

                </label>

                <select

                    id="statusFilter"

                    class="form-select">

                    <option value="">

                        All Status

                    </option>

                    <option value="Sailing">

                        Sailing

                    </option>

                    <option value="Loading">

                        Loading

                    </option>

                    <option value="Arrived">

                        Arrived

                    </option>

                    <option value="Delayed">

                        Delayed

                    </option>

                </select>

            </div>

            <div class="col-lg-3">

                <label class="form-label fw-semibold">

                    Country

                </label>

                <select

                    id="countryFilter"

                    class="form-select">

                    <option value="">

                        All Country

                    </option>

                    @foreach($vessels->pluck('country.name')->unique()->sort() as $country)

                        <option value="{{ $country }}">

                            {{ $country }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-lg-2">

                <button

                    class="btn btn-primary w-100"

                    onclick="resetFilter()">

                    <i class="bi bi-arrow-clockwise"></i>

                    Reset

                </button>

            </div>

        </div>

    </div>

</div>

{{-- ================= SUMMARY ================= --}}

<div class="row mt-4 g-3">

    <div class="col-lg-3">

        <div class="card card-custom text-center p-3">

            <small class="text-muted">

                Total Vessel

            </small>

            <h3

                class="fw-bold"

                id="summaryTotal">

                {{ $totalVessels }}

            </h3>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom text-center p-3">

            <small class="text-muted">

                Average Speed

            </small>

            <h3

                class="fw-bold text-primary"

                id="summarySpeed">

                {{ $averageSpeed }}

            </h3>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom text-center p-3">

            <small class="text-muted">

                Average Risk

            </small>

            <h3

                class="fw-bold text-warning"

                id="summaryRisk">

                {{ $averageRisk }}

            </h3>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="card card-custom text-center p-3">

            <small class="text-muted">

                Delayed

            </small>

            <h3

                class="fw-bold text-danger"

                id="summaryDelay">

                {{ $delayed }}

            </h3>

        </div>

    </div>

</div>

{{-- ================= TABLE ================= --}}

<div class="card card-custom shadow-sm border-0 mt-4">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                🚢 Live Vessel Fleet

            </h4>

            <span

                class="badge bg-success"

                id="totalBadge">

                {{ $totalVessels }} Vessel

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table

                class="table table-hover align-middle mb-0"

                id="vesselTable">

                <thead class="table-light">

                    <tr>

                        <th>Vessel</th>

                        <th>Country</th>

                        <th>Destination</th>

                        <th>Status</th>

                        <th>Cargo</th>

                        <th>Speed</th>

                        <th width="140">

                            Risk

                        </th>

                        <th>ETA</th>

                        <th width="120">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($vessels as $vessel)

                @php

                    $riskColor='success';

                    if($vessel->risk_score>=70){

                        $riskColor='danger';

                    }elseif($vessel->risk_score>=40){

                        $riskColor='warning';

                    }

                @endphp

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

                        <span class="badge

                        @if($vessel->status=='Sailing') bg-primary

                        @elseif($vessel->status=='Loading') bg-warning text-dark

                        @elseif($vessel->status=='Arrived') bg-success

                        @else bg-danger

                        @endif">

                            {{ $vessel->status }}

                        </span>

                    </td>

                    <td>

                        {{ $vessel->cargo }}

                    </td>

                    <td>

                        {{ $vessel->speed }} Knot

                    </td>

                    <td>

                        <div class="progress mb-1"

                             style="height:8px">

                            <div

                                class="progress-bar bg-{{ $riskColor }}"

                                style="width:{{ $vessel->risk_score }}%">

                            </div>

                        </div>

                        <small>

                            {{ $vessel->risk_score }}

                        </small>

                    </td>

                    <td>

                        {{ $vessel->eta->diffForHumans() }}

                    </td>

                    <td>

                        <button

                            class="btn btn-primary btn-sm"

                            onclick="focusVessel(

                                {{ $vessel->id }},

                                {{ $vessel->latitude }},

                                {{ $vessel->longitude }}

                            )">

                            <i class="bi bi-geo-alt-fill"></i>

                        </button>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

function focusVessel(id,lat,lng){

    if(typeof vesselMap==="undefined") return;

    vesselMap.flyTo(

        [lat,lng],

        6,

        {

            animate:true,

            duration:2

        }

    );

    if(vesselMarkers[id]){

        vesselMarkers[id].openPopup();

    }

}

function filterTable(){

    let keyword=document.getElementById("searchInput").value.toLowerCase();

    let status=document.getElementById("statusFilter").value;

    let country=document.getElementById("countryFilter").value;

    let visible=0;

    document.querySelectorAll("#vesselTable tbody tr")

    .forEach(function(row){

        let vessel=row.cells[0].innerText.toLowerCase();

        let destination=row.cells[2].innerText.toLowerCase();

        let rowCountry=row.cells[1].innerText.trim();

        let rowStatus=row.cells[3].innerText.trim();

        let show=true;

        if(

            keyword &&

            !vessel.includes(keyword) &&

            !destination.includes(keyword)

        ){

            show=false;

        }

        if(status && rowStatus!=status){

            show=false;

        }

        if(country && rowCountry!=country){

            show=false;

        }

        row.style.display=show?"":"none";

        if(show){

            visible++;

        }

    });

    document.getElementById("totalBadge").innerHTML=

        visible+" Vessel";

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

/* ===============================
SORT TABLE
=============================== */

document.querySelectorAll("#vesselTable th")

.forEach(function(th,index){

    th.style.cursor="pointer";

    let asc=true;

    th.onclick=function(){

        let tbody=document.querySelector("#vesselTable tbody");

        let rows=[...tbody.rows];

        rows.sort(function(a,b){

            let A=a.cells[index].innerText.trim();

            let B=b.cells[index].innerText.trim();

            return asc

            ?A.localeCompare(B)

            :B.localeCompare(A);

        });

        asc=!asc;

        rows.forEach(function(r){

            tbody.appendChild(r);

        });

    };

});

/* ===============================
REALTIME SUMMARY
=============================== */

function refreshSummary(){

    if(typeof vessels==="undefined") return;

    let total=vessels.length;

    let delay=0;

    let risk=0;

    let speed=0;

    vessels.forEach(function(v){

        if(v.status=="Delayed"){

            delay++;

        }

        risk+=Number(v.risk);

        speed+=Number(v.speed);

    });

    document.getElementById("summaryTotal").innerHTML=total;

    document.getElementById("summaryDelay").innerHTML=delay;

    document.getElementById("summaryRisk").innerHTML=

        (risk/total).toFixed(1);

    document.getElementById("summarySpeed").innerHTML=

        (speed/total).toFixed(1);

    document.getElementById("totalBadge").innerHTML=

        total+" Vessel";

}

/* ===============================
AUTO REFRESH
=============================== */

setInterval(function(){

    refreshSummary();

},5000);

refreshSummary();

</script>