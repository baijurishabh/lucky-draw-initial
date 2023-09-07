<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar" style="overflow: scroll;">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('storage/settings/' . $setting->logo_black) }}" class="header-brand-img desktop-logo"
                    height="50px" alt="logo">
                <img src="{{ asset('storage/settings/' . $setting->logo_black) }}" class="header-brand-img toggle-logo"
                    height="50px" alt="logo">
                <img src="{{ asset('storage/settings/' . $setting->logo_black) }}" class="header-brand-img light-logo"
                    height="50px" alt="logo">
                <img src="{{ asset('storage/settings/' . $setting->logo_black) }}" class="header-brand-img light-logo1"
                    height="50px" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                @can('dashboard-module')
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="{{ route('admin.dashboard') }}"><i
                                class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                    </li>
                @endcan
                <li class="sub-category">
                    <h3>Items and Category</h3>
                </li>
                @can('product-module')
                    <li
                        class="slide
                        {{ (request()->is('admin/category/list*')) ? 'is-expanded' : '' }}
                    {{ (request()->is('admin/product/list*')) ? 'is-expanded' : '' }}
                        ">
                        {{-- {{dd(Route::currentRouteName())}} --}}
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Products</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                            @can('category-list')
                                <li><a href="{{ route('admin.categoryList') }}" class="slide-item {{ (request()->is('admin/category/list*')) ? 'active' : '' }}"> Category</a></li>
                            @endcan
                            @can('product-list')
                                <li><a href="{{ route('admin.productList') }}" class="slide-item {{ (request()->is('admin/product/list*')) ? 'active' : '' }}"> Product</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('pool-module')
                    <li
                        class="slide
                        {{ (request()->is('admin/pool/list*')) ? 'is-expanded' : '' }}
                    {{ (request()->is('admin/pool/details/list*')) ? 'is-expanded' : '' }}
                    {{ (request()->is('admin/enquiries/list*')) ? 'is-expanded' : '' }}
                        ">
                        {{-- {{dd(Route::currentRouteName())}} --}}
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-bullseye"></i><span class="side-menu__label">Pool</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('pool-list')
                                <li><a href="{{ route('admin.poolList') }}" class="slide-item {{ (request()->is('admin/pool/list*')) ? 'active' : '' }}"> Pool</a></li>
                            @endcan
                            @can('pool-product-list')
                                <li><a href="{{ route('admin.poolDetailsList') }}" class="slide-item {{ (request()->is('admin/pool/details/list*')) ? 'active' : '' }}"> Pool Product</a></li>
                            @endcan
                            @can('enquiry-list')
                                <li><a href="{{ route('admin.enquiriesList') }}" class="slide-item {{ (request()->is('admin/enquiries/list*')) ? 'active' : '' }}"> Enquires</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('winner-list')
                    <li class="slide
                    {{ (request()->is('admin/winner/Redeeed/list*')) ? 'is-expanded' : '' }}
                    {{ (request()->is('admin/winner/Pending/list*')) ? 'is-expanded' : '' }}
                    {{ (request()->is('admin/winner/Expired/list*')) ? 'is-expanded' : '' }}
                    ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Winners</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Winners</a></li>
                            <li><a href="{{ route('admin.winnerRedeeedList') }}" class="slide-item {{ (request()->is('admin/winner/Redeeed/list*')) ? 'active' : '' }}"> Redeemed</a></li>
                            <li><a href="{{ route('admin.winnerPendingList') }}" class="slide-item {{ (request()->is('admin/winner/Pending/list*')) ? 'active' : '' }}"> Pending</a></li>
                            <li><a href="{{ route('admin.winnerExpiredList') }}" class="slide-item {{ (request()->is('admin/winner/Expired/list*')) ? 'active' : '' }}"> Expired</a></li>

                        </ul>
                    </li>
                @endcan
                @can('order-module')
                    <li class="slide {{ (request()->is('admin/order/list*')) ? 'is-expanded' : '' }}
                        {{ (request()->is('admin/order/completed/list*')) ? 'is-expanded' : '' }}
                        ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-shopping-bag"></i><span
                                class="side-menu__label">Orders</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('order-list')
                                <li><a href="{{ route('admin.orderList') }}" class="slide-item {{ (request()->is('admin/order/list*')) ? 'active' : '' }}"> Order in Progress</a></li>
                                <li><a href="{{ route('admin.orderCompletedList') }}" class="slide-item {{ (request()->is('admin/order/completed/list*')) ? 'active' : '' }}"> Order Completed</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('user-module')
                    <li class="slide {{ (request()->is('admin/user/list*')) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-address-book"></i><span class="side-menu__label">Users</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('user-list')
                                <li><a href="{{ route('admin.userList') }}" class="slide-item {{ (request()->is('admin/user/list*')) ? 'active' : '' }}">Users List</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('payment-module')
                    <li class="slide {{ (request()->is('admin/payment/plan/list*')) ? 'is-expanded' : '' }}
                        {{ (request()->is('admin/payment/product/list*')) ? 'is-expanded' : '' }}
                        {{ (request()->is('admin/refund/list/pending*')) ? 'is-expanded' : '' }}
                        {{ (request()->is('admin/refund/list/completed*')) ? 'is-expanded' : '' }}
                        ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Payments</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('payment-list')
                                <li><a href="{{ route('admin.paymentPlanList') }}" class="slide-item {{ (request()->is('admin/payment/plan/list*')) ? 'active' : '' }}">Plan Payment</a></li>
                                <li><a href="{{ route('admin.paymentProductList') }}" class="slide-item {{ (request()->is('admin/payment/product/list*')) ? 'active' : '' }}"> Product Payment</a>
                                </li>
                            @endcan
                            @can('refund-module')
                                <li class="sub-slide
                                {{ (request()->is('admin/refund/list/pending*')) ? 'is-expanded' : '' }}
                                {{ (request()->is('admin/refund/list/completed*')) ? 'is-expanded' : '' }}
                                ">
                                    <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                            class="sub-side-menu__label">Refund</span><i
                                            class="sub-angle fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu">
                                        @can('refund-list')
                                            <li><a class="sub-slide-item {{ (request()->is('admin/refund/list/pending*')) ? 'active' : '' }}" href="{{ route('admin.refund.pendingList') }}">Pending
                                                    Refunds</a></li>
                                            <li><a class="sub-slide-item {{ (request()->is('admin/refund/list/completed*')) ? 'active' : '' }}"
                                                    href="{{ route('admin.refund.completedList') }}">Completed Refunds</a></li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('blog-module')
                    <li class="slide {{ (request()->is('admin/blog/list*')) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-slack"></i><span class="side-menu__label">Blogs </span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('blog-list')
                                <li><a href="{{ route('admin.blogList') }}" class="slide-item {{ (request()->is('admin/blog/list*')) ? 'active' : '' }}"> Blogs</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('testimonial-module')
                    <li class="slide {{ (request()->is('admin/testimony/list*')) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-tumblr"></i><span class="side-menu__label">Testimonial
                            </span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="slide-menu">
                            @can('testimonial-list')
                                <li><a href="{{ route('admin.testimonyList') }}" class="slide-item {{ (request()->is('admin/testimony/list*')) ? 'active' : '' }}"> Testimonials</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('marketing-module')
                <li class="slide
                {{ (request()->is('admin/marketing/users-joined-list*')) ? 'is-expanded' : '' }}
                {{ (request()->is('admin/marketing/users-not-purchased-plan*')) ? 'is-expanded' : '' }}
                {{ (request()->is('admin/marketing/top-selling-products*')) ? 'is-expanded' : '' }}
                {{ (request()->is('admin/marketing/users-referral-list*')) ? 'is-expanded' : '' }}
                ">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-pie-chart"></i><span class="side-menu__label">Marketing
                        </span><i class="angle fe fe-chevron-left"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('admin.marketing.userReferralList')}}" class="slide-item  {{ (request()->is('admin/marketing/users-referral-list*')) ? 'active' : '' }}"> Referral List</a></li>
                            <li><a href="{{route('admin.marketing.joinedList')}}" class="slide-item  {{ (request()->is('admin/marketing/users-joined-list*')) ? 'active' : '' }}"> User Joined</a></li>
                            <li><a href="{{route('admin.marketing.userNotPurchasedPlan')}}" class="slide-item {{ (request()->is('admin/marketing/users-not-purchased-plan*')) ? 'active' : '' }}"> User Not Purchased</a></li>
                            <li><a href="{{route('admin.marketing.topSellingProduct')}}" class="slide-item {{ (request()->is('admin/marketing/top-selling-products*')) ? 'active' : '' }}"> Top Selling</a></li>
                            <li class="slide {{ (request()->is('admin/leads/list*')) ? 'is-expanded' : '' }}">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fa fa-weixin"></i><span class="side-menu__label">Templates
                                    </span><i class="angle fe fe-chevron-left"></i></a>
                                <ul class="slide-menu">
                                        <li><a href="{{route('admin.marketingTemplatelist')}}" class="slide-item {{ (request()->is('admin/leads/list*')) ? 'active' : '' }}">View</a></li>
                                </ul>
                            </li>
                    </ul>
                </li>
                @endcan
                @can('policy-module')
                <li class="slide {{ (request()->is('admin/policy/registration/list*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-shield"></i><span class="side-menu__label">Policys
                        </span><i class="angle fe fe-chevron-left"></i></a>
                    <ul class="slide-menu">

                            <li><a href="{{route('admin.registration_policylist')}}" class="slide-item {{ (request()->is('admin/policy/registration/list*')) ? 'active' : '' }}">Refund Policy</a></li>
                    </ul>
                </li>
                @endcan
                @can('faq-module')
                <li class="slide {{ (request()->is('admin/faqs/list*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-weixin"></i><span class="side-menu__label">FAQs
                        </span><i class="angle fe fe-chevron-left"></i></a>
                    <ul class="slide-menu">
                        @can('faq-list')
                            <li><a href="{{route('admin.faqlist')}}" class="slide-item {{ (request()->is('admin/faqs/list*')) ? 'active' : '' }}">FAQs</a></li>
                            @endcan
                    </ul>
                </li>
                @endcan
                @can('leads-module')
                <li class="slide {{ (request()->is('admin/leads/list*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-weixin"></i><span class="side-menu__label">Leads
                        </span><i class="angle fe fe-chevron-left"></i></a>
                    <ul class="slide-menu">
                        @can('leads-list')
                            <li><a href="{{route('admin.leadslist')}}" class="slide-item {{ (request()->is('admin/leads/list*')) ? 'active' : '' }}">Leads</a></li>
                        @endcan
                        </ul>
                </li>

                @endcan

                {{-- {{dd((request()->is('admin/admins*')) ? 'active' : '');}} --}}
                @can('pool-module')
                <li class="sub-category">
                    <h3>Grand LuckyDraw</h3>
                </li>
                <li class="slide {{ (request()->is('admin/grand/pool/list*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-product-hunt"></i><span
                            class="side-menu__label">Grand Pool</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        {{-- <li class="side-menu-label1"><a href="javascript:void(0)">Maps</a></li> --}}
                        @can('pool-list')
                        <li><a href="{{route('admin.grandpoolList')}}" class="slide-item {{ (request()->is('admin/grand/pool/list*')) ? 'active' : '' }}">Pool</a></li>
