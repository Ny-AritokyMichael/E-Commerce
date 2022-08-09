<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href=" {{ asset('apple-touch-icon.png') }} " rel="apple-touch-icon">
    <link href=" {{ asset('favicon.png') }} " rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts-->
    {{-- <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('plugins/ps-icon/style.css') }} ">
    <!-- CSS Library-->
    {{-- <link rel="stylesheet" href=" {{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }} "> --}}
    <link rel="stylesheet" href=" {{ asset('plugins/owl-carousel/assets/owl.carousel.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/slick/slick/slick.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/Magnific-Popup/dist/magnific-popup.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/jquery-ui/jquery-ui.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/revolution/css/settings.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/revolution/css/layers.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/revolution/css/navigation.css') }} ">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}

    <!-- Custom-->
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }} ">
    @livewireStyles
  </head>
  <body class="ps-loading">
    <div class="header--sidebar"></div>

    <header class="header">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <!-- Navbar content --><x-header/>
    </nav>
    </header>

    <main class="ps-main">
      <div class="ps-banner">
        <div class="rev_slider fullscreenbanner" id="home-banner">
          <ul>
            <li class="ps-banner" data-index="rs-2972" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="images/slider/3.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
              <div class="tp-caption ps-banner__header" id="layer-1" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p>March 2002 <br> Nike SB Dunk Low Pro</p>
              </div>
              <div class="tp-caption ps-banner__title" id="layer21" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p class="text-uppercase">SUBA</p>
              </div>
              <div class="tp-caption ps-banner__description" id="layer211" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p>Supa wanted something that was going to rep his East Coast <br> roots and, more specifically, his hometown of <br/> New York City in  a big way.</p>
              </div><a class="tp-caption ps-btn" id="layer31" href="#" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['120','140','200','200']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">Purchase Now<i class="ps-icon-next"></i></a>
            </li>
            <li class="ps-banner ps-banner--white" data-index="rs-100" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="images/slider/2.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
              <div class="tp-caption ps-banner__header" id="layer20" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p>BEST ITEM <br> THIS SUMMER</p>
              </div>
              <div class="tp-caption ps-banner__title" id="layer339" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p class="text-uppercase">Recovery</p>
              </div>
              <div class="tp-caption ps-banner__description" id="layer2-14" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                <p>Supa wanted something that was going to rep his East Coast <br> roots and, more specifically, his hometown of <br/> New York City in  a big way.</p>
              </div><a class="tp-caption ps-btn" id="layer364" href="#" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['120','140','200','200']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">Purchase Now<i class="ps-icon-next"></i></a>
            </li>
          </ul>
        </div>
      </div>
      {{ $content }}

      <div class="ps-footer bg--cover" >


      </div>
    </main>
    <!-- JS Library-->
    <script type="text/javascript" src=" {{ asset('plugins/jquery/dist/jquery.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/owl-carousel/owl.carousel.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/gmap3.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/imagesloaded.pkgd.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/isotope.pkgd.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/jquery.matchHeight-min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/slick/slick/slick.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('plugins/jquery-ui/jquery-ui.min.js') }} "></script>
    {{-- <script type="text/javascript" src=" {{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB') }} "></script> --}}
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }} "></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src=" {{ asset('js/main.js') }} "></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src=" {{ asset('js/canvasjs.min.js') }}"></script>
    @livewireScripts
  </body>
</html>
