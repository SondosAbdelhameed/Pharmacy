<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icon.jpg')}}">
    <!-- Google Fonts
		============================================ -->
    {{--<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">--}}
    <!-- Bootstrap CSS
		============================================ -->
        

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
{{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    {{--<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    {{--<link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar/fullcalendar.print.min.css')}}">--}}
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    {{--<script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>--}}
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style>
    .header-top-area {
    background: #420605;
}

.sidebar-nav .metismenu a{
        font-size: 14px !important;
    }

    #sidebar {
    min-width: 200px;
}

.sidebar-nav .metismenu a {
    /* color: #8d9498; */
	color:black;
}
</style>

@if(App::isLocale('en')) 
<style>
    .header-top-area {
    background: #420605;
}
</style>

@endif


@if(App::isLocale('ar')) 
<style>
body{
    direction:rtl;
}
.all-content-wrapper{
        margin-left: unset;
        margin-right: 200px;
}
.header-top-area {
    left: 0px !important;
    right: 200px !important;
}
.mini-navbar .header-top-area {
left:0 !important;
right: 80px !important;
    }
    .mini-navbar .all-content-wrapper {
            margin-left: 0px;
            margin-right: 75px;
    }

    .message-menu .mCSB_outside+.mCSB_scrollTools, .notification-menu .mCSB_outside+.mCSB_scrollTools, .left-custom-menu-adp-wrap .mCSB_outside+.mCSB_scrollTools {
    left: 0px;
    right:unset;
    margin: 0px 0px;
}
.breadcome-list{
    margin-top:50px;
}
.comment-scrollbar, .timeline-scrollbar, .messages-scrollbar, .project-list-scrollbar {
    height: 100%;
}


th,td{
	text-align:right;
}
.col-md-3,.col-md-4,.col-md-6,.col-sm-4{
	float:right;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    vertical-align: middle;
}
.panel-body a{
    color:white;
}


.col-md-2, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9,.col-md-3,.col-md-4,.col-md-6,.col-sm-4,.col-sm-2,.col-sm-1,.col-sm-3 {
    float: right;
}
.header-right-info .navbar-nav {
     float: left; 
    padding: 17px 0px;
}
@media (max-width: 990px){
    .all-content-wrapper{
    margin-left: 0px;
    margin-right: 0px;
}
.header-top-area {
    left: 0px !important;
     right: 0px !important; 
}


.logo-pro {
      display:none;
    }
    .header-advance-area{
        top:0px;
    }
    .col-md-3,.col-md-4,.col-md-6,.col-sm-4,.col-sm-2{
    float:right;
    width:100%;
}
}

.breadcome-list {
    /* margin-top: 20px; */
}

.nav-tabs>li {
    float: right;
    }
    
</style>
@endif

</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{url('dashboard')}}"><img class="main-logo" src="{{url('img/Logo.png')}}" alt="" width="200px"/></a>
                <strong><a href="{{url('dashboard')}}"><img src="{{url('img/Logo.png')}}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
  
                        <li>
                            <a title="Landing Page" href="{{url('dashboard')}}" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.dashboard') }}</span></a>
                        </li>
                     
                        <li>
                            <a class="has-arrow" id="sales" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.manage_sales') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('managebill')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.manage_bill') }}</span></a></li>
                                <li><a  href="{{url('returnbilllist')}}"><span class="mini-sub-pro">{{ __('adminmenu.return_bill') }}</span></a></li>
                                <li><a  href="{{url('pricelist')}}"><span class="mini-sub-pro">{{ __('adminmenu.price_offer') }}</span></a></li>
								<li><a  href="{{url('pointofsale')}}" target="_blank"><span class="mini-sub-pro">{{ __('adminmenu.sale_point') }}</span></a></li>
								<li><a  href="{{url('managepointofsale')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_sale_point') }}</span></a></li>
                            </ul>
                        </li>
                  
						@if(!(auth()->user()->id ==4 ||  auth()->user()->id == 5))
						<li>
                            <a class="has-arrow" id="purchase" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.manage_purchase') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('purchasemanagebill')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.manage_bill') }}</span></a></li>
                                <li><a  href="{{url('purchasereturnbill')}}"><span class="mini-sub-pro">{{ __('adminmenu.return_bill') }}</span></a></li>
                                <li><a  href="{{url('purchaserequest')}}"><span class="mini-sub-pro">{{ __('adminmenu.purchase_request') }}</span></a></li>
                            </ul>
                        </li>
                        @endif
						
						<li>
                            <a class="has-arrow" id="customer" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.manage_customer') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('customerlist')}}"><span class="mini-sub-pro">{{ __('adminmenu.customer_list') }}</span></a></li>
                            </ul>
                        </li>
						@if(!(auth()->user()->id ==4 ||  auth()->user()->id == 5))
						<li>
                            <a class="has-arrow" id="supplier" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.manage_supplier') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('supplierlist')}}"><span class="mini-sub-pro">{{ __('adminmenu.supplier_list') }}</span></a></li>
                            </ul>
                        </li>
                        @endif

                        <li>
                            <a class="has-arrow" id="supplier" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">ادارة الاطباء</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('doctorlist')}}/10"><span class="mini-sub-pro">قائمة الاطباء</span></a></li>
                                <li><a title="All Courses" href="{{url('prescriptionlist')}}/10"><span class="mini-sub-pro">قائمة الوصفات الطبية</span></a></li>
                                 <li><a title="All Courses" href="{{url('prescriptionbilllist')}}/10"><span class="mini-sub-pro">قائمة فواتير الوصفات الطبية</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" id="store" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_store') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a  href="{{url('productservice')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.product_service') }}</span></a></li>
                                <li><a  href="{{url('storemanage')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_warehouse') }}</span></a></li>
                                <li><a  href="{{url('inventorylist')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_inventory') }}</span></a></li>
                                <li><a  href="{{url('storesetting')}}"><span class="mini-sub-pro">{{ __('adminmenu.store_settings') }}</span></a></li>
                            </ul>
                        </li>
                        @if(!(auth()->user()->id ==4 ||  auth()->user()->id == 5))
                        <li>
                            <a class="has-arrow" id="insurance" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.insurance_company') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('insurancecompanylist')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_company') }}</span></a></li>
                                
                            </ul>
                        </li>
						
						
						<li>
                            <a class="has-arrow" id="employee" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.employee_affairs') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="{{url('manageemployee')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_employee') }}</span></a></li>
                                <li><a  href="{{url('orgstructure')}}"><span class="mini-sub-pro">{{ __('adminmenu.org_structure') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.attendance_departure') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.manage_salary') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.employee_settings') }}</span></a></li>
                            </ul>
                        </li>

                   
                        <li id="removable">
                            <a class="has-arrow" id="finance" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.finance') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a title="Lock" href="{{url('treasurybanklist')}}"><span class="mini-sub-pro">{{ __('adminmenu.bank_account_safe') }}</span></a></li>
                                <li><a title="Password Recovery" href="{{url('dailyentrylist')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.daily_movements') }}</span></a></li>
                                <li><a title="404 Page" href="{{url('accountstree')}}"><span class="mini-sub-pro">{{ __('adminmenu.accounts_tree') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.assets') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.cost_centers') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.general_accounts_settings') }}</span></a></li>
                            </ul>
                        </li>
                       
					   
					   
						
						<li>
                            <a class="has-arrow" id="report" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.reports') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.sales') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.purchase') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.general_account') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.sms') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.salary') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.attendance') }}</span></a></li>
								<li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.custmoer') }}</span></a></li>
								<li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.stock') }}</span></a></li>
								<li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.account_activity_log') }}</span></a></li>
                            </ul>
                        </li>
						
						<li>
                            <a class="has-arrow" id="branch" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.branch') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="{{url('managebranch')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_branch') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.branch_settings') }}</span></a></li>
                            </ul>
                        </li>
						
						<li>
                            <a class="has-arrow" id="setting" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.settings') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.account_info') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.account_settings') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.smtp_settings') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.paid_options') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro"> {{ __('adminmenu.sms_settings') }}</span></a></li>
                                <li><a  href="{{url('taxsetting')}}"><span class="mini-sub-pro"> {{ __('adminmenu.tax_settings') }}</span></a></li>
                            </ul>
                        </li>
						@endif
						
                       <li>
                            <a title="Landing Page" href="{{ route('logout') }}" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();">{{ __('adminmenu.logout') }}</span></a>

                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                        </li>
                        <li><br><br><br></li>
                        
                    </ul>
                </nav>
            </div>

        </nav>

    </div>
    <!-- End Left menu area -->
    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{url('img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-danger navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <!--<ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="#" class="dropdown-item">Documentation</a>
                                                        <a href="#" class="dropdown-item">Expert Backend</a>
                                                        <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                        <a href="#" class="dropdown-item">Contact Support</a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>-->
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li>
                                                <a href="{{url('locale')}}/en" style="color:white;"> EN</a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href="{{url('locale')}}/ar" style="color:white;"> عربي
                                                 <i class="fa fa-globe" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                </li>
                                            <!--
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>-->
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="fa fa-user"></i>&nbsp;
															<span class="admin-name">{{auth()->user()->name}}</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>{{ __('adminmenu.settings') }}</a>
                                                        </li>
                                                        <li><a href="{{ route('logout') }}"><span class="edu-icon edu-locked author-log-ic"></span><span class="mini-click-non"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form2').submit();">{{ __('adminmenu.logout') }}</span></a>


                                    <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

              

                                                        </li>
                                                    </ul>
                                                </li>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------------------ Mobile Menu start -->
            <!--------------------------------------------------------------------->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                     
                                         <li>
                            <a title="Landing Page" href="{{url('dashboard')}}" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">{{ __('adminmenu.dashboard') }}</span></a>
                        </li>
                     
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_sales') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('managebill')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.manage_bill') }}</span></a></li>
                                <li><a  href="{{url('returnbilllist')}}"><span class="mini-sub-pro">{{ __('adminmenu.return_bill') }}</span></a></li>
                                <li><a  href="{{url('pricelist')}}"><span class="mini-sub-pro">{{ __('adminmenu.price_offer') }}</span></a></li>
                                <li><a  href="{{url('pointofsale')}}"><span class="mini-sub-pro">{{ __('adminmenu.sale_point') }}</span></a></li>
                                <li><a  href="{{url('managepointofsale')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_sale_point') }}</span></a></li>
                            </ul>
                        </li>
                  
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_purchase') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('purchasemanagebill')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.manage_bill') }}</span></a></li>
                                <li><a  href="{{url('purchasereturnbill')}}"><span class="mini-sub-pro">{{ __('adminmenu.return_bill') }}</span></a></li>
                                <li><a  href="{{url('purchaserequest')}}"><span class="mini-sub-pro">{{ __('adminmenu.purchase_request') }}</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_customer') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('customerlist')}}"><span class="mini-sub-pro">{{ __('adminmenu.customer_list') }}</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_supplier') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('supplierlist')}}"><span class="mini-sub-pro">{{ __('adminmenu.supplier_list') }}</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.manage_store') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a  href="{{url('productservice')}}"><span class="mini-sub-pro">{{ __('adminmenu.product_service') }}</span></a></li>
                                <li><a  href="{{url('storemanage')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_warehouse') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.manage_inventory') }}</span></a></li>
                                <li><a  href="{{url('storesetting')}}"><span class="mini-sub-pro">{{ __('adminmenu.store_settings') }}</span></a></li>
                            </ul>
                        </li>

                         <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non"> {{ __('adminmenu.insurance_company') }}</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="{{url('insurancecompanylist')}}"><span class="mini-sub-pro"> {{ __('adminmenu.manage_company') }}</span></a></li>
                                
                            </ul>
                        </li>
                        
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.employee_affairs') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="{{url('manageemployee')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_employee') }}</span></a></li>
                                <li><a  href="{{url('orgstructure')}}"><span class="mini-sub-pro">{{ __('adminmenu.org_structure') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.attendance_departure') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.manage_salary') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.employee_settings') }}</span></a></li>
                            </ul>
                        </li>

                   
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.finance') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a title="Lock" href="{{url('treasurybanklist')}}"><span class="mini-sub-pro">{{ __('adminmenu.bank_account_safe') }}</span></a></li>
                                <li><a title="Password Recovery" href="{{url('dailyentrylist')}}/10"><span class="mini-sub-pro">{{ __('adminmenu.daily_movements') }}</span></a></li>
                                <li><a title="404 Page" href="{{url('accountstree')}}"><span class="mini-sub-pro">{{ __('adminmenu.accounts_tree') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.assets') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.cost_centers') }}</span></a></li>
                                <li><a title="500 Page" href="#"><span class="mini-sub-pro">{{ __('adminmenu.general_accounts_settings') }}</span></a></li>
                            </ul>
                        </li>
                       
                       <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.reports') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.sales') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.purchase') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.general_account') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.sms') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.salary') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.attendance') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.custmoer') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.stock') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.account_activity_log') }}</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non"> {{ __('adminmenu.branch') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="{{url('managebranch')}}"><span class="mini-sub-pro">{{ __('adminmenu.manage_branch') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.branch_settings') }}</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span><span class="mini-click-non">{{ __('adminmenu.settings') }}</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.account_info') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.account_settings') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.smtp_settings') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.paid_options') }}</span></a></li>
                                <li><a  href="#"><span class="mini-sub-pro">{{ __('adminmenu.sms_settings') }}</span></a></li>
                                <li><a  href="{{url('taxsetting')}}"><span class="mini-sub-pro">{{ __('adminmenu.tax_settings') }}</span></a></li>
                            </ul>
                        </li>
                        
                       <li>
                            <a title="Landing Page" href="{{ route('logout') }}" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('adminmenu.logout') }}</span></a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
        </div>   
