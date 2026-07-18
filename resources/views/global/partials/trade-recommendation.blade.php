<div class="card card-custom shadow-sm border-0">


    <div class="card-header bg-white">


        <div class="d-flex justify-content-between align-items-center">


            <div>

                <h4 class="fw-bold mb-1">

                    📦 AI Trade Recommendation

                </h4>


                <small class="text-muted">

                    AI Powered Import & Export Decision Support

                </small>


            </div>


            <span class="badge bg-primary">

                🤖 AI ACTIVE

            </span>


        </div>


    </div>




    <div class="card-body">


        @if($focusCountry && !empty($tradeRecommendation))



            <div class="row g-4 text-center mb-4">



                {{-- Opportunity --}}

                <div class="col-md-4">


                    <div class="p-3 rounded bg-light">


                        <i class="bi bi-graph-up-arrow fs-1 
                        text-{{ $tradeRecommendation['color'] }}">
                        </i>


                        <h6 class="text-muted mt-2">

                            Trade Opportunity

                        </h6>


                        <h2 class="fw-bold text-{{ $tradeRecommendation['color'] }}">

                            {{ $tradeRecommendation['opportunity'] }}

                        </h2>


                    </div>


                </div>





                {{-- Decision --}}

                <div class="col-md-4">


                    <div class="p-3 rounded bg-light">


                        <i class="bi bi-cpu-fill fs-1 text-primary"></i>


                        <h6 class="text-muted mt-2">

                            AI Decision

                        </h6>


                        <h4 class="fw-bold">

                            {{ $tradeRecommendation['decision'] }}

                        </h4>


                    </div>


                </div>





                {{-- Risk --}}

                <div class="col-md-4">


                    <div class="p-3 rounded bg-light">


                        <i class="bi bi-shield-exclamation fs-1 text-danger"></i>


                        <h6 class="text-muted mt-2">

                            Risk Score

                        </h6>


                        <h2 class="fw-bold">

                            {{ $tradeRecommendation['riskScore'] }}/100

                        </h2>


                    </div>


                </div>


            </div>





            <hr>




            {{-- AI STRATEGY --}}

            <h5 class="fw-bold mb-3">

                🤖 Recommended Trade Strategy

            </h5>



            <div class="row">


                @foreach($tradeRecommendation['actions'] as $action)


                    <div class="col-md-4 mb-3">


                        <div class="border rounded p-3 h-100">


                            <i class="bi bi-check-circle-fill text-success"></i>


                            <span class="ms-2">

                                {{ $action }}

                            </span>


                        </div>


                    </div>


                @endforeach


            </div>





            <hr>




            {{-- LOGISTICS INSIGHT --}}


            <h5 class="fw-bold">

                🚢 Logistics Insight

            </h5>



            <div class="alert alert-info">


                <strong>

                    Current Analysis:

                </strong>


                <br>


                {{ $tradeRecommendation['portAdvice'] }}



                <hr>



                <div class="row text-center">


                    <div class="col-md-6">


                        <small class="text-muted">

                            Port Congestion

                        </small>


                        <h4 class="fw-bold">

                            {{ round($tradeRecommendation['congestion']) }}%

                        </h4>


                    </div>



                    <div class="col-md-6">


                        <small class="text-muted">

                            Negative News

                        </small>


                        <h4 class="fw-bold text-danger">

                            {{ $tradeRecommendation['negativeNews'] }}

                        </h4>


                    </div>


                </div>


            </div>





            {{-- COUNTRY INFO --}}


            <div class="mt-3">


                <span class="badge bg-secondary">

                    🌍 {{ $focusCountry->name }}

                </span>


                <span class="badge bg-success">

                    Supply Chain Analysis Complete

                </span>


            </div>





        @else




            <div class="text-center p-5">


                <div class="display-3">

                    📦

                </div>


                <h5 class="mt-3 fw-bold">

                    Select Country First

                </h5>


                <p class="text-muted">

                    AI Trade Recommendation will appear after selecting monitoring country.

                </p>


            </div>



        @endif



    </div>


</div>