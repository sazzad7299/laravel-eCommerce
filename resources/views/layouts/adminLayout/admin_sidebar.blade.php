<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>


                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-apple-safari"></i><span class="hide-menu">Categories </span></a>
                            <ul aria-expanded="false" class="collapse  first-level pl-3">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/add-category') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> Add Category </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/view-categories') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> View Category </span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-apple-safari"></i><span class="hide-menu">Banners </span></a>
                            <ul aria-expanded="false" class="collapse  first-level pl-3">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/add-banner') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> Add Banner </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/view-banners') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> View Banners </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-apple-safari"></i><span class="hide-menu">Coupons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level pl-3">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/add-coupon') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> Add Coupon </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/view-coupons') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> View Coupons </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-basket"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse  first-level pl-3">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/add-product') }}" class="sidebar-link">
                                        <i class="mdi mdi-basket-fill"></i>
                                        <span class="hide-menu"> Add Product </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/view-products') }}" class="sidebar-link">
                                        <i class="mdi mdi-basket-fill"></i>
                                        <span class="hide-menu"> View Product </span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin/view-orders') }}" class="sidebar-link">
                                <i class="mdi mdi-basket-fill"></i>
                                <span class="hide-menu"> View Orders </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/admin/view-users') }}" class="sidebar-link">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu"> View Users </span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-basket"></i><span class="hide-menu">CMS Pages</span></a>
                            <ul aria-expanded="false" class="collapse  first-level pl-3">
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/add-cms') }}" class="sidebar-link">
                                        <i class="mdi mdi-basket-fill"></i>
                                        <span class="hide-menu"> Add CMS </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('/admin/view-cms') }}" class="sidebar-link">
                                        <i class="mdi mdi-basket-fill"></i>
                                        <span class="hide-menu"> View CMS </span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>