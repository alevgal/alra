<section class="section-map text-gun-metal pt-56 pb-28">
  <div class="container-xl">
    <div class="row">
      <div class="section-map__first col-12 position-relative">
        @if($items)
          <ul class="section-map__list list-unstyled text-center mb-10 fw-medium">
            @foreach($items as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        @endif
      </div>
      <div class="col-12 pt-16">
        <h2 class="section-map__title text-center m-0">{{ $title }}</h2>
      </div>
    </div>
  </div>

</section>
