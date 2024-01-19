<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}" >

    <link rel="stylesheet" href="{{ asset('backend/assets/css/pace.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('backend/assets/js/pace.min.js') }}"  />

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"  />
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}"  />

    <link rel="stylesheet" href="{{ asset('backend/assets/css/jquery.dataTables.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.dateTime.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/buttons.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/select.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/select2.min.css') }}"  />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fixedColumns.dataTables.min.css') }}">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.css') }}" >
    <link href="{{ asset('backend/assets/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />




    <style>
        /* Style for hiding overflow */
        .table-container {
            overflow-x: auto;
        }

        /* Style for highlighting selected rows */
        .selected-row {
            background-color: #b3d9ff;
        }

        #data-table_wrapper ul {
            list-style-type: none;
            padding: 0;
        }

        #data-table_wrapper li {
            margin-bottom: 5px;
        }

    </style>

    <title>Панель управления</title>
</head>

<body>
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
        @include('admin.body.sidebar')
    <!--end sidebar wrapper -->
    <!--start header -->
    @include('admin.body.header')
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
            @yield('admin')
    </div>
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    @include('admin.body.footer')
</div>
<!--end wrapper-->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->

<script src="{{ asset('backend/assets/js/jquery.dataTables.min.js') }} "></script>
<script src="{{ asset('backend/assets/js/dataTables.bootstrap5.min.js') }} "></script>
<!-- Подключение DataTables Buttons -->
<script src="{{ asset('backend/assets/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('backend/assets/js/dataTables.dateTime.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/dataTables.select.min.js') }}"></script>


<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>

<script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script src="{{ asset('backend/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/dataTables.dateTime.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>


<!-- highcharts js -->
<script src="{{ asset('backend/assets/plugins/highcharts/js/highcharts.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/dashboard-analytics.js') }}"></script>

<!--app JS-->

<script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweetalert2@10.js') }}"></script>

<script src="{{ asset('backend/assets/js/code.js') }}"></script>


