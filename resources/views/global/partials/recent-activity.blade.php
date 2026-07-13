<div class="card card-custom shadow-sm border-0 h-100">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                📡 Recent Global Activity

            </h4>

            <span class="badge bg-primary">

                LIVE

            </span>

        </div>

    </div>

    <div class="card-body">

        @forelse($recentPorts as $port)

            @php

                if($port->status == 'Critical'){

                    $color = 'danger';
                    $icon = 'bi-exclamation-octagon-fill';

                }
                elseif($port->status == 'Delay'){

                    $color = 'warning';
                    $icon = 'bi-clock-history';

                }
                else{

                    $color = 'success';
                    $icon = 'bi-check-circle-fill';

                }

            @endphp

            <div class="d-flex mb-4">

                <div class="me-3">

                    <i class="bi {{ $icon }} text-{{ $color }} fs-3"></i>

                </div>

                <div class="flex-grow-1">

                    <strong>

                        {{ $port->name }}

                    </strong>

                    <br>

                    <small class="text-muted">

                        {{ $port->country->name }}

                    </small>

                    <br>

                    <span class="badge bg-{{ $color }} mt-2">

                        {{ $port->status }}

                    </span>

                </div>

                <div class="text-end">

                    <small class="text-muted">

                        Capacity

                    </small>

                    <br>

                    <strong>

                        {{ number_format($port->capacity) }}

                    </strong>

                </div>

            </div>

            @if(!$loop->last)

                <hr>

            @endif

        @empty

            <div class="alert alert-success">

                No recent activity.

            </div>

        @endforelse

    </div>

</div>