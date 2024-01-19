<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />


    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="   {{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="   {{ asset('backend/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="   {{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="   {{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="   {{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="   {{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="   {{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="   {{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="   {{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="   {{ asset('backend/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="   {{ asset('backend/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="   {{ asset('backend/assets/css/header-colors.css') }}" />

    <title>Регистрация</title>
</head>

<body class="bg-login">


<!--wrapper-->
<div class="wrapper">
    <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                <div class="col mx-auto">
                    <div class="my-4 text-center">
                        <img src="{{ asset('backend/assets/images/logo-img.png') }}" width="180" alt="">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Регистрация </h3>
                                    <p>У вас уже есть аккаунт? <a href="{{ route('manager.login') }}">Вход здесь</a>
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('manager.register') }}">
                                    @csrf
                                <div class="form-body">
                                    <form class="row g-3">
                                        <div class="col-sm-12">
                                            <label for="inputFirstName" class="form-label">Имя</label>
                                            <input type="text" class="form-control" id="inputFirstName" placeholder="Jon" name="name">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="inputLastName" class="form-label">Фамилия</label>
                                            <input type="text" class="form-control" id="inputLastName" placeholder="Deo" name="username">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="email">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Пароль</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password" name="password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-12 form-group mt-4">
                                            <h6 class="mb-0 text-uppercase">Параметры доступа</h6>

                                                <div class="card-body">
                                                    <h5>Вх/Исх</h5>
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="flexCheckDefault">Входящие</label>
                                                        <input class="form-check-input" type="checkbox" value="Входящие" id="flexCheckDefault" name="io[]">
                                                    </div>

                                                    <div class="form-check">
                                                        <label class="form-check-label" for="flexCheckDefault">Исходящие</label>
                                                        <input class="form-check-input" type="checkbox" value="Исходящие" id="flexCheckDefault" name="io[]">
                                                    </div>

                                                </div>
                                        </div>
                                        <hr>
                                        @php $data =\App\Models\Ticket::select([ 'mt_msg'])->distinct()->get(); @endphp

                                        <div class="col-12 form-group mt-4">

                                             <div class="mb-3" data-select2-id="21">
                                                <label class="form-label">Тип сообщений</label>
                                                <select class="multiple-select select2-hidden-accessible" data-placeholder="Choose anything" multiple=""  tabindex="-1" aria-hidden="true" name="message_type[]">
                                                    @foreach($data as $item)
                                                    <option value="{{ $item->mt_msg }}" data-select2-id="{{ $item->mt_msg }}">{{ $item->mt_msg  }}</option>
                                                    @endforeach
                                                </select>
                                             </div>
                                       </div>

                                        <div class="col-12 form-group mt-2 mb-2">
                                            <label class="form-label">Валюта</label>

                                            @php
                                                $data =\App\Models\Ticket::select([ 'cur_mt'])
                                                ->whereNotNull('cur_mt') // Убираем пустые значения
                                                ->distinct()
                                                ->get();
                                            @endphp

                                            <div class="row">
                                                @foreach($data as $item)
                                                    @if($item->cur_mt !== '')
                                                        <div class="col-md-4">
                                                            <div class="form-check ">
                                                                <label class="form-check-label" for="{{ $item->cur_mt }}">{{ $item->cur_mt }}</label>
                                                                <input class="form-check-input" type="checkbox"  id="{{ $item->cur_mt }}" name="rate[]" value="{{ $item->cur_mt }}">

                                                            </div>
                                                        </div>
                                                        @continue
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        @php
                                            $data =\App\Models\Ticket::select([ 'corres'])
                                            ->whereNotNull('cur_mt') // Убираем пустые значения

                                            ->distinct()
                                            ->get();
                                        @endphp

                                        <div class="col-12 form-group mt-2 mb-2">
                                            <label class="form-label">Корреспондент</label>
                                            <select class="form-control multiple-select select2-hidden-accessible " multiple=""  name="correspondent[]">
                                                @foreach($data as $item)
                                                <option>{{ $item->corres }}</option>
                                                @endforeach
                                            </select>
                                        </div>







                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary"><i class="bx bx-user"></i>Регистрация</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->

<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        minimumResultsForSearch: 20,
        matcher: matchCustom
    });

    $('.multiple-select2').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        minimumResultsForSearch: 20,
        matcher: matchCustom2
    });

    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
            return data;
        }

        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
            return null;
        }

        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
            var modifiedData = $.extend({}, data, true);
            modifiedData.text += ' (matched)';

            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return modifiedData;
        }

        // Return `null` if the term should not be displayed
        return null;
    }


    function matchCustom2(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
            return data;
        }

        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
            return null;
        }

        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
            var modifiedData = $.extend({}, data, true);
            modifiedData.text += ' (matched)';

            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return modifiedData;
        }

        // Return `null` if the term should not be displayed
        return null;

    }


</script>
<!--app JS-->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
