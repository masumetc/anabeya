<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('public/assets/images/lg.png')}}">
    <title>E-commerce</title>
    <!-- chartist CSS -->
    {{ Html::style('public/assets/node_modules/morrisjs/morris.css') }}
    {{ Html::style('public/assets/icons/font-awesome/css/fontawesome.css') }}

    <!-- Will include css files when needed only -->
        @yield('extra-css')
    <!-- Upload page CSS -->
    {{ Html::style('public/assets/node_modules/dropify/dist/css/dropify.min.css')}}
    <!-- Step from wizard-->
    {{ Html::style('public/assets/node_modules/wizard/steps.css') }}
    <!--alerts CSS -->
    <!-- {{ Html::style('public/assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }} -->
    <!-- This summernote CSS -->
    {{ Html::style('public/assets/node_modules/summernote/dist/summernote-bs4.css')}}
    <!-- tinymce Editor CSS -->
     {{Html::style('public/assets/node_modules/html5-editor/bootstrap-wysihtml5.css')}}
    <!-- chartist CSS -->
    {{Html::style('public/assets/node_modules/chartist-js/dist/chartist.min.css')}}
    {{Html::style('public/assets/node_modules/chartist-js/dist/chartist-init.css')}}
    {{Html::style('public/assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}
    {{Html::style('public/assets/node_modules/css-chart/css-chart.css')}}
    <!-- Tab page css -->
    {{Html::style('public/dist/css/pages/tab-page.css')}}
    <!-- Stylish Tooltip page css -->
    {{Html::style('public/dist/css/pages/stylish-tooltip.css')}}
    <!-- toast CSS -->
   {{Html::style('public/assets/node_modules/toast-master/css/jquery.toast.css')}}
    <!--Progress bar page css -->
    {{Html::style('public/dist/css/pages/progressbar-page.css')}}
    <!-- Timeline CSS -->
    {{Html::style('public/assets/node_modules/horizontal-timeline/css/horizontal-timeline.css')}}
    <!-- Vertical horizental page css -->
    {{Html::style('public/dist/css/pages/timeline-vertical-horizontal.css')}}
    <!-- Bootstrap switch -->
    {{Html::style('public/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css')}}
    <!-- Notification page css -->
    {{Html::style('public/dist/css/pages/other-pages.css')}}
    <!-- Select2 css -->
    <link href="{{URL::to('public/assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{URL::to('public/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('public/assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('public/assets/node_modules/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('public/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{URL::to('public/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{URL::to('public/assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

    <!-- Data table css -->
    {{ Html::style('public/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}
    {{ Html::style('public/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}  
    <!-- E-commerce CSS -->
    {{Html::style('public/dist/css/pages/ecommerce.css')}}
    <!-- Custom CSS -->
    {{Html::style('public/dist/css/style.min.css')}}
    <!-- Custom CSS -->
    {{Html::style('public/dist/css/custom.css')}}
    
    <!-- Jquery-->
    {{Html::script('public/assets/node_modules/jquery/jquery-3.2.1.min.js')}}
  <style>
      .order_name{
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }
  </style> 
</head>
<body class="skin-default fixed-layout">
<!-- <div class="preloader">
<div class="loader">
<div class="loader__figure"></div>
<p class="loader__label">Anabeya</p>
</div>
</div> -->
