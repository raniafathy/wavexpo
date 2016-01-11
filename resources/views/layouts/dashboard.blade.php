 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

 



<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />


<script type="text/javascript">



</script>


<div id="login-view"> </div>
<div id="login-screen" hidden>


<form id="login-form"class="form-horizontal" role="form" method="POST" action="/auth/login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ old('email') }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                 <div>
                     <label>
                                    <a href="/password/email">Forgot Your Password?</a>
                     </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                <h5>
                                    Please Register From Here!
                                    <a class=" btn btn-primary" href="/register">Register</a>
                                </h5>

                            </fieldset>
                        </form>
            </div>

@extends('layouts.plane')

@section('body')

{{Session::put('timer', date("Y-m-d H:i:s"))}}
{{ Session::put('sessiontimer', date("Y-m-d H:i:s"))}}



@if(Auth::User()->confirmed==0 && Auth::User()->type=='regular')

<h2>
    
Please, Check your Email And Verfiy It First

</h2>

@elseif(Auth::User()->confirmed==0 && Auth::User()->type=='company')

<h2>
    
Please, Check your Email And Verfiy It First

</h2>
@endif
<div id="wrapper">



        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/') }}">Wave XPO</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'success', 'value'=>'40'))
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                   
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'info', 'value'=>'20'))
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true, 'class'=>'warning', 'value'=>'60'))
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    
                                        <div>
                                        @include('widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/users/{{ Auth::User()->id }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="/users/{{Auth::User()->id}}/edit"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <li> <a href="/users/{{ Auth::User()->id }}"> Welcome {{Auth::User()->name}}</a></li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                         
                        </li>
@if(Auth::User()->type=='admin'||Auth::User()->type=='regular'||Auth::User()->type=='company')
                       
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>UserProfileInfo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                    <li {{ (Request::is('*users') ? 'class="active"' : '') }}>
                                        <a href="/users/{{ Auth::User()->id }}"><i class="fa fa-dashboard fa-fw"></i> Basic Info</a>
                                    </li>

                                    <li {{ (Request::is('*generalinfos') ? 'class="active"' : '') }}>
                                        <a href="/generalinfos/{{ Auth::User()->id }}"><i class="fa fa-dashboard fa-fw"></i> General Info</a>
                                    </li>

                                     <li {{ (Request::is('*professionalinfos') ? 'class="active"' : '') }}>
                                        <a href="/professionalinfos/{{ Auth::User()->id }}"><i class="fa fa-dashboard fa-fw"></i> Professional Info</a>
                                    </li>                          
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
@endif

<!-- @if(Auth::User()->type=='company')

                        <li {{ (Request::is('*showprofile') ? 'class="active"' : '') }}>
                            <a href="/companies/showprofile/{{ Auth::User()->id }}"><i class="fa fa-dashboard fa-fw"></i> Profile Info</a>
                        </li>

                         <li {{ (Request::is('*showprofile') ? 'class="active"' : '') }}>
                            <a href="/companies/showexhibitorsofcompanybyuserid/{{ Auth::User()->id }}"><i class="fa fa-dashboard fa-fw"></i> Show {{Auth::User()->name}}'s Exhibitors </a>
                        </li>

                        <li {{ (Request::is('*create') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/exhibitors/createexhibitorbyadmin' ) }}"><i class="fa fa-edit fa-fw"> </i> Add New Exhibitor</a>
                        </li>


@endif -->

@if(Auth::User()->type=='admin')  


                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>General Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                     <li {{ (Request::is('*spots') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/spots/') }}">Spots</a>
                                    </li>

                                    <li>
                                    <a href="#">    COMPONENTS <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                         <li>
                                            <a href="{{ url ('/halls/') }}">HALLs  </a>
                                            
                                          <li>
                                          <li>
                                            <a href="{{ url ('/modeldesigns/') }}">MODEL DESIGNs  </a>
                                                
                                          <li>
                                          <li>
                                            <a href="{{ url ('/types/') }}">MATERIALS </a>
                                            
                                          <li>
                                                
                                        </ul>    
                                    <!-- /.nav-third-level -->
                                </li>

                                     <li>
                                    <a href="{{ url ('/industries/') }}">INDUSTRY </a>
                                    
                                    <!-- /.nav-third-level -->
                                </li>                         
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                         
                    
                       
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> User Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*users') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/') }}">List All Users</a>
                                </li>
                            
                                <li {{ (Request::is('*regular') ? 'class="active"' : '') }}>
                                    <a href="{{ url('/users/listregular') }}">List All Visitors</a>
                                </li>
                                <li {{ (Request::is('*admin') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/users/listadmin') }}">List All Admins</a>
                                </li>
                                 <li >
                                    <a href="{{ url ('/activities/') }}"> ACTIVIES</a>
                                    
                            <!-- /.nav-second-level -->
                                 </li>
                                 <li >
                                    <a href="{{ url ('/interests/') }}"> INTERESTS</a>
                            
                            <!-- /.nav-second-level -->
                                 </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                           <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Exhibition Settings <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*exhibitions') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/exhibitions/') }}"> Exhibitions </a>
                                </li>
                                
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Exhibitor Settings <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*companies') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/companies/') }}">COMPANIES </a>
                                </li>
                                   
                                <li {{ (Request::is('*exhibitors') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/exhibitors/') }}">EXHIBITORS</a>
                                </li>
                                    
                            <!-- /.nav-second-level -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Exhibition Events Settings <span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">
                                <li >
                                    <a href="{{ url ('/exhibitionevents/') }}">EXHIBITION EVENTS </a>
                                    
                                </li>

                                <li>
                                    <a href="{{ url ('/booths/') }}">BOOTH</a>
                            
                                    <!-- /.nav-second-level -->
                                </li>
                        </ul>
                        </li>
            
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>EVENT Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*events') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/events/') }}">List All Event </a>
                                </li>
                                                          
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Facilities Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*rooms') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/rooms/') }}">ROOMs</a>
                                </li>                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Reports <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*loginhistoryforall') ? 'class="active"' : '') }}>
                                    <a href="/users/loginhistoryforall">Login Track Report</a>
                                </li>
                                <li {{ (Request::is('*alluserhistory') ? 'class="active"' : '') }}>
                                    <a href="/systemtracks/alluserhistory">Users Track Report</a>
                                </li>
                                 <li {{ (Request::is('*event') ? 'class="active"' : '') }}>
                                    <a href="/systemtracks/exhibitionevent">Events Track Report</a>
                                </li>
                                 <li {{ (Request::is('*booth') ? 'class="active"' : '') }}>
                                    <a href="/systemtracks/booth">Booths Track Report</a>
                                </li>
                                <li {{ (Request::is('*eventsreport') ? 'class="active"' : '') }}>
                                    <a href="/exhibitionevents/eventsreport">Exhibition Events Report</a>
                                </li>
                                <li {{ (Request::is('*boothsreport') ? 'class="active"' : '') }}>
                                    <a href="/booths/boothsreport">Booth Report</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <!--  <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                        </li> -->
@endif                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
            <div class="row">  
                @yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>



@stop
