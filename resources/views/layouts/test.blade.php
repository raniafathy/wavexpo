 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  

<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />


<script type="text/javascript">
$(document).ready(function(){

    $('a').on('mousedown', stopNavigate);

    $('a').on('mouseleave', function () {
           $(window).on('beforeunload', function(){
      return 'Are you sure you want to leave?';
});

$(window).on('unload', function(){

         logout();

});
    });
});

function stopNavigate(){    
    $(window).off('beforeunload');
}

// window.onload = function() {
    
//             $.ajaxSetup({
//                 headers: {
//                     'X-XSRF-Token': $('meta[name="_token"]').attr('content')
//                 }
//             });

//  };


// setInterval(function(){ 
    
//      $.ajax({
//         url: '/home/outFromSystem' ,
//         type: 'POST',
//         data: {  
             
//             },
//         success: function(result) {
//                     console.log(result);
//                   },
//         error: function(jqXHR, textStatus, errorThrown) {
//                     console.log(errorThrown);
//                }
//     });


// }, 50000);

    
// window.onbeforeunload = function () {

//  alert('jj'); 

//   $.ajax({
//         url: '/home/outFromSystem' ,
//         type: 'POST',
//         data: {  
             
//             },
//         success: function(result) {
//                     console.log(result);
//                   },
//         error: function(jqXHR, textStatus, errorThrown) {
//                     console.log(errorThrown);
//                }


//        // alert('You have gone away!');


//     });
        
   
// }

/////////////////////////////////////////////////////////////////


$(document).ready(function(){

    $('a').on('mousedown', stopNavigate);

    $('a').on('mouseleave', function () {
           $(window).on('beforeunload', function(){
                  return 'Are you sure you want to leave?';
           });
    });
});

function stopNavigate(){    
    $(window).off('beforeunload');
}
And to get the Leave message alert will be,

$(window).on('beforeunload', function(){
      return 'Are you sure you want to leave?';
});

$(window).on('unload', function(){

         logout();

});

</script>

@extends('layouts.plane')

@section('body')

{{Session::put('timer', date("Y-m-d H:i:s"))}}
{{ Session::put('sessiontimer', date("Y-m-d H:i:s"))}}
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
            </div>
            <!-- /.navbar-header -->

            
                
                
                

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
