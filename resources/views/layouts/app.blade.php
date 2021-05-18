<div class="site">

  <a class="sr-only" href="#main">
    {{ __('Skip to content') }}
  </a>

  @include('partials.header')

    <main id="main" class="main">
      @yield('content')
    </main>

  @include('partials.footer')
</div>
