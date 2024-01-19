@extends('admin.admin_dashboard')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Active Manager Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Active Manager Details</li>
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

		<form method="post" action="{{ route('inactive.manager.approve') }}" enctype="multipart/form-data" >
			@csrf

		<input type="hidden" name="id" value="{{ $activeManagerDetails->id }}">

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">User Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" name="username" value="{{ $activeManagerDetails->username }}"   />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> Shop Name</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="{{ $activeManagerDetails->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="{{ $activeManagerDetails->email }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Phone </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="{{ $activeManagerDetails->phone }}" />
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Address</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="{{ $activeManagerDetails->address }}" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Join</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="manager_join" class="form-control" value="{{ $activeManagerDetails->manager_join }}" />
				</div>
			</div>




			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Info</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<textarea name="manager_short_info" class="form-control" id="inputAddress2" placeholder="Manager Info " rows="3">
					{{ $activeManagerDetails->manager_short_info }}
				</textarea>
				</div>
			</div>



			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Manager Photo</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ (!empty($activeManagerDetails->photo)) ? url('upload/manager_images/'.$activeManagerDetails->photo):url('upload/no_image.jpg') }}" alt="Manager" style="width:100px; height: 100px;"  >
				</div>
			</div>




			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-danger px-4" value="InActive Manager" />
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
