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
                    <a href="#" class="btn btn-success mb-4">Back</a>
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
                <form method="post" action="{{ route('store.permission') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permission Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <h6>Group Name</h6>
                    <select class="form-select" id="inputGroupSelect01" name="group_name">
                        <option selected="">Choose...</option>
                        <option value="Ticket">Ticket</option>
                    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>



    </div>




@endsection
