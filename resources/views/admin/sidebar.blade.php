<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/home')}}">
        <div class="sidebar-brand-icon">
            <img src="Restaurant_logo.png" width="100%"/>
        </div>
        <div class="sidebar-brand-text mx-3">Restaurants</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - add tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('add_table_view')}}">
            <i class="fas fa-fw fa-chair"></i> <!-- Changed icon to 'fa-chair' -->
            <span>Add Tables</span></a>
    </li>

    <!-- Nav Item - booking -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('booking')}}">
            <i class="fas fa-fw fa-book-open"></i> <!-- Changed icon to 'fa-book-open' -->
            <span>Reservation</span></a>
    </li>

    <!-- Nav Item - manage tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('tables')}}">
            <i class="fas fa-fw fa-table"></i> <!-- Changed icon to 'fa-table' -->
            <span>Table Management</span></a>
    </li>

                <!-- Nav Item - admin rights -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('users_rights')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Rights</span></a>
            </li>


            <!-- Nav Item - Contact forms -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('contact_forms')}}">
                    <i class="fas fa-fw fa-phone"></i>
                    <span>Contact Forms</span></a>
            </li>


 <!-- Nav Item - FAQ's Category -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('faq_managment')}}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>FAQ Category</span></a>
            </li>

 <!-- Nav Item - FAQ's Items -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('faqItem_managment')}}">
                    <i class="fas fa-fw fa-question"></i>
                    <span>FAQ Items</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->