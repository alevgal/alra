<section class="home-bottom beveled-top d-flex flex-column justify-content-end justify-content-lg-center py-80 px-16 mb-n10 mb-lg-n40">
  <div class="container-xl">
    <div class="row align-items-lg-end">
      <h2 class="home-bottom__title text-white mb-32 mb-lg-0 col-lg-6">
        Discover the <br>
        ALRA Difference.
      </h2>
      <nav class="home-bottom__nav mb-0 col-lg-6">
        @if (has_nav_menu('bottom_banner_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'bottom_banner_navigation',
            'menu_class' => 'home-banner__list list-unstyled d-flex flex-nowrap mb-0',
            'container' => false,
            'echo' => false,
            'link_before'     => '<span class="d-inline-block link-line">',
            'link_after'      => '</span>',
          ]) !!}
        @endif
      </nav>
    </div>
  </div>
</section>
