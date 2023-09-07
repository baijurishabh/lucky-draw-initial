<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route('user.dashboard')}}">
                <img src="{{ asset('storage/settings/'.$setting->logo_black) }}" class="header-brand-img desktop-logo" height="50px" alt="logo">
                <img src="{{ asset('storage/settings/'.$setting->logo_white) }}" class="header-brand-img toggle-logo" height="50px"
                    alt="logo">
                <img src="{{ asset('storage/settings/'.$setting->logo_white) }}" class="header-brand-img light-logo" height="50px" alt="logo">
                <img src="{{ asset('storage/settings/'.$setting->logo_white) }}" class="header-brand-img light-logo1" height="50px"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{route('user.dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">Dashboard</span></a>
                </li>
                <li class="sub-category">
                    <h3>Items and Category</h3>
                </li>
                <li class="slide
                 {{ (request()->is('user/enquiry-list*')) ? 'is-expanded' : '' }}
                 {{ (request()->is('user/pool/win*')) ? 'is-expanded' : '' }}
                 {{ (request()->is('user/order/list*')) ? 'is-expanded' : '' }}
                 {{ (request()->is('user/grand/pool/win*')) ? 'is-expanded' : '' }}
                 {{ (request()->is('user/rewards/win*')) ? 'is-expanded' : '' }}
                 ">
                    {{-- {{dd(Route::currentRouteName())}} --}}
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span
                            class="side-menu__label">Products</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                        {{-- <li><a href="" class="slide-item"> Category</a></li> --}}
                        <li><a href="{{route('user.enquiryList')}}" class="slide-item {{ (request()->is('user/enquiry-list*')) ? 'active' : '' }}"> Enquiry</a></li>
                        <li><a href="{{route('user.poolWins')}}" class="slide-item {{ (request()->is('user/pool/win*')) ? 'active' : '' }}"> Pool Wins</a></li>
                        <li><a href="{{route('user.grandpoolWins')}}" class="slide-item {{ (request()->is('user/grand/pool/win*')) ? 'active' : '' }}"> Grand Pool Wins</a></li>
                        <li><a href="{{route('user.rewardspoolWins')}}" class="slide-item {{ (request()->is('user/rewards/win*')) ? 'active' : '' }}"> Rewards</a></li>
                        <li><a href="{{route('user.orderList')}}" class="slide-item {{ (request()->is('user/order/list*')) ? 'active' : '' }} "> Orders</a></li>
                        {{-- <li><a href="{" class="slide-item"> </a></li> --}}
                        {{-- <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li> --}}
                        {{-- <li><a href="chat.html" class="slide-item"> Chat</a></li>
                        <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                        <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                        <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                        <li><a href="scroll.html" class="slide-item"> Content Scroll bar</a></li>
                        <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                        <li><a href="counters.html" class="slide-item"> Counters</a></li>
                        <li><a href="rating.html" class="slide-item"> Rating</a></li>
                        <li><a href="timeline.html" class="slide-item"> Timeline</a></li>
                        <li><a href="treeview.html" class="slide-item"> Treeview</a></li>
                        <li><a href="chart.html" class="slide-item"> Charts</a></li>
                        <li><a href="footers.html" class="slide-item"> Footers</a></li>
                        <li><a href="users-list.html" class="slide-item"> User List</a></li>
                        <li><a href="search.html" class="slide-item">Search</a></li>
                        <li><a href="crypto-currencies.html" class="slide-item"> Crypto-currencies</a></li> --}}
                    </ul>
                </li>
                <li class="slide {{ (request()->is('user/payments*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item " data-bs-toggle="slide" href="{{route('user.paymentList')}}"><i
                            class="side-menu__icon fe fe-package"></i>
                            <span
                            class="side-menu__label">Payment</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        {{-- <li class="side-menu-label1"><a href="javascript:void(0)">Bootstrap</a></li> --}}
                        {{-- <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                        <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                        <li><a href="colors.html" class="slide-item"> Colors</a></li> --}}



                        {{-- <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Blogs</span><i
                                    class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a href="avatarsquare.html" class="sub-slide-item"> Blog 1 </a>
                                </li>
                                <li><a href="avatar-round.html" class="sub-slide-item"> Blog 2 </a>
                                </li>
                                <li><a href="avatar-radius.html" class="sub-slide-item"> Blog 3 </a>
                                </li>
                            </ul>
                        </li> --}}

                        <li><a href="{{route('user.paymentList')}}" class="slide-item {{ (request()->is('user/payments*')) ? 'active' : '' }}"> Payment Details</a></li>
                        {{-- <li><a href="" class="slide-item"> Testimonials</a></li> --}}
                     {{--    <li><a href="listgroup.html" class="slide-item"> List Group</a></li>
                        <li><a href="tags.html" class="slide-item"> Tags</a></li>
                        <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                        <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                        <li><a href="typography.html" class="slide-item"> Typography</a></li>
                        <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumbs</a></li>
                        <li><a href="badge.html" class="slide-item"> Badges / Pills</a></li>
                        <li><a href="panels.html" class="slide-item"> Panels</a></li>
                        <li><a href="thumbnails.html" class="slide-item"> Thumbnails</a></li>
                        <li><a href="offcanvas.html" class="slide-item"> Offcanvas</a></li>
                        <li><a href="toast.html" class="slide-item"> Toast</a></li>
                        <li><a href="scrollspy.html" class="slide-item"> Scrollspy</a></li>
                        <li><a href="mediaobject.html" class="slide-item"> Media Object</a></li>
                        <li><a href="accordion.html" class="slide-item"> Accordions</a></li>
                        <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                        <li><a href="modal.html" class="slide-item"> Modal</a></li>
                        <li><a href="tooltipandpopover.html" class="slide-item"> Tooltip and popover</a>
                        </li>
                        <li><a href="progress.html" class="slide-item"> Progress</a></li>
                        <li><a href="carousel.html" class="slide-item"> Carousels</a></li> --}}
                    </ul>
                </li>
                <li class="slide {{ (request()->is('user/referral-list*')) ? 'is-expanded' : '' }}">
                    <a class="side-menu__item" data-bs-toggle="slide" href="{{route('user.referralList')}}"><i
                            class="side-menu__icon fe fe-layers"></i>

                            <span
                            class="side-menu__label">Referral</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('user.referralList')}}" class="slide-item {{ (request()->is('user/referral-list*')) ? 'active' : '' }}"> Referral List</a></li>
                        {{-- <li><a href="{{Auth()->user()->getReferralLink() }}" class="slide-item">{{Auth()->user()->getReferralLink() }}</a></li> --}}

                    </ul>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>
