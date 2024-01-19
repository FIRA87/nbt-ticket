

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Админ</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li> <a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-circle"></i> Dashboard</a>    </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-right-arrow-alt'></i>
                </div>
                <div class="menu-title">Ticket</div>
            </a>
            <ul>
                <li> <a href="{{ route('ticket.index') }}"><i class="bx bx-right-arrow-alt"></i>Список сообщений</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
                </li>

            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Roles And Permission</div>
            </a>
            <ul>
                <li> <a href="{{ route('add.permission') }}"><i class="bx bx-right-arrow-alt"></i>Add Permission</a>  </li>
                <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>Roles & Permission</a>  </li>

            </ul>
        </li>




        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Tables</div>
            </a>
            <ul>
                <li> <a href="table-basic-table.html"><i class="bx bx-right-arrow-alt"></i>Basic Table</a>
                </li>
                <li> <a href="table-datatable.html"><i class="bx bx-right-arrow-alt"></i>Data Table</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Пользователи</div>
            </a>
            <ul>
                <li> <a href="{{ route('inactive.manager') }}" ><i class="bx bx-right-arrow-alt"></i>Неактивные Менеджеры</a> </li>
                <li> <a href="{{ route('active.manager') }}" ><i class="bx bx-right-arrow-alt"></i>Активные Менеджеры</a> </li>
                <li> <a href="{{ route('all-user') }}" ><i class="bx bx-right-arrow-alt"></i>Все Пользователи</a> </li>
                <li> <a href="{{ route('all-manager') }}" ><i class="bx bx-right-arrow-alt"></i>Все Менеджеры</a> </li>


            </ul>
        </li>




        <li>
            <a href="https://codervent.com/rukada/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
