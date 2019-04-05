 @include('partials.head')

 <body>

	@include('partials.header')

	@yield('content')

	@include('partials.footer')

	@include('partials.footer-scripts')
	@yield('script')
	

 </body>

</html>