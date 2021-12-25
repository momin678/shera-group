@php
    use App\Models\User;
    $totalPermissnion = User::checkPermission();
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link" target="_blank">
      <img src="{{asset('assets/frontend/images/en-logo.png') }}" alt="Datagate" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sheragroup</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ activeRoutesLi(['role.index', 'role.create', 'role.edit', 'permission.index', 'permission.create', 'permission.edit', 'staff.index', 'staff.create', 'staff.edit'])}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Our Staffs<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              @if(Auth::user()->user_type == 'admin' || array_intersect([1,2,3,4,5], $totalPermissnion))
              <li class="nav-item" >
                <a href="{{route('staff.index')}}" class="nav-link {{ activeRoutesUlLi(['staff.index', 'staff.create', 'staff.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Staff</p>
                </a>
              </li>
               @endif
               @if(Auth::user()->user_type == 'admin' || array_intersect([6,7,8,9,10], $totalPermissnion))
              <li class="nav-item click_li">
                <a href="{{route('role.index')}}" class="nav-link {{ activeRoutesUlLi(['role.index', 'role.create', 'role.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Roles</p>
                </a>
              </li>
              @endif
              @if(Auth::user()->user_type == 'admin' || array_intersect([29, 30, 31, 32, 33], $totalPermissnion))
              <li class="nav-item click_li">
                <a href="{{route('permission.index')}}" class="nav-link {{ activeRoutesUlLi(['permission.index', 'permission.create', 'permission.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Permission</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item {{activeRoutesLi(['product.create', 'product.edit', 'product.index', 'brand.create', 'brand.edit', 'brand.index', 'category.index', 'category.edit', 'category.create','attributes.index', 'attributes.create', 'attributes.edit'])}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{activeRoutesUlLi(['product.index', 'product.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.create')}}" class="nav-link {{activeRoutesUlLi(['product.create'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{activeRoutesUlLi(['category.index', 'category.create', 'category.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categoey</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('brand.index')}}" class="nav-link {{activeRoutesUlLi(['brand.index', 'brand.create', 'brand.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('attributes.index')}}" class="nav-link {{activeRoutesUlLi(['attributes.index', 'attributes.create', 'attributes.edit'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attribute</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{activeRoutesLi(['smtp_settings', 'social_login'])}}">
            <a href="#" class="nav-link">
              <i class="fas fa-cogs"></i>
              <p>
                Setup & Configurations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('smtp_settings')}}" class="nav-link {{activeRoutesUlLi(['smtp_settings'])}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMTP Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('social_login')}}" class="nav-link {{activeRoutesUlLi(['social_login'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Login</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{activeRoutesLi(['website.header', 'business_settings.home-slider', 'website.left-sidebar', 'website.left-sidebar', 'website.populer-category'])}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Websit-setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('website.header')}}" class="nav-link {{activeRoutesUlLi(['website.header'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Header</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('business_settings.home-slider')}}" class="nav-link {{activeRoutesUlLi(['business_settings.home-slider'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Page Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('website.left-sidebar')}}" class="nav-link {{activeRoutesUlLi(['website.left-sidebar'])}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Left-sidebar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>