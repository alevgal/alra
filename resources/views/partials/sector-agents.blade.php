@global($post)

@if($agents)
  <div class="row">
    @foreach($agents as $agent)
      @set($post, $agent)
      @php(setup_postdata( $agent ))
      @include('partials.content-people', [
        'classes' => 'sector__agent col-12 col-md-6 mb-32 pe-lg-32 d-flex flex-row flex-wrap',
        'description' => true,
      ])
      @php(wp_reset_postdata())
    @endforeach
  </div>
@endif
