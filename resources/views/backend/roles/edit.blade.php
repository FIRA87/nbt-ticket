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
                    <a href="{{route('roles.index')}}" class="btn btn-success mb-4">Back</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('roles.update', $role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="name" value="{{$role->name}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    @foreach($permissions as $permission)
                        <div class="form-group form-check">
                            <input type="checkbox" value="{{$permission->id}}" @if($role->hasPermissionTo($permission->name)) checked @endif name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">
                            <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>



    </div>




@endsection
