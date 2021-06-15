<footer class="content-info beveled-top text-white px-16">
  <div class="container-xl">
    <div class="text-center">
      <img src="@asset('images/logo-full.png')" class="content-info__logo img-fluid mb-100" alt="">
    </div>
    @if (has_nav_menu('footer_navigation'))
      {!! wp_nav_menu([
      'theme_location' => 'footer_navigation',
      'menu_class' => 'content-info__nav d-flex justify-content-center flex-wrap list-unstyled mb-48 mb-lg-28',
      'container' => false,
      'echo' => false])
      !!}
    @endif

    @include('partials.social-menu')

    <p class="copy text-center text-white opacity-40 fs-7 fw-medium mb-0">
      &copy; {{ date('Y') }} All rights reserved. <a class="text-white text-decoration-none" href="{!! home_url('/') !!}">{!! get_bloginfo('name') !!} {!! get_bloginfo('description') !!} </a>
    </p>
  </div>
</footer>
