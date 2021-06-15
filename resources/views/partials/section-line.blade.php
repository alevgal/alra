<section class="{{ $classes }}">
  <div class="container-xl">
    <div class="row justify-content-lg-center align-items-lg-center align-content-lg-stretch">
      <div class="section-line__first col-12 col-lg-auto pe-lg-40 position-relative">
        @if( 'list-reverse' === $contentType )
          <h2 class="section-line__title text-center text-lg-end mb-32">{{ $title }}</h2>
        @else
        {!! $content !!}
        @endif
      </div>
      <div class="section-line__last col-12 col-lg-auto pt-20 py-lg-48 ps-lg-40">
        @if( 'list-reverse' === $contentType )
          {!! $content !!}
        @else
          <h2 class="section-line__title text-center text-lg-start m-0">{{ $title }}</h2>
        @endif
      </div>
    </div>
  </div>

</section>
