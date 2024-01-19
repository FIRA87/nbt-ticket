@extends('layouts.admin_layout')
@section('content')

    <h4 class="fw-bold py-3 mb-4 mt-4"><span class="text-muted fw-light">Главная /</span> Удалённые записи</h4>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="example" class="table table-bordered display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ФИО</th>
                            <th>Email</th>
                            <th>Телефон</th>
                            <th>Пол</th>
                            <th>Тип обращения</th>
                            <th>Тип поступления</th>
                            <th>Место работы</th>
                            <th>Статус</th>
                            <th>Дата</th>
                            <th>Действия</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if ($restore)
                            @foreach ($restore as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fio }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->appeal->title_ru }}</td>
                                    <td>
                                        @if($item->type_of_receipt == 0)
                                            <span class="fw-bold">Ручные заявки</span>
                                        @elseif($item->priority == 1)
                                            <span class="fw-bold">Онлайн Заявки</span>
                                        @elseif($item->priority == 2)
                                            <span class="fw-bold">Заявки по почте</span>
                                        @elseif($item->priority == 3)
                                            <span class="fw-bold">Заявки по телефону</span>
                                        @elseif($item->priority == 4)
                                            <span class="fw-bold">Заявки по EDMS</span>
                                        @else
                                            <span class="fw-bold">Приём граждан</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->work->title_ru }}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <span class="text-danger fw-bold">в обработке</span>
                                        @elseif($item->status == 1)
                                            <span class="text-success fw-bold">рассмотрено</span>
                                        @else
                                            <span class="text-warning fw-bold">в обработке</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $my_time = strtotime($item->created_at);
                                            $update_date = date('Y.m.d',$my_time);
                                        @endphp
                                        {{ $update_date }}
                                    </td>
                                    <td class="d-flex justify-content-between">
                                        <a href="{{ route('admin.restore', $item->id) }}" class="btn btn-success">
                                            Восстановить
                                        </a>
                                        <form method="POST" action="{{ route('restore.deleteRestore', $item->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger delete" title='Удалить'>Удалить</button>
                                        </form>
                                    </td>



                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection
