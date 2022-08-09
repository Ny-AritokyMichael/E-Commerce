<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin@E.commerce</title>
        <link type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link type="text/css" href="{{ asset('css/theme.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('images/icons/css/font-awesome.css') }}" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>

<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Ny-Ari Admin </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                        <li><a href="#"><i class="icon-eye-open"></i></a></li>
                        <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                    </ul>
                    <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Item No. 1</a></li>
                                <li><a href="#">Don't Click</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Example Header</li>
                                <li><a href="#">A Separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Support </a></li>
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('/storage/images/profil.jpg') }}" alt=""
                                    class="nav-avatar">

                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="{{ route('inserer-recette') }}"><i class="menu-icon icon-table"></i>Insert repices
                            </a></li>
                            <li class="active"><a href="{{ route('list') }}"><i class="menu-icon icon-table"></i>List of products
                            </a></li>
                            <li><a href="{{ route('admin.payement') }}"><i class="menu-icon icon-bullhorn"></i>Payement </a>

                                <li><a href="{{ route('validation-recharge') }}"><i class="menu-icon icon-bullhorn"></i>Validation de solde</a>
                            </li>

                            <li><a href="{{ route('stock') }}"><i class="menu-icon icon-bullhorn"></i>Gestion de stocks</a>
                            </li>

                            <li><a href="{{ route('stat-vente-produit') }}"><i class="menu-icon icon-inbox"></i>Statistic products <b class="label red pull-right">
                                8</b> </a></li>


                            <li><a href="{{ route('stat-vente-recette') }}"><i class="menu-icon icon-inbox"></i>Statistic repice<b class="label green pull-right">
                                2</b> </a></li>
                            <li><a href="{{ route('admin.topPorduit') }}"><i class="menu-icon icon-tasks"></i>Top 5 des ventes produits<b class="label orange pull-right">
                                5</b> </a></li>
                        </ul>
                        <!--/.widget-nav-->


                        {{-- <ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                            </ul> --}}
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            {{-- <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li> --}}
                            <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <script type="text/javascript" src=" {{ asset('plugins/jquery/dist/jquery.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }} ">
                </script>
                <script type="text/javascript" src=" {{ asset('plugins/owl-carousel/owl.carousel.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/gmap3.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/imagesloaded.pkgd.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/isotope.pkgd.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }} ">
                </script>
                <script type="text/javascript" src=" {{ asset('plugins/jquery.matchHeight-min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/slick/slick/slick.min.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }} "></script>
                <script type="text/javascript" src=" {{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }} ">
                </script>
                <script type="text/javascript" src=" {{ asset('plugins/jquery-ui/jquery-ui.min.js') }} "></script>
                {{-- <script type="text/javascript" src=" {{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB') }} "></script> --}}
                <script type="text/javascript" src=" {{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }} ">
                </script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }} "></script>
                <script type="text/javascript"
                    src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }} "></script>
                <!-- Custom scripts-->
                <script type="text/javascript" src=" {{ asset('js/main.js') }} "></script>
                <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
                <script src=" {{ asset('js/canvasjs.min.js') }}"></script>



                <script>
                    var chart = null;
                    var dataPoints = [];

                    window.onload = function() {
                        chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2",
                            title: {
                                text: "Statistique de vente des produits",
                            },
                            axisY: {
                                title: "Quantite vendu",
                                titleFontSize: 24,
                            },
                            data: [{
                                type: "column",
                                dataPoints: dataPoints,
                            }, ],
                        });

                        /*$.getJSON(
                          "https://canvasjs.com/data/gallery/javascript/daily-sales.json?callback=?",
                          callback
                        ); */
                        var data = <?php echo json_encode($data); ?>;
                        for (var i = 0; i < data.length; i++) {
                            dataPoints.push({
                                label: data[i].nom,
                                y: data[i].total,
                            });
                        }

                        chart.render();
                    };

                    function callback(data) {
                        for (var i = 0; i < data.dps.length; i++) {
                            dataPoints.push({
                                x: new Date(data.dps[i].date),
                                y: data.dps[i].units,
                            });
                        }
                        chart.render();
                    }
                </script>
                <main class="ps-main">
                    <div class="ps-content pt-80 pb-80">
                        <div class="ps-container">
                            <div class="row">
                                <div class="col-12 text-center" style="margin-bottom: 5vh;">
                                    <div id="chartContainer"
                                        style="height: 370px; max-width: 920px; margin: 0px auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                </main>

                <div class="footer">
                    <div class="container">
                        <b class="copyright">&copy; 2022 Admin - @nyari.com</b> represented 317.
                    </div>
                </div>
</body>
