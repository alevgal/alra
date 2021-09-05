<article class="sector-single container-xl pt-20 pt-lg-32 px-28 pb-lg-100">
  <div class="row">
    <div class="col-12 pt-lg-5 pb-lg-10 mb-48 mb-lg-100">
      <a href="/sectors" class="text-battleship-grey text-decoration-none fs-7">
        <i class="icon-left text-gun-metal me-10"></i>All Sectors
      </a>
    </div>

    <div class="col-12 col-lg-6 d-flex flex-row flex-wrap pe-lg-56 mb-40 mb-lg-100">
      <figure class="sector-single-photo mb-32 mb-lg-20">
          @if(has_post_thumbnail())
            {!! get_the_post_thumbnail( get_the_ID(), 'thumbnail', [ 'class' => 'img-fluid rounded-circle' ])  !!}
          @else
            <img src="@asset('images/man.jpg')" class="img-fluid rounded-circle" alt="">
          @endif
      </figure>
      <div class="sector-single-header ps-25 mb-32 mb-lg-20">
        <header class="d-lg-flex flex-lg-row flex-lg-wrap align-items-lg-end mb-20 mb-lg-10">
          <h1 class="sector-single-title text-gun-metal mb-0">
            @title
          </h1>
          @hasfield('education')
          <span class="d-inline-block ms-lg-5">
            @field('education')
          </span>
          @endfield
        </header>

        @hasfield('sub-title')
          <p class="fw-medium mb-0">
            @field('sub-title')
          </p>
        @endfield
      </div>
        @hasfield('short-description')
        <div class="w-100 fw-medium mb-16">
          @field('short-description')
        </div>
        @endfield

        @if($contacts)
          <ul class="list-unstyled d-flex flex-row flex-wrap sector-contacts agent-contacts w-100 mb-32 mb-lg-56">
            @foreach($contacts as $contact)
              <li>
                <a href="{{ $contact['formatted'] }}" class="text-decoration-none text-battleship-grey ps-7" rel="noopener noreferrer">
                  <i class="icon-{{ $contact['icon'] }}"></i>
                  {{ $contact['value'] }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif

        @include('partials.sector-actions')

    </div>

    <div class="col-12 col-lg-6 mb-10 mb-lg-100">
      <h3 class="fs-3 text-gun-metal mb-28">Experience</h3>
      @content
    </div>

    @hasfield('practice_areas')
      <div class="col-12 col-lg-3 mb-20">
        <h3 class="fs-3 text-gun-metal mb-28">Practice Areas</h3>
        <div class="check-list single-sector-list">
          @field('practice_areas')
        </div>
      </div>
    @endfield

    @hasfield('recent_placements')
    <div class="col-12 col-lg-8 mb-20">
      <h3 class="fs-3 text-gun-metal mb-28">Recent Placements</h3>
      <div class="check-list single-sector-list single-sector-list-cols">
        @field('recent_placements')
      </div>
    </div>
    @endfield

  </div>

</article>

@include('partials.archive-bottom')
