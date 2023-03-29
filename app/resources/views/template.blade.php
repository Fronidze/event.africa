<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="/css/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet">
    <link href="/css/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        @include('menu')
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Главный раздел</h2>
{{--                <ol class="breadcrumb">--}}
{{--                    <li class="breadcrumb-item">--}}
{{--                        <a href="index.html">Home</a>--}}
{{--                    </li>--}}
{{--                    <li class="breadcrumb-item active">--}}
{{--                        <strong>Layouts</strong>--}}
{{--                    </li>--}}
{{--                </ol>--}}
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            @yield('content')
        </div>

{{--        <div class="footer"></div>--}}

    </div>

    <div data-ajax-modal class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div data-ajax-modal-title class="modal-header"></div>
                <div data-ajax-modal-content class="modal-content"></div>
            </div>
        </div>
    </div>

</div>

<!-- Mainly scripts -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/select2/select2.full.min.js"></script>
<script src="/js/plugins/dropzone/dropzone.min.js"></script>
<script src="/js/plugins/switchery/switchery.js"></script>
<script src="/js/plugins/jqueryMask/jquery.mask.js"></script>
<script src="/js/plugins/chartJs/Chart.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/inspinia.js"></script>
<script src="/js/common.js"></script>

</body>
</html>

