<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="My Blue Finder - Online Booking HTML Template">
	<meta name="description" content="My Blue Finder - Online Booking HTML Template">
	<meta name="author" content="themeenergy.com">

	<title>My Blue Finder - Home</title>

  <script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="inc/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="inc/js/jquery.slimmenu.min.js"></script>
	<script type="text/javascript" src="inc/js/lightslider.min.js"></script>
	<script type="text/javascript" src="inc/js/scripts.js"></script>

	<link rel="stylesheet" href="inc/css/style.css" />
	<link rel="stylesheet" href="inc/css/theme-custom.css" id="template-color" />
	<link rel="stylesheet" href="inc/css/lightslider.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto+Slab:400,700&subset=latin,latin-ext,greek-ext,greek,cyrillic,vietnamese,cyrillic-ext">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="shortcut icon" href="inc/images/favicon.ico" />

	 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!--- loading animation -->
	<div class="loading">
		<div class="ball"></div>
		<div class="ball1"></div>
	</div>
	<!--- //loading animation -->

	{% include 'inc/header.inc' %}

	{% block content '' %}

  {% include 'inc/footer.inc' %}

	<script type="text/javascript">
		(function( $ ) {
			$(document).ready(function(){
        /*
				$('.form').hide();
				$('#form1').show();
        */
				$('.f-item:nth-child(1)').addClass('active');
				$('.f-item:nth-child(1) span').addClass('checked');

				$('#hero-gallery').lightSlider({
					gallery:true,
					item:1,
					pager:false,
					gallery:false,
					slideMargin: 0,
					speed:2000,
					pause:6000,
					mode: 'fade',
					auto:true,
					loop:true,
					onSliderLoad: function() {
						$('#hero-gallery').removeClass('cS-hidden');
					}
				});
			});
		})(jQuery);
	</script>
</body>
</html>
