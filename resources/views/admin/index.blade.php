@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 mb-5">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="ms-auto">

                            <i class='bx bxs-coin-stack fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Всего</p>
                        <p class="mb-0 ms-auto">{{ $allData }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="ms-auto">
                            <i class='bx bx-ruble  fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">RUB</p>
                        <p class="mb-0 ms-auto">{{ $countAllDataRUB }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="ms-auto">
                            <i class='bx bx-euro fs-3 text-white' ></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">EUR</p>
                        <p class="mb-0 ms-auto">{{ $countAllDataEUR }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="ms-auto">
                            <i class='bx bx-dollar fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">USD</p>
                        <p class="mb-0 ms-auto">{{ $countAllDataUSD }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="ms-auto">
                            <i class='bx bx-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">TJS</p>
                        <p class="mb-0 ms-auto">{{ $countAllDataTJS  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->

 

    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">Последные данные</h5>
                </div>
                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                    <tr>

                        <th> I/O</th>
                        <th>Корреспондент</th>
                        <th>МТ</th>
                        <th>Референс</th>
                        <th>Дата</th>
                        <th>Валюта</th>
                        <th>Сумма</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->i_o }}</td>
                        <td> {{ $item->corres }}  </td>
                        <td>{{ $item->mt_msg }}</td>
                        <td>{{ $item->ref_msg }}</td>
                        <td>{{ $item->date_msg }}</td>

                        <td>
                            <div class="badge rounded-pill bg-text-primary text-primary w-100">
                                @if ($item->cur_mt)
                                    {{ $item->cur_mt }}
                                @else
                                    <div class="text-danger w-100">   не указано </div>
                                @endif
                            </div>
                        </td>

                        <td>{{ $item->sum_mt }}   </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
