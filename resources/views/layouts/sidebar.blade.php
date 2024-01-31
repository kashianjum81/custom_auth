  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
          <!-- Sidebar scroll-->
          <?php
          $websettings = \App\Models\Websetting::first();
          ?>
          <div>
              <div class="brand-logo d-flex align-items-center justify-content-between">
                  <a href="modernizee-free" class="text-nowrap logo-img">
                      <img src="{{ asset('assets/images/logos/' . $websettings->logo) }}" width="180"
                          alt="logo" />

                      {{-- <img src="assets/{{ $websettings->logo}}" width="180" alt="logo"/> --}}
                  </a>

                  <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                      <i class="ti ti-x fs-8"></i>
                  </div>
              </div>
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                  <ul id="sidebarnav">
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">Home</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="{{ route('welcome-dashboard') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-layout-dashboard"></i>
                              </span>
                              <span class="hide-menu">Dashboard</span>
                          </a>
                      </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">UI COMPONENTS</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="web-settings" aria-expanded="false">
                              <span class="ti ti-settings"></span>

                              <span class="hide-menu">Settings</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-article"></i>
                              </span>
                              <span class="hide-menu">Buttons</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-alert-circle"></i>
                              </span>
                              <span class="hide-menu">Alerts</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-cards"></i>
                              </span>
                              <span class="hide-menu">Card</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-file-description"></i>
                              </span>
                              <span class="hide-menu">Forms</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-typography"></i>
                              </span>
                              <span class="hide-menu">Typography</span>
                          </a>
                      </li>
                      @if (auth()->user()->type == 1)
                          <li class="nav-small-cap">
                              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                              <span class="hide-menu">AUTH</span>
                          </li>
                          <li class="sidebar-item" id="loginNavItem">
                              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                                  <span>
                                      <i class="ti ti-login"></i>
                                  </span>
                                  <span class="hide-menu">Login</span>
                              </a>
                          </li>
                          @auth
                              <li class="sidebar-item">
                                  <a class="sidebar-link" href="#" aria-expanded="false" onclick="return false;"
                                      style="pointer-events: none; cursor: default;">
                                      <span>
                                          <i class="ti ti-user-plus"></i>
                                      </span>
                                      <span class="hide-menu">Registerd</span>
                                  </a>
                              </li>
                          @else
                              <li class="sidebar-item">
                                  <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                                      <span>
                                          <i class="ti ti-user-plus"></i>
                                      </span>
                                      <span class="hide-menu">Register</span>
                                  </a>
                              </li>
                          @endauth
                      @endif
                      {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li> --}}
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">EXTRA</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-mood-happy"></i>
                              </span>
                              <span class="hide-menu">Icons</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-aperture"></i>
                              </span>
                              <span class="hide-menu">Sample Page</span>
                          </a>
                      </li>
                  </ul>
                  <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                      <div class="d-flex">
                          <div class="unlimited-access-title me-3">
                              <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                              <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/"
                                  target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                          </div>
                          <div class="unlimited-access-img">
                              <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                          </div>
                      </div>
                  </div>
              </nav>
              <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
      </aside>
