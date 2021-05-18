<header class="banner position-relative text-white align-items-center px-16 py-48 pt-menu-switch-28 pb-menu-switch-64">
  <div class="container-xl d-flex flex-wrap justify-content-between">
    <a class="brand logo" href="{{ home_url('/') }}">
      <span class="sr-only">{{ $siteName }}</span>
    </a>

    <nav class="nav-primary d-menu-switch-flex flex-column flex-menu-switch-row">
      <button class="btn-default d-menu-switch-none" id="menu-close" type="button">
        <i class="icon-close" aria-hidden="true"></i>
        <span class="sr-only">Close Menu</span>
      </button>
      <header class="nav-primary__header d-menu-switch-none">
        <a class="nav-primary__logo logo" href="{{ home_url('/') }}">
          <span class="sr-only">{{ $siteName }}</span>
        </a>
      </header>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'nav-menu list-unstyled',
            'container' => false,
            'echo' => false,
            'link_before'     => '<span class="d-inline-block link-line">',
	          'link_after'      => '</span>',
          ]) !!}
        @endif

        @if (has_nav_menu('signin_navigation'))
          {!! wp_nav_menu([
          'theme_location' => 'signin_navigation',
          'menu_class' => 'nav-menu signin-menu list-unstyled',
          'container' => false,
          'echo' => false,
          'link_before'     => '<span class="d-inline-block link-line">',
	        'link_after'      => '</span>',
          ]) !!}
        @endif

        @include('partials.social-menu')

        <p class="nav-primary__copy d-menu-switch-none">
          &copy; {{ date('Y') }} All rights reserved. <a class="text-decoration-none" href="{!! home_url('/') !!}">{!! get_bloginfo('name') !!} {!! get_bloginfo('description') !!} </a>
        </p>
    </nav>
    <button id="menu-open" class="btn-default btn-menu-toggler lh-sm ps-16 py-5 d-menu-switch-none">
      <span class="sr-only">
        {{ __('Menu', 'alra') }}
      </span>
      @svg('images.icons.menu')
    </button>
  </div>
</header>