@endcan
                    </ul>
                </li>
                @endcan
                @can('winner-list')
                <li class="slide
                {{ (request()->is('admin/grand/winner/Redeeed/list*')) ? 'is-expanded' : '' }}
                {{ (request()->is('admin/grand/winner/Pending/list*')) ? 'is-expanded' : '' }}
                {{ (request()->is('admin/grand/winner/Expired/list*')) ? 'is-expanded' : '' }}
                    ">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fa fa-flag-o"></i><span
                            class="side-menu__label">Grand Winners</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        {{-- <li class="side-menu-label1"><a href="javascript:void(0)">Maps</a></li> --}}
                        <li><a href="{{ route('admin.grandwinnerRedeeedList') }}" class="slide-item {{ (request()->is('admin/grand/winner/Redeeed/list*')) ? 'active' : '' }}"> Redeemed</a></li>
                        <li><a href="{{ route('admin.grandwinnerPendingList') }}" class="slide-item {{ (request()->is('admin/grand/winner/Pending/list*')) ? 'active' : '' }}"> Pending</a></li>
                        <li><a href="{{ route('admin.grandwinnerExpiredList') }}" class="slide-item {{ (request()->is('admin/grand/winner/Expired/list*')) ? 'active' : '' }}"> Expired</a></li>
                    </ul>
                </li>
                @endcan
                <li class="sub-category">
                    <h3>Settings</h3>
                </li>


                {{-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">File
                            Manager</span><span class="badge bg-pink side-badge">4</span><i
                            class="angle fe fe-chevron-right hor-angle"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">File Manager</a></li>
                        <li><a href="file-manager.html" class="slide-item"> File Manager</a></li>
                        <li><a href="filemanager-list.html" class="slide-item"> File Manager List</a></li>
                        <li><a href="filemanager-details.html" class="slide-item"> File Details</a></li>
                        <li><a href="file-attachments.html" class="slide-item"> File Attachments</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="sub-category">
                    <h3>Misc Pages</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-users"></i><span
                            class="side-menu__label">Authentication</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Authentication</a></li>
                        <li><a href="login.html" class="slide-item"> Login</a></li>
                        <li><a href="register.html" class="slide-item"> Register</a></li>
                        <li><a href="forgot-password.html" class="slide-item"> Forgot Password</a></li>
                        <li><a href="lockscreen.html" class="slide-item"> Lock screen</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Error Pages</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="400.html" class="sub-slide-item"> 400</a></li>
                                <li><a href="401.html" class="sub-slide-item"> 401</a></li>
                                <li><a href="403.html" class="sub-slide-item"> 403</a></li>
                                <li><a href="404.html" class="sub-slide-item"> 404</a></li>
                                <li><a href="500.html" class="sub-slide-item"> 500</a></li>
                                <li><a href="503.html" class="sub-slide-item"> 503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-cpu"></i>
                        <span class="side-menu__label">Submenu items</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Submenu items</a></li>
                        <li><a href="javascript:void(0)" class="slide-item">Submenu-1</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Submenu-2</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.1</a></li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.2</a></li>
                                <li class="sub-slide2">
                                    <a class="sub-side-menu__item2" href="javascript:void(0)"
                                        data-bs-toggle="sub-slide2"><span
                                            class="sub-side-menu__label2">Submenu-2.3</span><i
                                            class="sub-angle2 fe fe-chevron-right"></i></a>
                                    <ul class="sub-slide-menu2">
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.1</a></li>
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.2</a></li>
                                        <li><a href="javascript:void(0)" class="sub-slide-item2">Submenu-2.3.3</a></li>
                                    </ul>
                                </li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.4</a></li>
                                <li><a class="sub-slide-item" href="javascript:void(0)">Submenu-2.5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>General</h3>
                </li>
                <li>
                    <a class="side-menu__item" href="widgets.html"><i
                            class="side-menu__icon fe fe-grid"></i><span
                            class="side-menu__label">Widgets</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-map-pin"></i><span
                            class="side-menu__label">Maps</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Maps</a></li>
                        <li><a href="maps1.html" class="slide-item">Leaflet Maps</a></li>
                        <li><a href="maps2.html" class="slide-item">Mapel Maps</a></li>
                        <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-bar-chart-2"></i><span
                            class="side-menu__label">Charts</span><span
                            class="badge bg-secondary side-badge">6</span><i
                            class="angle fe fe-chevron-right hor-angle"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Charts</a></li>
                        <li><a href="chart-chartist.html" class="slide-item">Chart Js</a></li>
                        <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                        <li><a href="chart-echart.html" class="slide-item"> ECharts</a></li>
                        <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                        <li><a href="chart-nvd3.html" class="slide-item"> Nvd3 Charts</a></li>
                        <li><a href="charts.html" class="slide-item"> C3 Bar Charts</a></li>
                        <li><a href="chart-line.html" class="slide-item"> C3 Line Charts</a></li>
                        <li><a href="chart-donut.html" class="slide-item"> C3 Donut Charts</a></li>
                        <li><a href="chart-pie.html" class="slide-item"> C3 Pie charts</a></li>
                    </ul>
                </li> --}}
                @can('admin-module')


                    <li class="slide
                     {{ (request()->is('admin/roles*')) ? 'is-expanded' : '' }}
                     {{ (request()->is('admin/admins*')) ? 'is-expanded' : '' }}
                     ">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fa fa-users"></i><span class="side-menu__label">Admins</span><i
                                class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            @can('admin-list')
                                <li><a href="{{ route('admin.admins.index') }}" class="slide-item {{ (request()->is('admin/admins*')) ? 'active' : '' }}"> Admins</a></li>
                            @endcan
                            @can('role-list')
                                <li><a href="{{ route('admin.roles.index') }}" class="slide-item {{ (request()->is('admin/roles*')) ? 'active' : '' }}"> Roles</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('site-settings-module')
                    <li
                        class="slide {{ (request()->is('admin/settings/list*')) ? 'is-expanded' : '' }}">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                class="side-menu__icon fe fe-wind"></i><span class="side-menu__label">Site
                                Settings</span><i class="angle fe fe-chevron-right"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Settings</a></li>
                            @can('site-settings-list')
                                <li class=""> <a href="{{ route('admin.settingsList') }}"
                                        class="slide-item {{ (request()->is('admin/settings/list*')) ? 'active' : '' }}">Settings</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
