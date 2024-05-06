<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"><!--begin::Sidebar Brand-->
  <div class="sidebar-brand"><!--begin::Brand Link--><a href="/" class="brand-link">
    <!--begin::Brand Text-->
    <span class="brand-text fw-light">CPE Management Portal</span>
    <!--end::Brand Text--></a><!--end::Brand Link-->
  </div><!--end::Sidebar Brand--><!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
      <nav class="mt-2"><!--begin::Sidebar Menu-->
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="/" class="nav-link @yield('home')"><i class="nav-icon fa-solid fa-house"></i>
                <p>Home</p>
              </a>
            </li>

            @auth('web')
              @role(['admin'])
                <li class="nav-item">
                  <a href="/admin" class="nav-link @yield('dashboard')"><i class="nav-icon fa-solid fa-gauge-high"></i>
                    <p>Admin Panal</p>
                  </a>
                </li>

                <li class="nav-item @yield('menuviewregistereduser') active">
                  <a href="#" class="nav-link m-0"><i class="nav-icon fa-solid fa-users"></i>
                    <p>Users<i class="nav-arrow fas fa-angle-right right"></i></p>
                  </a>
                  <ul class="nav nav-treeview fs-7 my-1 border border-top-0 border-bottom-0 border-4 border-light-subtle rounded-3">
                    <li class="nav-item">
                      <a href="/viewallsubscribers" class="nav-link @yield('viewregisteredsubscriber')"><i class="fa-solid fa-user"></i>
                        <p>View Subscribers</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/viewalluser" class="nav-link @yield('viewregistereduser')"><i class="fa-solid fa-user-shield"></i>
                        <p>View System User</p>
                      </a>
                    </li>
                  </ul>
                </li>
              @endrole
              @role(['technician'])
                <li class="nav-item @yield('menuregister') active">
                  <a href="#" class="nav-link m-0"><i class="nav-icon fa-solid fa-user-plus"></i>
                    <p>Register<i class="nav-arrow fas fa-angle-right right"></i></p>
                  </a>
                  <ul class="nav nav-treeview fs-7 my-1 border border-top-0 border-bottom-0 border-4 border-light-subtle rounded-3">
                    <li class="nav-item">
                      <a href="/register" class="nav-link @yield('register')"><i class="nav-icon fa-solid fa-user-plus"></i>
                        <p>Register User</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/addnas" class="nav-link @yield('registernas')"><i class="nav-icon fa-solid fa-server"></i>
                        <p>Add NAS</p>
                      </a>
                    </li>
                    @role(['admin'])
                    <li class="nav-item">
                      <a href="/addsystemuser" class="nav-link @yield('registersystemuser') m-0"><i class="fa-solid fa-person-rifle"></i>
                        <p>Add System Users</p>
                      </a>
                    </li>
                    @endrole
                  </ul>
                </li>
              @endrole
            @endauth
            @auth('sub')
              <li class="nav-item">
                <a href="/dashboard" class="nav-link @yield('dashboard')"><i class="nav-icon fa-solid fa-gauge-high"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/account" class="nav-link @yield('account')"><i class="nav-icon fa-solid fa-user-secret"></i>
                  <p>Account</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="/router" class="nav-link @yield('routersetting')"><i class="nav-icon fa-solid fa-wifi"></i>
                  <p>Router Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/support" class="nav-link @yield('support')"><i class="nav-icon fa-solid fa-ticket"></i>
                  <p>Support</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/timeline" class="nav-link @yield('timeline')"><i class="nav-icon fa-solid fa-timeline"></i>
                  <p>Timeline</p>
                </a>
              </li>
            @endauth

            {{-- <li class="nav-item">
              <a href="/offers" class="nav-link @yield('offers')"><i class="nav-icon fa-solid fa-bullhorn"></i>
                <p>Offers</p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="/services" class="nav-link @yield('services')"><i class="nav-icon fa-solid fa-microchip"></i>
                <p>Services</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/contacts" class="nav-link @yield('contacts')"><i class="nav-icon fa-solid fa-phone-volume"></i>
                <p>Contacts</p>
              </a>
            </li>
            
            
              
              

          </ul><!--end::Sidebar Menu-->
      </nav>
  </div><!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->