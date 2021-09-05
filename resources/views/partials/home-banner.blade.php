<section class="home-banner position-relative d-flex flex-column justify-content-end overflow-hidden px-16 pt-160 pb-20 pb-lg-100 bg-almost-black beveled-bottom" style="background-image: url('@asset('images/home_bg.jpg')')">
{{--  <video class="home-banner__video" width="100%" height="100%" autoplay playsinline loop muted>--}}
{{--    <source src="@asset('video/home.mp4')" type="video/mp4">--}}
{{--  </video>--}}

  <div class="home-banner__text position-relative container-xl d-lg-flex justify-content-lg-between align-items-lg-end">
    <h2 class="home-banner__title d-flex flex-column align-items-start text-white text-uppercase mb-25">
      <span class="bg-light-blue d-inline-block px-12 fadeInUpBig lozad section-line__item-animation" data-animation="fadeInUpBig">AUSTRALIA'S</span>
      <span class="bg-light-blue d-inline-block px-12 text-gun-metal fadeInUpBig lozad section-line__item-animation" data-animation="fadeInUpBig">LEADING</span>
      <span class="bg-light-blue d-inline-block px-12 fadeInUpBig lozad section-line__item-animation" data-animation="fadeInUpBig">RECRUITMENT</span>
      <span class="bg-light-blue d-inline-block px-12 fadeInUpBig lozad section-line__item-animation" data-animation="fadeInUpBig">AGENCY</span>
      <span class="bg-light-blue d-inline-block px-12 fadeInUpBig lozad section-line__item-animation" data-animation="fadeInUpBig">For</span>
    </h2>

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

  </div>
</section>
