<header class="banner">
  <div class="container flex-it f-row f-align-center f-just-between">
    <a class="brand" href="{{ home_url('/') }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="xMinYMin" viewBox="0 0 52 52" aria-label="Lekker Boats logo" role="img" class="flex-shrink-0 w-10 mx-8 md:w-12" data-v-5d44bbff=""><path stroke="#1D1D1B" stroke-width="2.526" d="M47.319 34.875l2.634-30.608L35.67 17.515 26.065 3.134l-9.322 14.381L2.105 4.268l2.71 30.21c.549 5.664 9.311 15.282 21.25 15.282s20.705-9.225 21.253-14.884"></path><path fill="#1D1D1B" d="M30.306 38.664L24.3 45.193l-2.071-2.252 6.001-6.525 2.076 2.248z"></path><path fill="#1D1D1B" d="M30.306 42.941l-2.068 2.252-6.006-6.529 2.072-2.252 6.002 6.53zm0-14.259L24.3 35.21l-2.071-2.256 6.001-6.525 2.076 2.252z"></path><path fill="#1D1D1B" d="M30.306 32.955l-2.068 2.252-6.006-6.529 2.072-2.248 6.002 6.525zm0-14.4L24.3 25.084l-2.071-2.252 6.001-6.526 2.076 2.249z"></path><path fill="#1D1D1B" d="M30.306 22.832l-2.068 2.252-6.006-6.53 2.072-2.251 6.002 6.529z"></path></svg>
    </a>
    <nav class="nav-primary flex-it f-col f-just-start f-align-start">
      <div class="mob-menu-head flex-it f-row f-just-between f-align-center">
        @hasoption('header_button')
          <a href="@option('header_button', 'url')" class="btn--round btn--white-round closeMenu">@option('header_button', 'title')</a>
        @endoption
        <span class="closeMenu"><img src="@asset('images/close.svg')" alt=""></span>
      </div>
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif

      <div class="mob-menu-foot flex-it f-row f-just-center f-align-center">
        @hasoption('header_button')
          <a href="@option('header_button', 'url')" class="btn--round btn--white-round closeMenu">@option('header_button', 'title')</a>
        @endoption
      </div>
    </nav>

    <div class="nav-left flex-it f-row f-just-end f-align-center">
      @hasoption('header_button')
        <a href="@option('header_button', 'url')" class="btn--round btn--white-round">@option('header_button', 'title')</a>
      @endoption
        <div class="lang__toggle">
          <?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
        </div>

        <div class="menu__toggle">
          <img src="@asset('images/menu.svg')" alt="">
        </div>
    </div>
  </div>
</header>
