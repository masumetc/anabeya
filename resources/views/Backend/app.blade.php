@include('Backend._partials.top')
<div id="main-wrapper">
    @include('Backend._partials.header')
    @include('Backend._partials.sidebar')
    @yield('content-header')
    @include('Backend.common.message')
    <!-- Main content -->
     @yield('main-content')
    <!-- /.content -->
    @include('Backend.common.modal')
    @include('Backend._partials.footer')
</div>    
    @yield('script')
    @include('Backend._partials.bottom')