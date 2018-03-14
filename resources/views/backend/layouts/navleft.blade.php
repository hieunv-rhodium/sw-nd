<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel -->
      @if (Auth::check()) 
      <div class="user-panel">
        <div class="pull-left image">
           
          <img src="/imgs/avatar/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
          
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @endif

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>
        </li>

        <li>
          <a href="/widget">
            <i class="fa fa-th"></i> <span>Widgets</span>
          </a>
        </li>

        <li>
          <a href="/marketing-image">
            <i class="fa fa-picture-o"></i> <span>Marketing Images</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/categories"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="/subcategory"><i class="fa fa-circle-o"></i> Subcategories</a></li>
          </ul>
        </li>

        <li>
          <a href="/product">
            <i class="fa fa-product-hunt"></i> <span>Products</span>
          </a>
        </li>

        <li>
          <a href="/lesson">
            <i class="fa fa-book"></i> <span>Lessons</span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>