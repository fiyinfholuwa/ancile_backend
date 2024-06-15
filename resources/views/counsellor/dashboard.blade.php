

@extends('counsellor.app')

@section('page', 'Counsellor Dashboard')
@section('content')
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-primary">
                                <i style="font-size: 40px;" class="ph-duotone ph-user-list"></i>

                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Assigned Applications</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <div class="col-7">
{{--                                <div id="all-earnings-graph"></div>--}}
                            </div>
                            <div class="col-5">
                                <h5 class="mb-1">{{$assigned_applications}}</h5>
{{--                                <p class="text-primary mb-0"><i class="ti ti-arrow-up-right"></i>{{$assigned_applications}}</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-warning">
                                <i style="font-size: 40px;" class="ph-duotone ph-first-aid-kit"></i>

                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Successful Applications</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <div class="col-7">
{{--                                <div id="page-views-graph"></div>--}}
                            </div>
                            <div class="col-5">
                                <h5 class="mb-1">0</h5>
{{--                                <p class="text-warning mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-success">
                                <i style="font-size: 40px;" class="ph-duotone ph-folder-simple"></i>

                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Pending Applications</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <div class="col-7">
{{--                                <div id="total-task-graph"></div>--}}
                            </div>
                            <div class="col-5">
                                <h5 class="mb-1">0</h5>
{{--                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> New</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
