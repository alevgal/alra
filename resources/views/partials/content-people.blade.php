<div class="{{ $classes }}">

    <a href="@permalink" class="d-block agent-photo mb-0">
      @if(has_post_thumbnail())
        <img class="img-fluid rounded-circle" src="{!! get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') !!}" alt="">
      @else
        <img src="@asset('images/man.jpg')" class="img-fluid rounded-circle" alt="">
      @endif
    </a>

  <div class="agent-info fw-medium ps-16">
    <h3 class="agent-title mb-5">
      <a class="d-block text-decoration-none text-gun-metal" href="@permalink">{!! $title !!}</a>
    </h3>
    @if( $subTitle )
      <p class="agent-subtitle text-light-grey mb-10">{!! $subTitle !!}</p>
    @endif

    @if($contacts)
      <ul class="list-unstyled agent-contacts mb-0">
        @foreach($contacts as $contact)
          <li>
            <a href="{{ $contact['formatted'] }}" class="text-decoration-none text-battleship-grey" rel="noopener noreferrer">
              <i class="icon-{{ $contact['icon'] }}"></i>
              {{ $contact['value'] }}
            </a>
          </li>
        @endforeach
      </ul>
    @endif

  </div>

  @if( isset($description ) && $description && get_field('short-description'))
    <div class="agent-description fw-medium w-100 mt-32">
      @field('short-description')
    </div>
  @endif

</div>
