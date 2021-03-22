<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="HandheldFriendly" content="true"/>
	<title>@yield('title') LPRM Sulteng</title>
	<link rel="stylesheet" type="text/css"
	href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="icon" type="image/png" sizes="60x60" href="{{asset('public/images/logo/logo.svg')}}">
	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/admin/dist/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?=url('/')?>/public/template/mobile/css/kitapura.css">
	<style type="text/css">
		body {
			font-family: 'Roboto', sans-serif;
		}
	</style>
	@yield('header-scripts')

</head>

<body style="background: white; min-height: 100%;" class="hold-transition sidebar-mini layout-fixed">
	@yield("content")
</body>    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@yield('footer-scripts')

</html>
