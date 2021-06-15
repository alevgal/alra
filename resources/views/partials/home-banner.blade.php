<section class="home-banner position-relative d-flex flex-column justify-content-end overflow-hidden px-16 pt-160 pb-20 pb-lg-100 bg-almost-black beveled-bottom">
  <video class="home-banner__video" width="100%" height="100%" autoplay muted>
    <source src="@asset('video/home.mp4')" type="video/mp4">
  </video>

  <div class="home-banner__text position-relative container-xl d-lg-flex justify-content-lg-between align-items-lg-end">

    <nav class="home-banner__nav mb-32 mb-lg-25">
      @if (has_nav_menu('top_banner_navigation'))
        {!! wp_nav_menu([
          'theme_location' => 'top_banner_navigation',
          'menu_class' => 'home-banner__list list-unstyled d-flex flex-nowrap mb-lg-0',
          'container' => false,
          'echo' => false,
          'link_before'     => '<span class="d-inline-block link-line">',
          'link_after'      => '</span>',
        ]) !!}
      @endif
    </nav>

    <h2 class="home-banner__title text-white text-uppercase mb-25">
      AUSTRALIA'S <span class="text-light-blue">LEADING</span> RECRUITMENT AGENCY
    </h2>
  </div>
</section>
