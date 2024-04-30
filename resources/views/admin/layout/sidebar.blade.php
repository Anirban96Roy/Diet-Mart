
<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="{{asset('newAsset/img/AdminLTELogo.png')}}"  class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">Diet-Mart</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{route('admin.dashboard')}}" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="{{route('category.index')}}" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Category</p>
								</a>
							</li>
							
							
							<li class="nav-item">
								<a href="{{route('product.view')}}" class="nav-link">
									<i class="nav-icon fas fa-tag"></i>
									<p>Products</p>
								</a>
							</li>
							
													
							<li class="nav-item">
								<a href="{{route('order.view')}}" class="nav-link">
									<i class="nav-icon fas fa-shopping-bag"></i>
									<p>Orders</p>
								</a>
							</li>
							
						
													
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>