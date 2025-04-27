        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo m-0 border-bottom">
            <a href="{{ route('dashboard') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('logo-rsabhk.png') }}" style="max-width: 200px" alt="">
              </span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div>Dashboard</div>
                </a>
              </li>
              
              <!-- Role Management -->
              <li class="menu-item {{ Route::is('roles*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-key"></i>
                  <div>Roles</div>
                </a>
              </li>
              
              <!-- User Management -->
              <li class="menu-item {{ Route::is('user*') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-group"></i>
                  <div>Users</div>
                </a>
              </li>

              <!-- Room Management -->
              <li class="menu-item {{ Route::is('rooms*') ? 'active' : '' }}">
                <a href="{{ route('rooms.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-door-open"></i>
                  <div>Rooms</div>
                </a>
              </li>

              <!-- Action Management -->
              <li class="menu-item {{ Route::is('actions*') ? 'active' : '' }}">
                <a href="{{ route('actions.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-tachometer"></i>
                  <div>Actions</div>
                </a>
              </li>

              <!-- Education Management -->
              <li class="menu-item {{ Route::is('educations*') ? 'active' : '' }}">
                <a href="{{ route('educations.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-book"></i>
                  <div>Education</div>
                </a>
              </li>

              <!-- Patient Category Management -->
            <li class="menu-item {{ Route::is('patient_categories*') ? 'active' : '' }}">
              <a href="{{ route('patient_categories.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div>Patient Categories</div>
              </a>
            </li>

            <!-- Employment Management -->
            <li class="menu-item {{ Route::is('employments*') ? 'active' : '' }}">
              <a href="{{ route('employments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div>Employments</div>
              </a>
            </li>

                <!-- Patient Management -->
            <li class="menu-item {{ Route::is('patients*') ? 'active' : '' }}">
              <a href="{{ route('patients.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div>Pasien</div>
              </a>
            </li>

            <!-- Registration Management -->
            <li class="menu-item {{ Route::is('registrations*') ? 'active' : '' }}">
              <a href="{{ route('registrations.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-calendar"></i>
                  <div>Pendaftaran</div>
              </a>
            </li>

          <!-- Transaction Management -->
          <li class="menu-item {{ Route::is('transactions*') ? 'active' : '' }}">
            <a href="{{ route('transactions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div>Transaksi</div>
            </a>
          </li>
<!-- Laporan Pendaftaran Pasien -->
<li class="menu-item {{ Route::is('report.registrations') ? 'active' : '' }}">
  <a href="{{ route('report.registrations') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-file"></i>
    <div>Laporan Pendaftaran Pasien</div>
  </a>
</li>

<!-- Laporan Pendapatan -->
<li class="menu-item {{ Route::is('report.revenue') ? 'active' : '' }}">
  <a href="{{ route('report.revenue') }}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-file"></i>
    <div>Laporan Pendapatan</div>
  </a>
</li>
          </ul>
          </aside>
          <!-- / Menu -->