@extends('layouts.admin_layout')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-between">
                        <a href="{{ route('manual.index', ) }}" class="float-right btn btn-primary btn-sm">Назад </a>
                    </h6>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">

                <div class="table-responsive">
                    <form action="{{ route('manual.update', $manual->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $manual->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <hr class="my-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-3 ">
                                                    <label for="IO" class="form-label">I/O *</label>
                                                    <input type="text" id="IO" class="form-control" name="IO" required value="{{ $manual->IO }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mb-3 ">
                                                    <label for="сorrespondent" class="form-label">Корреспондент *</label>
                                                    <input type="text" id="сorrespondent" class="form-control" name="сorrespondent" required value="{{ $manual->сorrespondent }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mb-3 ">
                                                    <label for="mt" class="form-label">МТ *</label>
                                                    <input type="text" id="mt" class="form-control" name="mt" required value="{{ $manual->mt }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group mb-3">
                                                    <label for="reference" class="form-label">Референс *</label>
                                                    <input type="text" id="reference" class="form-control" name="reference" required value="{{ $manual->reference }}">
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="created_at" class="form-label">Дата *</label>
     <input type="text" id="created_at" class="form-control" name="created_at" required value="@php $my_time =strtotime($manual->created_at);$update_date = date('d.m.Y',$my_time); @endphp {{ $update_date }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="usd" class="form-label">Валюта *</label>
                                                    <input type="text" id="usd" class="form-control" name="usd" required value="{{ $manual->usd }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="suma" class="form-label">Сумма *</label>
                                                    <input type="text" id="suma" class="form-control" name="suma" required value="{{ $manual->suma }}">
                                                </div>
                                            </div>






                                        </div>
                                    </div>

                                </div>
                            </div>

                            <input type="hidden" name="admin_id" value="{{  $idUser }}">
                        </div>
                        <div class="mt-2 mb-2">
                            <button type="submit" class="btn btn-primary me-2">Обновить</button>
                        </div>






                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