<script>

    $(document).ready(function () {
        let selectedColumn;
        let table = $('#data-table').DataTable({
            processing: true,
            serverSide: false,
            paging: true,
            select: true,
            searchable: true,
            dom: 'Bfrtip',
            "pageLength": 17,
            ajax: {
                url: '{{ route("getData") }}',
                type: 'GET',
                dataType: 'json',
                dataSrc: 'data',
            },
            columns: [
                { data: 'i_o' },
                { data: 'corres' },
                { data: 'mt_msg' },
                { data: 'ref_msg' },
                { data: 'date_msg' },
                { data: 'cur_mt' },
                { data: 'sum_mt' },
                { data: 'pol', visible: false },
            ],
            buttons: [  'search' ],
        });

        // Обработка события выбора строки и отображение данных в карточке
        $('#data-table tbody').on('click', 'tr', function () {
            let data = table.row(this).data();
            selectedColumn = 'pol'; // Укажите здесь вашу нужную колонку
            showCard(data);
        });

        function showCard(data) {
            // Получаем значение для фильтрации по полю "pol"
            let pol = $('#pol').val().toLowerCase(); // Предполагается, что у вас есть поле ввода с id="pol"

            let polValue = data['pol'].toLowerCase();  // Получаем значение поля "pol" из данных

            // Если поле "pol" содержит значение для фильтрации, применяем выделение
            if (pol !== '' && polValue.includes(pol)) {
                let regex = new RegExp(pol, 'gi');
                let highlightedPolValue = polValue.replace(regex, '<span class="highlight">$&</span>');
                $('#card-column8').empty().html(highlightedPolValue);
            } else {
                $('#card-column8').empty().html(data['pol']);   // Если значение для фильтрации пустое или не найдено, отображаем поле "pol" без выделения
            }

            $('#card').show();

            $('#print-btn').on('click', function () {
                printCard();
            });

            // Добавляем обработчик события afterprint
            window.onafterprint = function () {
                // Перезагрузка страницы
                location.reload();
            };
        }

        function printCard() {
            let printContents = $('#card').html();
            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            // Добавляем стили для печати
            let styles = `
        <style>
            /* Устанавливаем новый шрифт и размер текста для печати */
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #000;
            }
            /* Пример установки стилей для определенного элемента */
            #card {
                font-weight: bold;
            }
        </style>
    `;
            document.head.insertAdjacentHTML('beforeend', styles);
            window.print();
            document.body.innerHTML = originalContents;
        }


      /*  function printCard() {
            let printContents = $('#card').html();
            let originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }*/

        // Перезагрузка страницы с использованием AJAX
        function reloadPage() {
            $.ajax({
                url: window.location.href,
                type: 'GET',
                success: function (data) {
                    $('body').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Добавление кнопки экспорта в PDF
        $('#data-table_wrapper').find('.dt-buttons').prepend('<button id="export-pdf-btn" class="btn btn-primary mb-3">Экспорт в PDF</button>');

        // Обработчик события нажатия кнопки
        $('#export-pdf-btn').on('click', function () {
            // Получение идентификаторов выбранных строк
            let selectedIds = table.rows('.selected').data().pluck('id').toArray();

            // Вызов AJAX-запроса для экспорта данных
            $.ajax({
                url: '{{ route("export.to.pdf") }}',
                method: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({
                    selected_ids: selectedIds
                }),
                // contentType: 'application/json',
                success: function (response) {
                    if (response.success) {
                        // Если экспорт прошел успешно, отобразить сообщение и ссылку на скачивание PDF-файлов
                        toastr.success('Данные успешно экспортированы');
                        if (response.filenames) {
                            // Если экспортировано несколько PDF-файлов, создать список ссылок
                            let container = $('<div class="alert alert-success" role="alert">'); // Создаем контейнер div

                            for (let filename of response.filenames) {
                                let link = $('<a>', {
                                    href: filename,
                                    target: "_blank",
                                    text: filename,
                                });

                                let listItem = $('<div class="alert alert-success" role="alert">').append(link); // Оборачиваем каждую ссылку в div
                                container.append(listItem); // Добавляем div в контейнер

                                // Скрыть div через 5 секунд (5000 миллисекунд)
                                listItem.delay(20000).fadeOut(500);
                            }

                            $('#data-table_wrapper').prepend(container);

                            // После исчезновения div выполнить перезагрузку страницы
                            container.delay(20000).fadeOut(500, function () {
                                reloadPage();
                            });
                        } else {
                            // Если экспортирован один PDF-файл, отобразить ссылку на скачивание
                            let link = $('<a>', {
                                href:  response.url,
                                target: "_blank",
                                text: "Скачать PDF-файл",
                            });

                            let div = $('<div class="alert alert-success" role="alert">').append(link); // Оборачиваем ссылку в div
                            $('#data-table_wrapper').prepend(div);

                            // Скрыть div через 5 секунд (5000 миллисекунд)
                            div.delay(20000).fadeOut(500, function () {
                                reloadPage();
                            });
                        }


                    } else {
                        toastr.error('Ошибка при экспорте данных: ' + response.message);
                    }
                },
                error: function (error) {
                    toastr.error('Ошибка при экспорте данных');
                },
            });



        });


        //===================================Filter=========================================//

        const iOEl = document.querySelector('#i_o');
        const corresEl = document.querySelector('#corres');
        const mtMsgEl = document.querySelector('#mt_msg');
        const refMsgEl = document.querySelector('#ref_msg');
        const refStartDateEl = document.querySelector('#start_date_msg');
        const refEndDateEl = document.querySelector('#end_date_msg');
        const refcur_mt = document.querySelector('#cur_mt');
        const refsum_mt = document.querySelector('#sum_mt');
        const polEl = document.querySelector('#pol'); // Добавлено поле для фильтрации по полю "pol"

        const NewDataTable = new DataTable('#data-table');

// Custom range filtering function
        DataTable.ext.search.push(function(settings, data, dataIndex) {
            let i_o = iOEl.value.toLowerCase();
            let corres = corresEl.value.toLowerCase();
            let mt_msg = mtMsgEl.value.toLowerCase();
            let ref_msg = refMsgEl.value.toLowerCase();
            let startDate = refStartDateEl.value;
            let endDate = refEndDateEl.value;
            let cur_mt = refcur_mt.value.toLowerCase();
            let sum_mt = refsum_mt.value.toLowerCase();
            let pol = polEl.value.toLowerCase(); // Получаем значение для фильтрации по полю "pol"

            let rowData_i_o = data[0].toLowerCase();
            let rowData_corres = data[1].toLowerCase();
            let rowData_mt_msg = data[2].toLowerCase();
            let rowData_ref_msg = data[3].toLowerCase();
            let rowData_date_msg = data[4];
            let rowData_cur_mt = data[5].toLowerCase();
            let rowData_sum_mt = data[6].toLowerCase();
            let rowData_pol = data[7].toLowerCase(); // Добавлено значение для фильтрации по полю "pol"

            if (
                (i_o === '' || rowData_i_o.includes(i_o)) &&
                (corres === '' || rowData_corres.includes(corres)) &&
                (mt_msg === '' || rowData_mt_msg.includes(mt_msg)) &&
                (ref_msg === '' || rowData_ref_msg.includes(ref_msg)) &&
                (cur_mt === '' || rowData_cur_mt.includes(cur_mt)) &&
                (sum_mt === '' || rowData_sum_mt.includes(sum_mt)) &&
                (pol === '' || rowData_pol.includes(pol)) && // Добавлена фильтрация по полю "pol"
                (startDate === '' || new Date(rowData_date_msg) >= new Date(startDate)) &&
                (endDate === '' || new Date(rowData_date_msg) <= new Date(endDate))
            ) {
                return true;
            }


            return false;
        });

// Changes to the inputs will trigger a redraw to update the table
        [iOEl, corresEl, mtMsgEl, refMsgEl, refcur_mt, refsum_mt, refStartDateEl, refEndDateEl, polEl].forEach(function(el) {
            el.addEventListener('input', function() {
                NewDataTable.draw();
            });
        });

// Обработчик события нажатия на кнопку сброса фильтрации
        $('#reset-filter-btn').on('click', function() {
            // Очищаем значения полей фильтра
            $('#i_o, #corres, #mt_msg, #ref_msg, #date_msg, #cur_mt, #sum_mt, #start_date_msg, #end_date_msg, #pol').val('');

            // Перезагружаем страницу
            location.reload();
        });

    });

</script>






<script>
    @if(Session::has('message'))
    let type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif

    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            let link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })


        });

    });


</script>
<script src="{{ asset('backend/assets/js/index.js') }}"></script>
<script src="{{ asset('backend/assets/js/app.js') }}"></script>


</body>

</html>
