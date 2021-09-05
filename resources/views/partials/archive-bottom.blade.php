<section class="home-bottom beveled-top-bottom text-white d-flex flex-column justify-content-end pt-80 pb-48 px-28 pb-lg-128 mb-n12 mb-lg-n44">
  <div class="agents-bottom-text mw-450 mx-auto icon-quote">
    @if(isset( $fields['text_top'] ) && ! empty( $fields['text_top'] ))
      <p class="fs-4 fw-medium mb-20 mb-lg-16">
        {!! $fields['text_top'] !!}
      </p>
    @endif

    @if(isset( $fields['text_bottom'] ) && ! empty( $fields['text_bottom'] ))
      <h5 class="fs-2 fw-black mb-32">{!! $fields['text_bottom'] !!}</h5>
    @endif

    @if(isset( $fields['buttons'] ) && ! empty( $fields['buttons'] ))
      <div class="home-bottom__buttons d-flex flex-column flex-sm-row">
        @foreach( $fields['buttons'] as $button )
          @set($class, ['btn'])

          @if($loop->index === 0)
            @set($class, array_merge( $class, ['mb-16', 'mb-sm-0', 'me-sm-10'] ))
          @endif

          @set($class[], 'btn-' . $button['style'] )

          <a href="{!! esc_url( $button['link'] ) !!}" class="{{ implode(' ', $class) }}">
            {!! $button['text'] !!}
          </a>

        @endforeach
      </div>
    @endif
  </div>
</section>

