<!DOCTYPE html>
<html>
    @section('head')
    @include('layouts.layout_homepage.head')
    @show
    <body data-spy="scroll" data-target="#navbar-example">
        <div id="preloader"></div>

        @yield('content')

        @include('layouts.layout_homepage.review')

        @include('layouts.layout_homepage.contact')

        @include('layouts.layout_homepage.footer')

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        @section('script')
        @include('layouts.layout_homepage.script')
        @show

    </body>
</html>