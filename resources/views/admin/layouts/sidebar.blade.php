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
          <a class="nav-link" href="{{ url('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
     </li>

     <!-- Manage Laporan -->
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
          Laporan
     </div>
     <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/rekap_laporan') }}">
          <i class="fas fa-fw fa-book"></i>
          <span>Rekap Laporan</span></a>
     </li>
     <!-- End Manage Laporan -->

     <!-- Pengambilan Keputusan -->
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
          Perhitungan SPK
     </div>
     <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/kriteria') }}">
              <i class="fas fa-fw fa-calculator"></i>
              <span>Pengambilan Keputusan</span></a>
     </li>
     <!-- End Pengambilan Keputusan -->

     <!-- Manage Data -->
     <hr class="sidebar-divider">
     <div class="sidebar-heading">
          Edit Data
     </div>
     <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
              aria-expanded="true" aria-controls="collapseData">
              <i class="fas fa-fw fa-database"></i>
              <span>Manage Data</span>
          </a>
          <div id="collapseData" class="collapse" aria-labelledby="headingData"
              data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Laporan:</h6>
                    <a class="collapse-item" href="{{ url('admin/infrastruktur') }}">Data Infrastruktur</a>
               </div>
          </div>
     </li>
     <!-- End Manage Data -->

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
                  <h6 class="collapse-header">Pengaturan Profile:</h6>
                  <a class="collapse-item" href="{{ route('admin.profile') }}">Infromasi Akun</a>
                  <a class="collapse-item" href="{{ route('admin.sandi') }}">Ubah Sandi</a>
              </div>
          </div>
     </li>
     <hr class="sidebar-divider">

     <!-- Nav Item - Keluar -->
     <!-- Nav Item - Keluar -->
     <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Keluar</span>
          </a>
     </li>
     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Keluarkan Akun?</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" apabila ingin mengeluarkan akun anda</div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <form action="/logout" method="post">
                              @csrf
                             <button type="submit" class="btn btn-danger">Logout</button>
                         </form>
                    </div>
               </div>
          </div>
     </div> 

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
     
      