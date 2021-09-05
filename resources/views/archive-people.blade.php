@extends('layouts.app')

@section('content')

  <section class="px-16">
    <div class="container-xl pt-40 pb-10 pt-md-75 pt-lg-120 pb-md-100">
      @include('partials.page-header')

      @if (! have_posts())
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'alra') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      @endif

        <div class="row">
          @while(have_posts()) @php(the_post())
            @include('partials.content-people', [
              'classes' => 'col-md-6 col-lg-4 d-flex flex-row mb-32 mb-lg-56 pe-xl-20'
            ])
          @endwhile
        </div>

      {!! get_the_posts_pagination([
        'screen_reader_text' => __( 'People navigation navigation' ),
	      'aria_label'         => __( 'People' ),
	      'prev_text'          => '<i class="icon-left"></i><span>' . __('Previous') . '</span>',
	      'next_text'          => '<span>' . __('Next') . '</span><i class="icon-right"></i>',
        'class'              => 'pagination'
      ]) !!}

    </div>
  </section>

  @include('partials.archive-bottom')
@endsection
