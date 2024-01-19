@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Roles Manager</div>
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
                <a href="{{route('roles.create')}}" class="btn btn-success mb-4">Add new role</a>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th> Name </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $item)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-primary">Edit</a>

                                    <form action="{{ route('roles.destroy', $item->id) }}" method="post" style="display: inline-block" onclick="return myFunction();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>



    </div>




@endsection
