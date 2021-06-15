<div class="{{ $classes }}">
  @if(has_post_thumbnail())
    <figure class="agent-photo mb-0">
      {!! get_the_post_thumbnail( get_the_ID(), 'thumbnail', [ 'class' => 'img-fluid rounded-circle' ])  !!}
    </figure>
  @endif
  <div class="agent-info fw-medium ps-16">
    <h3 class="agent-title text-gun-metal mb-5">{!! $title !!}</h3>
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

</div>
