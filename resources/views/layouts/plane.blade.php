<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Wave XPO</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
  
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />


</head>
<body onmousemove="logTest()">


	@yield('body')
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>  
</body>
<script>

function logTest(){
	 
						$.ajaxSetup({
                                 headers: {
                                     'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                                 }
                             });


                        $.ajax({

                            url: '/home/sessionTime' ,
                             type: 'POST',
                             data: {  
                            },
                        success: function(result) {
                           // alert(result);
                             

                            console.log(result);

                        },

                        error: function(jqXHR, textStatus, errorThrown) {

                            console.log(errorThrown);

                         //   alert(errorThrown);

                              }
                    });

}
</script>
</html>
