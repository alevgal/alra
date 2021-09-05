<div class="sector-box d-flex flex-row justify-content-between">
  <figure class="sector-photo mb-0">
    @if(has_post_thumbnail())
      <img class="lozad img-fluid rounded-circle" data-src="{!! get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') !!}" alt="">
    @else
      <img data-src="@asset('images/man.jpg')" class="lozad img-fluid rounded-circle" alt="">
    @endif
  </figure>
  <div class="sector-info">
    <h2 class="sector-title text-gun-metal">
      @title
    </h2>
    @hasfield('sub-title')
      <p class="sector-subtitle fw-medium">
        @field('sub-title')
      </p>
    @endfield

    @hasfield('short-description')
      <div class="sector-description fw-medium mb-32 mb-lg-56">
        @field('short-description')
      </div>
    @endfield

    <a href="@permalink" class="fw-medium d-inline-block mb-32">
      View full profile
    </a>

    <div class="sector-footer d-lg-flex flex-lg-row justify-content-lg-between flex-lg-wrap align-items-lg-center">
      @if($contacts)
        <ul class="list-unstyled d-flex flex-row flex-wrap sector-contacts agent-contacts mb-32 mb-lg-0">
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
  </div>
</div>
