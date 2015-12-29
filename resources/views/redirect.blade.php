<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  

<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />




@extends('layouts.plane')

@section('body')
<div id="login-table">

</div>
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

window.onload = function() {
    
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            alert('window closed');
            $.ajax({
         url: '/home/outFromSystem' ,
         type: 'POST',
         data: {  
             
           },
        success: function(result) {
          document.getElementById('login-table').innerHtml=result;
                     console.log(result);
                     alert(result);
                   },
         error: function(jqXHR, textStatus, errorThrown) {
                   console.log(errorThrown);
                   alert(errorThrown);

              }
   });

 };
 </script>

@stop
