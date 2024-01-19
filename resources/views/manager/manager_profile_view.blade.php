@extends('manager.manager_dashboard')
@section('manager')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Менеджер</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Профиль</li>
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
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
 	<img src="{{ (!empty($managerData->photo)) ? url('upload/manager_images/'.$managerData->photo):url('upload/no_image.jpg') }}" alt="Менеджер" class="rounded-circle p-1 bg-primary" width="110">
					<div class="mt-3">
						<h4>{{ $managerData->name }}</h4>
						<p class="text-secondary mb-1">{{ $managerData->email }}</p>
						<p class="text-muted font-size-sm">{{ $managerData->address }}</p>

					</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li>

											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
												<span class="text-secondary">codervent</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">

		<form method="post" action="{{ route('manager.profile.store') }}" enctype="multipart/form-data" >
			@csrf

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Имя</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" class="form-control" value="{{ $managerData->username }}" disabled />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Филиал</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="name" class="form-control" value="{{ $managerData->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Email</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="email" name="email" class="form-control" value="{{ $managerData->email }}" />
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Телефон </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="phone" class="form-control" value="{{ $managerData->phone }}" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Адрес</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="text" name="address" class="form-control" value="{{ $managerData->address }}" />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Дата присоединения менеджера </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <select name="manager_join" class="form-select mb-3" aria-label="Default select example">
					<option selected="">Откройте это выпадающее меню</option>

	<option value="2024" {{ $managerData->manager_join == 2024  ? 'selected' : '' }} >2024</option>
	<option value="2025" {{ $managerData->manager_join == 2025  ? 'selected' : '' }}>2025</option>
	<option value="2026" {{ $managerData->manager_join == 2026  ? 'selected' : '' }}>2026</option>
	<option value="2027" {{ $managerData->manager_join == 2027  ? 'selected' : '' }}>2027</option>
	<option value="2028" {{ $managerData->manager_join == 2028  ? 'selected' : '' }}>2028</option>
	<option value="2029" {{ $managerData->manager_join == 2029  ? 'selected' : '' }}>2029</option>
	<option value="2030" {{ $managerData->manager_join == 2030  ? 'selected' : '' }}>2030</option>
					 </select>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Данные о менеджере</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<textarea name="manager_short_info" class="form-control" id="inputAddress2" placeholder="Данные о менеджере " rows="3">
					{{ $managerData->manager_short_info }}
				</textarea>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0">Фото</h6>
				</div>
				<div class="col-sm-9 text-secondary">
					<input type="file" name="photo" class="form-control"  id="image"   />
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-sm-3">
					<h6 class="mb-0"> </h6>
				</div>
				<div class="col-sm-9 text-secondary">
					 <img id="showImage" src="{{ (!empty($managerData->photo)) ? url('upload/manager_images/'.$managerData->photo):url('upload/no_image.jpg') }}" alt="Manager" style="width:100px; height: 100px;"  >
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<input type="submit" class="btn btn-primary px-4" value="Сохранить" />
				</div>
			</div>
        </form>
		</div>





	</div>




							</div>
						</div>
					</div>
				</div>
			</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			let reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});


</script>



@endsection
