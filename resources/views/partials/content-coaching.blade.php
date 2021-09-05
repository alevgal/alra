@if($sections)
  <div class="row">
    <div class="col-lg-3 col-xl-4">
      <h2 class="fs-5 text-gun-metal mb-25 mb-lg-44 px-16 ps-lg-0">
        On this page you’ll find:
      </h2>
      <nav class="nav nav-pills flex-column">
        @foreach($sections as $section)
          <a class="nav-link fs-6 fw-medium ps-lg-0" href="#coaching-content-{{ $loop->index + 1 }}">
            {!! $section['title'] !!}
          </a>
        @endforeach
      </nav>
    </div>
    <div class="col-lg-9 col-xl-8">
      @foreach($sections as $section)
          <section class="position-relative mb-48 mb-lg-100 ps-lg-32">
            <span id="coaching-content-{{ $loop->index + 1}}" class="coaching-anchor"></span>
            <h3 class="text-gun-metal mb-28">
              {!! $section['title'] !!}
            </h3>
            {!! $section['content'] !!}
          </section>
      @endforeach
    </div>
  </div>
@endif

