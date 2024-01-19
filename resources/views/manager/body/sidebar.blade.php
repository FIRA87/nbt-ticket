
@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status;
@endphp



<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Менеджер</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

					<li>
					<a href="{{ route('manager.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Панель управления</div>
					</a>
				</li>


           @if($status === 'active')

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='lni lni-fresh-juice'></i>
						</div>
						<div class="menu-title">Управление сообщениями </div>
					</a>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Все сообщение</a>	</li>
					</ul>
				</li>
	@else

	@endif




				<li>
					<a href=" " target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
