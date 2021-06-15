@extends('layouts.app')

@section('content')

  <div class="px-16">
    <div class="container-xl pt-40 pb-32 pt-md-75 pb-md-100">
      @include('partials.page-header')

      @if (! have_posts())
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'alra') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      @endif

        <div class="row">
          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile
        </div>

      {!! get_the_posts_navigation() !!}
    </div>
  </div>
@endsection
