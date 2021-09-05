{{--
  Template Name: Template Recruiters
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.recruiters-banner')
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
     'title' => 'Your Career Ambitions.',
     'listAnimation' => 'lightSpeedInRight',
     'titleAnimation'  => 'jackInTheBox'
   ])
    @include('partials.calculator')

      @include('partials.accordion', [
        'id'  => 'accordion_1',
        'title' => get_field('section_1_title')
      ])
      @include('partials.archive-bottom')
      @include('partials.accordion', [
          'id'  => 'accordion_2',
          'title' => get_field('section_2_title')
        ])

  @endwhile
@endsection

