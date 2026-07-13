<div class="card card-custom shadow-sm border-0 h-100">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                🚨 Top Risk Ports

            </h4>

            <span class="badge bg-danger">

                {{ $topPorts->count() }}

            </span>

        </div>

    </div>

    <div class="card-body">

        @forelse($topPorts as $port)

            @php

                if($port->congestion >= 80){

                    $color='danger';

                    $status='High';

                }

                elseif($port->congestion >=50){

                    $color='warning';

                    $status='Medium';

                }

                else{

                    $color='success';

                    $status='Low';

                }

            @endphp

            <div class="mb-4">

                <div class="d-flex justify-content-between">

                    <div>

                        <strong>

                            {{ $port->name }}

                        </strong>

                        <br>

                        <small class="text-muted">

                            {{ $port->country->name }}

                        </small>

                    </div>

                    <span class="badge bg-{{ $color }}">

                        {{ $status }}

                    </span>

                </div>

                <div class="progress mt-2">

                    <div

                        class="progress-bar bg-{{ $color }}"

                        style="width: {{ $port->congestion }}%">

                        {{ $port->congestion }}%

                    </div>

                </div>

            </div>

        @empty

            <div class="alert alert-success">

                No high-risk ports detected.

            </div>

        @endforelse

    </div>

</div>