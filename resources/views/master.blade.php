<!doctype html>
<html class="no-js" lang="sl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Blaž Žerko || b-zerko.com">
      <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Iskra Sistemi | Dobrodošli</title>
    {{ HTML::style('/css/foundation.css') }}
    {{ HTML::style('/css/foundation-icons.css') }}
    {{ HTML::style('/css/layout.css') }}
    {{ HTML::style('/slick/slick.css') }}
    {{ HTML::style('/css/jquery.fileupload.css') }}
    {{ HTML::style('/css/iskra.custom.css') }}
    {{ HTML::script('/js/vendor/modernizr.js') }}
    {{ HTML::script('/js/vendor/jquery.js') }}
    {{ HTML::script('/js/vendor/jquery.ui.widget.js') }}
    {{ HTML::script('/js/vendor/jquery-ui.min.js') }}
    {{ HTML::script('/js/foundation.min.js') }}
    {{ HTML::script('/slick/slick.min.js')}}
    {{ HTML::script('/ckeditor/ckeditor.js') }}
    {{ HTML::script('/ckeditor/adapters/jquery.js') }}
    {{ HTML::script('/js/load-image.all.min.js') }}
    {{ HTML::script('/js/canvas-to-blob.min.js') }}
    {{ HTML::script('/js/jquery.knob.js') }}
    {{ HTML::script('/js/jquery.iframe-transport.js') }}
    {{ HTML::script('/js/jquery.fileupload.js') }}
    {{ HTML::script('/js/jquery.fileupload-process.js') }}
    {{ HTML::script('/js/jquery.fileupload-image.js') }}
    {{ HTML::script('/js/jquery.fileupload-audio.js') }}
    {{ HTML::script('/js/jquery.fileupload-video.js') }}
    {{ HTML::script('/js/jquery.fileupload-validate.js') }}

    {{ HTML::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyAcGmw4pGsY0YicHaFQJtjb0HKeh0LsxiU') }}

      <script language="JavaScript">
          $(document).ready(function() {
              $('a#modalLink').click( function(e) {
                  e.preventDefault();
                  var $this = $(this),
                          id = $this.data('id'),
                          bid = $this.data('bid');
                  $('#Modal').foundation('reveal','open');
                  $('#Modal').load(bid);
              });
          });




      </script>
  </head>
  <body>

    <div id="header-container" class="row">
      <div id="logo" class="large-3 columns">
        <img src="/img/Iskra-Sistemi-logotip.png">
      </div>
      <div id="slick-container" class="large-9 columns hide-for-medium">
        <div id="slick" class="slick">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns" data-magellan-expedition="fixed" id="stickyNav">
        <nav class="top-bar" data-topbar>
          <section class="top-bar-section">
           <ul class="title-area">
            <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
          </ul>

          </section>
        </nav>
      </div>
    </div>

    @yield('content')

    <div id="footer-container" class="row">
      <div class="large-12 text-center columns">
        <h6>© <script>document.write(new Date().getFullYear())</script> Iskra Sistemi</h6>
      </div>
        <div class="large-3 columns right versionContainer">{{ Config::get('app.version'); }}</div>
    </div>

    @if (!Auth::check())
        <div id="login" class="reveal-modal medium" data-reveal>
            <form method="post" action="/login">
                <h2>Prijava za uporabnike</h2>
                <p class="lead">Za prijavo vpišite vašo šifro in geslo</p>
                <input type="text" placeholder="Šifra partnerja" name="partnerCode" id="partnerCode">
                <input type="password" placeholder="Geslo" name="password" id="username">
                <div style="text-align: center;"><input class="button [secondary success aler]" type="submit" value="Potrditev"></div>
                <a class="close-reveal-modal">&#215;</a>
                <p>Za prijavo uporabi: 0000/test ali 1234567890/test</p>

            </form>
        </div>
    @endif

    @if (Auth::user() && (Auth::user()->level)>=20)
        <div id="Modal" class="reveal-modal medium" data-reveal>

        </div>
    @endif

    <script>
        $(document).foundation();
    </script>
  </body>
</html>
