@extends('admin.admin_dashboard')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Inactive Manager Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Inactive Manager Details</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

<div class="col-lg-12">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('active.manager.approve') }}" enctype="multipart/form-data" >
			@csrf

		<input type="hidden" name="id" value="{{ $inactiveManagerDetails->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">User Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="username" value="{{ $inactiveManagerDetails->username }}"   disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">  Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="{{ $inactiveManagerDetails->name }}" disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="{{ $inactiveManagerDetails->email }}" disabled/>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Phone </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="{{ $inactiveManagerDetails->phone }}" disabled/>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Address</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="{{ $inactiveManagerDetails->address }}" disabled/>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">ВХ/ИСХ</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="manager_join" class="form-control" value="{{ $inactiveManagerDetails->io }}" disabled/>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Тип сообщений</h6>
				</div>
				<div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="message_type" value="{{ $inactiveManagerDetails->message_type }}"  disabled />
				</div>
			</div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Валюта</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="rate" value="{{ $inactiveManagerDetails->rate }}"  disabled />
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Корреспондень</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="correspondent" value="{{ $inactiveManagerDetails->correspondent }}"   disabled/>
                </div>
            </div>




			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ (!empty($inactiveManagerDetails->photo)) ? url('upload/manager_images/'.$inactiveManagerDetails->photo):url('upload/no_image.jpg') }}" alt="Manager" style="width:100px; height: 100px;"  >
				</div>
			</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-danger px-4" value="Активировать" />
				</div>
			</div>
		</div>

		</form>



	</div>




							</div>
						</div>
					</div>
				</div>
			</div>






@endsection
