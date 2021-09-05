@extends('layouts.app')

@section('content')

  @include('partials.sectors-banner')
  @include('partials.section-line', [
   'withMap' => true,
   'contentType' => 'list-reverse',
   'content' => [
     'Realised.',
     'Rewarded.',
     '<span class="fw-black">Amplified.</span>',
     'Supported.',
     'Unleashed.',
   ],
   'title' => 'Your Talent Search.',
   'listAnimation' => 'lightSpeedInRight',
   'titleAnimation'  => 'jackInTheBox'
 ])

  <div class="job_listings-wrap position-relative mx-auto px-28">
    <div id="sector-content" class="sector-anchor position-absolute"></div>

    @include('partials.sector-header')
    @include('partials.sector-agents')

    {{--
    <div class="sector-list pt-lg-64 pb-lg-100">
      @while(have_posts()) @php(the_post())
        @include('partials.content-sectors')
      @endwhile

      {!! get_the_posts_pagination([
        'screen_reader_text' => __( 'Sector navigation navigation' ),
	      'aria_label'         => __( 'Sectors' ),
	      'prev_text'          => '<i class="icon-left"></i><span>' . __('Previous') . '<span>',
	      'next_text'          => '<span>' . __('Next') . '<span><i class="icon-right"></i>',
        'class'              => 'pagination'
      ]) !!}
    </div>
    --}}
  </div>

  @include('partials.archive-bottom')
@endsection
