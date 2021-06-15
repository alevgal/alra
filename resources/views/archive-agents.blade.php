@extends('layouts.app')

@section('content')

  <section class="px-16">
    <div class="container-xl pt-40 pb-10 pt-md-75 pb-md-100">
      @include('partials.page-header')

      @if (! have_posts())
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'alra') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      @endif

        <div class="row">
          @while(have_posts()) @php(the_post())
            @include('partials.content-agents', [
              'classes' => 'col-md-6 col-lg-4 d-flex flex-row mb-32 mb-lg-56 pe-xl-20'
            ])
          @endwhile
        </div>
      {!! get_the_posts_navigation() !!}
    </div>
  </section>
  <section class="home-bottom beveled-top text-white d-flex flex-column justify-content-end pt-80 pb-48 px-28 pb-lg-128 mb-n10 mb-lg-n40">
    <div class="agents-bottom-text mw-450 mx-auto icon-quote">
      @hasoption('agents-footer-text')
        <p class="fs-4 fw-medium mb-20 mb-lg-16">@option('agents-footer-text')</p>
      @endoption

      @hasoption('agents-footer-title')
      <h5 class="fs-2 fw-black mb-32">@option('agents-footer-title')</h5>
      @endoption
      <div class="d-flex flex-column flex-sm-row">
        <button class="btn btn-light-blue text-white mb-16 mb-sm-0 me-sm-10" type="button">
          Submit CV
        </button>
        <a class="btn btn-transparent" href="#">
          Contact Us
        </a>
      </div>
    </div>
  </section>
@endsection
