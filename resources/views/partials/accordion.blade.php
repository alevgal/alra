<section class="recruiters-accordion with-map with-map-right text-white beveled-top-bottom bg-gun-metal px-16 pt-80 pb-28 pt-lg-160 pb-lg-100">
  <div class="container">
    @if($title)
      <h2 class="recruiters-accordion-title text-center">
        {{ $title }}
      </h2>
    @endif
    <div class="accordion row">
      @fields($id)
        <div class="accordion-box col-md-4">
          @hassub('title')
            <h3 class="accordion-box__title">
              <a class="text-white text-decoration-none icon-down-open-big collapsed" data-bs-toggle="collapse" href="#accContent-{{ $id . get_row_index() }}" role="button" aria-expanded="false" aria-controls="#accContent-{{ $id . get_row_index() }}">
                @sub('title')
              </a>
            </h3>
          @endsub

          @hassub('sub_title')
            <p class="accordion-box__subtitle">
              @sub('sub_title')
            </p>
          @endsub
          @hassub('content')
            <div id="accContent-{{ $id . get_row_index() }}" class="accordion-box__content collapse">
              @sub('content')
            </div>
          @endsub
        </div>
      @endfields
    </div>
  </div>
</section>
