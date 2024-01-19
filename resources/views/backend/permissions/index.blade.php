@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Permissions Manager</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>

                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr/>
        <div class="card">

            <div class="card-body">
                <a href="{{route('add.permission')}}" class="btn btn-success mb-4">Add permissions</a>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Permission Name </th>
                            <th>Group Name </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $key => $item)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->group_name }}</td>
                                <td>
                                    <a href="{{ route('edit.permission', $item->id) }}" class="btn btn-info">Edit</a>
                                     <a href="{{ route('delete.permission', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>

                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>



    </div>




@endsection