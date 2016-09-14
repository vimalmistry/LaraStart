
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Top Navigation</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/adminlte/alertExtra.css">

    <style>
        .auth {
            margin-top: 15px;
        }

        .rc-anchor-center-container
        {
            text-align: center;
        }

        .help-block
        {
            color: #dd4b39;
        }

        .content-wrapperxx
        {




/*Better*/
            background: #4ECDC4; /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #4ECDC4 , #556270); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #4ECDC4 , #556270); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */



            /*background: #348F50; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #348F50 , #56B4D3); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #348F50 , #56B4D3); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/



            /*background: #83a4d4; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #83a4d4 , #b6fbff); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #83a4d4 , #b6fbff); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/



            /*background: #00bf8f; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #00bf8f , #001510); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #00bf8f , #001510); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/



            /*background: #8e9eab; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #8e9eab , #eef2f3); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #8e9eab , #eef2f3); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/



            /*Perfact*/
            /*background: #F1F2B5; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #F1F2B5 , #135058); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #F1F2B5 , #135058); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/


/*Good*/
            /*background: #c2e59c; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #c2e59c , #64b3f4); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #c2e59c , #64b3f4); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/



            /*background: #2980b9; !* fallback for old browsers *!*/
            /*background: -webkit-linear-gradient(to left, #2980b9 , #2c3e50); !* Chrome 10-25, Safari 5.1-6 *!*/
            /*background: linear-gradient(to left, #2980b9 , #2c3e50); !* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ *!*/

        }

    </style>

    @yield('ExtraHeader')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <!-- Full Width Column -->
    <div class="content-wrapper">


        <div class="container">

            @if (session()->has('flash_notification.message'))
                <div class="notice notice-{{ session('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="notice" aria-hidden="true">&times;</button>

                    {!! session('flash_notification.message') !!}
                </div>
                @endif



                        <!-- Content Header (Page header) -->
            {{--<section class="content-header">--}}
                {{--<h1>--}}
                    {{--Top Navigation--}}
                    {{--<small>Example 2.0</small>--}}
                {{--</h1>--}}
                {{--<ol class="breadcrumb">--}}
                    {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                    {{--<li><a href="#">Layout</a></li>--}}
                    {{--<li class="active">Top Navigation</li>--}}
                {{--</ol>--}}
            {{--</section>--}}

            <!-- Main content -->
            <section class="content">

                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    {{--<footer class="main-footer">--}}
        {{--<div class="container">--}}
            {{--<div class="pull-right hidden-xs">--}}
                {{--<b>Version</b> 2.3.5--}}
            {{--</div>--}}
            {{--<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights--}}
            {{--reserved.--}}
        {{--</div>--}}
        {{--<!-- /.container -->--}}
    {{--</footer>--}}
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
{{--Vimal--}}
<script src="/adminlte/libs/validator.min.js"></script>

<script src="/adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>

@yield('ExtraFooter')
</body>
</html>
