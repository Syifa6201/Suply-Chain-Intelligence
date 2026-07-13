<div class="col-lg-4">

    <div class="card card-custom shadow-sm border-0 h-100">

        <div class="card-header bg-white">

            <div class="d-flex justify-content-between align-items-center">

                <h4 class="mb-0">

                    💱 Currency Intelligence

                </h4>

                <span class="badge bg-primary">

                    LIVE

                </span>

            </div>

        </div>

        <div class="card-body">

            @php

                $rates = $currency['rates'] ?? [];

                $usd = 1;

                $idr = $rates['IDR'] ?? null;

                $eur = $rates['EUR'] ?? null;

                $jpy = $rates['JPY'] ?? null;

                $gbp = $rates['GBP'] ?? null;

            @endphp

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Pair</th>
                        <th class="text-end">Rate</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>🇺🇸 USD → 🇮🇩 IDR</td>

                        <td class="text-end">

                            <strong>

                                {{ $idr ? number_format($idr,2) : '-' }}

                            </strong>

                        </td>

                    </tr>

                    <tr>

                        <td>🇺🇸 USD → 🇪🇺 EUR</td>

                        <td class="text-end">

                            <strong>

                                {{ $eur ? number_format($eur,4) : '-' }}

                            </strong>

                        </td>

                    </tr>

                    <tr>

                        <td>🇺🇸 USD → 🇯🇵 JPY</td>

                        <td class="text-end">

                            <strong>

                                {{ $jpy ? number_format($jpy,2) : '-' }}

                            </strong>

                        </td>

                    </tr>

                    <tr>

                        <td>🇺🇸 USD → 🇬🇧 GBP</td>

                        <td class="text-end">

                            <strong>

                                {{ $gbp ? number_format($gbp,4) : '-' }}

                            </strong>

                        </td>

                    </tr>

                </tbody>

            </table>

            <hr>

            <div class="d-flex justify-content-between">

                <small class="text-muted">

                    Base Currency

                </small>

                <strong>

                    USD

                </strong>

            </div>

        </div>

    </div>

</div>