<!------------------------------------------------ Mobile Menu start -->
            <!--------------------------------------------------------------------->

@if (Session::has('success'))
        <div class="alert alert-success text-center" style="margin-bottom: 0px;margin-top:60px;" id="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
      @endif
    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 2000);
    </script>

@yield('content')



        <!-- jquery
        ============================================ -->
    <!--<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>-->

@if(request()->is('managebill') || request()->is('returnbill') || request()->is('pricelist') || request()->is('pointofsale') || request()->is('managepointofsale'))
<script>
$(document).ready(function () {
    $("#sales").click();
	document.getElementById('sales').style.color = 'red';
});
</script>
@elseif(request()->is('purchasemanagebill') || request()->is('purchasereturnbill') || request()->is('purchaserequest') || request()->is('addpurchasebill'))
<script>
$(document).ready(function () {
    $("#purchase").click();
	document.getElementById('purchase').style.color = 'red';
});
</script>
@elseif(request()->is('customerlist') || request()->is('addcustomer'))
<script>
$(document).ready(function () {
    $("#customer").click();
	document.getElementById('customer').style.color = 'red';
});
</script>
@elseif(request()->is('supplierlist') || request()->is('addsupplier'))
<script>
$(document).ready(function () {
    $("#supplier").click();
	document.getElementById('supplier').style.color = 'red';
});
</script>
@elseif(request()->is('productservice') || request()->is('addproduct') || request()->is('addproduct') || request()->is('storemanage') || request()->is('addstore') || request()->is('inventorylist') || request()->is('storesetting') || request()->is('productdefinition'))
<script>
$(document).ready(function () {
    $("#store").click();
	document.getElementById('store').style.color = 'red';
});
</script>
@elseif(request()->is('insurancecompanylist') || request()->is('addinsurancecompany'))
<script>
$(document).ready(function () {
    $("#insurance").click();
	document.getElementById('insurance').style.color = 'red';
});
</script>
@elseif(request()->is('manageemployee') || request()->is('addemployee') || request()->is('orgstructure') || request()->is('addemployee') || request()->is('addemployee'))
<script>
$(document).ready(function () {
    $("#employee").click();
	document.getElementById('employee').style.color = 'red';
});
</script>
@elseif(request()->is('treasurybanklist') || request()->is('dailyentrylist') || request()->is('dailyentry') || request()->is('accountstree'))
<script>
$(document).ready(function () {
    $("#finance").click();
	document.getElementById('finance').style.color = 'red';
});
</script>
@elseif(request()->is('report'))
<script>
$(document).ready(function () {
    $("#report").click();
	document.getElementById('report').style.color = 'red';
});
</script>
@elseif(request()->is('managebranch') || request()->is('addbranch'))
<script>
$(document).ready(function () {
    $("#branch").click();
	document.getElementById('branch').style.color = 'red';
});
</script>
@elseif(request()->is('taxsetting'))
<script>
$(document).ready(function () {
    $("#setting").click();
	document.getElementById('setting').style.color = 'red';
});
</script>
@endif
   
   {{--<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>--}}
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{asset('js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    {{--<script src="{{asset('js/owl.carousel.min.js')}}"></script>--}}
    <!-- sticky JS
        ============================================ -->
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
        ============================================ -->
    {{--<script src="{{asset('js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('js/counterup/counterup-active.js')}}"></script>--}}
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{asset('js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
        ============================================ -->
    {{--<script src="{{asset('js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('js/morrisjs/morris-active.js')}}"></script>--}}
    <!-- morrisjs JS
        ============================================ -->
    {{--<script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('js/sparkline/sparkline-active.js')}}"></script>--}}
    <!-- calendar JS
        ============================================ -->
    {{--<script src="{{asset('js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/calendar/fullcalendar-active.js')}}"></script>--}}
    <!-- plugins JS
        ============================================ -->
    {{--<script src="{{asset('js/plugins.js')}}"></script>--}}
    <!-- main JS
        ============================================ -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!--<script src="js/tawk-chat.js"></script>-->
</body>

</html>
