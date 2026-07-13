<div class="card card-custom shadow-sm border-0">

    <div class="card-header bg-white">

        <div class="d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                📊 Global Risk Analytics

            </h4>

            <span class="badge bg-primary">

                LIVE

            </span>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-8">

                <h6 class="text-muted mb-3">

                    Global Risk Trend

                </h6>

                <div style="height:320px">

                    <canvas id="riskTrendChart"></canvas>

                </div>

            </div>

            <div class="col-lg-4">

                <h6 class="text-muted mb-3">

                    Risk Distribution

                </h6>

                <div style="height:320px">

                    <canvas id="riskPieChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded",function(){

    /*
    |--------------------------------------------------------------------------
    | Risk Trend
    |--------------------------------------------------------------------------
    */

    new Chart(

        document.getElementById("riskTrendChart"),

        {

            type:'line',

            data:{

                labels:[

                    'Mon',

                    'Tue',

                    'Wed',

                    'Thu',

                    'Fri',

                    'Sat',

                    'Sun'

                ],

                datasets:[{

                    label:'Global Risk',

                    data:[

                        35,

                        48,

                        40,

                        55,

                        60,

                        52,

                        46

                    ],

                    borderWidth:3,

                    tension:.4,

                    fill:true

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                plugins:{

                    legend:{

                        display:false

                    }

                }

            }

        }

    );



    /*
    |--------------------------------------------------------------------------
    | Risk Distribution
    |--------------------------------------------------------------------------
    */

    new Chart(

        document.getElementById("riskPieChart"),

        {

            type:'doughnut',

            data:{

                labels:[

                    'Low',

                    'Medium',

                    'High'

                ],

                datasets:[{

                    data:[

                        {{ $lowRisk }},

                        {{ $mediumRisk }},

                        {{ $highRisk }}

                    ]

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                plugins:{

                    legend:{

                        position:'bottom'

                    }

                }

            }

        }

    );

});

</script>