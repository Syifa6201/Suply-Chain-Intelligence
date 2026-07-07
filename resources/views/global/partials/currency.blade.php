<div class="col-lg-4">

    <div class="card card-custom p-4 h-100">

        <h5>

            <i class="bi bi-currency-exchange"></i>

            Exchange Rate

        </h5>

        <hr>

        <p>

            USD → IDR

            <b>

                {{ number_format($currency['rates']['IDR'] ?? 0,2) }}

            </b>

        </p>

        <p>

            USD → EUR

            <b>

                {{ number_format($currency['rates']['EUR'] ?? 0,2) }}

            </b>

        </p>

        <p>

            USD → JPY

            <b>

                {{ number_format($currency['rates']['JPY'] ?? 0,2) }}

            </b>

        </p>

    </div>

</div>