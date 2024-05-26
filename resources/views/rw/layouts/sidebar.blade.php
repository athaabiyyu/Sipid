<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Sipid<sup>v.1.0</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Nav Item - Tentang -->
     <li class="nav-item">
          <a class="nav-link" href="{{ url('rw') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
     </li>

     <!-- Manage Laporan -->
     <hr class="sidebar-divider">
     <li class="nav-item">
          <a class="nav-link" href="{{route('rw.hasil_laporan')}}">
          <i class="fas fa-fw fa-check"></i>
          <span>Hasil Laporan</span></a>
     </li>
     <!-- End Manage Laporan -->

     <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
          Akun
     </div>
     <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
              aria-expanded="true" aria-controls="collapsePages">
              <i class="fas fa-fw fa-user"></i>
              <span>Profile</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Login Screens:</h6>
                  <a class="collapse-item" href="{{ url('laporan/profile') }}">Infromasi Akun</a>
                  <a class="collapse-item" href="{{ url('laporan/sandi') }}">Ubah Sandi</a>
              </div>
          </div>
     </li>
     <hr class="sidebar-divider">

     <!-- Nav Item - Keluar -->
     <li class="nav-item">
          <a class="nav-link" href="{{url('logout')}}">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Keluar</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
     </ul>

     <script>
          document.addEventListener("DOMContentLoaded", function() {
              // Mendapatkan semua dropdown
              var dropdowns = document.querySelectorAll('.collapse');
          
              // Menambahkan event listener untuk setiap dropdown
              dropdowns.forEach(function(dropdown) {
                  // Menutup dropdown saat pengguna mengklik di luar dropdown
                  document.addEventListener('click', function(event) {
                      var isClickInside = dropdown.contains(event.target);
                      if (!isClickInside) {
                          dropdown.classList.remove('show');
                      }
                  });
              });
          });
     </script>
