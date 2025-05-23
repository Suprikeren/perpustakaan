 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
                     class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="{{ route('dashboard') }}" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MATER DATA  CATEGORIES</li>
                 <li class="nav-item">
                     <a href="{{ route('categories.index') }}"
                         class="nav-link class {{ Request::is('categories*') ? 'active' : '' }}">
                         <p>
                             categories
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MATER DATA MEDICATIONS</li>
                 <li class="nav-item">
                     <a href="#"
                         class="nav-link class {{ Request::is('medications*') ? 'active' : '' }}">
                         <p>
                             Medications
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MATER DATA EMPLOYES</li>
                 <li class="nav-item">
                     <a href="#"
                         class="nav-link class {{ Request::is('employes*') ? 'active' : '' }}">
                         <p>
                             Employes
                         </p>
                     </a>
                 </li>
                 @if (auth()->check() && auth()->user()->is_super_admin)
                     <li class="nav-header">MATER DATA USERS MANAGEMENT</li>
                     <li class="nav-item">
                         <a href="#"
                             class="nav-link class {{ Request::is('user-management*') ? 'active' : '' }}">
                             <p>
                                 Users management
                             </p>
                         </a>
                     </li>
                 @endif
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <p>Logout</p>
                     </a>
                     <form action="{{ route('logout') }}" method="POST" style="display:none" id="logout-form">
                         @csrf
                     </form>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
