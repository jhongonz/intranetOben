<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-theme="dark">
	<!--begin::Head-->
	<head><base href="http://intranet.oben.local">
		<title>Oben Group - Administración de intranet</title>
		<meta charset="utf-8" />
        <meta name="csrf-token" content="{!!csrf_token() !!}">
		<meta name="description" content="Herramienta administrativa para la gestión intranet del grupo Oben" />
		<meta name="keywords" content="Oben Group, Oben, Intranet, Gestión, Administración" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="es_ES" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Oben Group - Administración de intranet" />
		<meta property="og:url" content="http://intranet.oben.local" />
		<meta property="og:site_name" content="Intranet | Oben Group" />
		<link rel="canonical" href="http://intranet.oben.local/" />
		<link rel="shortcut icon" href="{{ asset('storage/assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('storage/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('storage/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        @yield('styles')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page bg image-->
			<style>body { background-image: url("{{ asset('storage/assets/media/auth/bg4.jpg') }}"); } [data-theme="dark"] body { background-image: url("{{ asset('storage/assets/media/auth/bg4-dark.jpg') }}"); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->

			@yield('content-login')

			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="storage/assets/plugins/global/plugins.bundle.js"></script>
		<script src="storage/assets/js/scripts.bundle.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @stack('javascript')
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
