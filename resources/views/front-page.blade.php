@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.home-banner')
    @include('partials.section-line', [
      'withMap' => true,
      'contentType' => 'list',
      'content' => [
        'Your Job Search.',
        'Your Talent Search.',
        'Your Career Ambitions',
      ],
      'title' => 'Amplified',
      'listAnimation' => 'lightSpeedInLeft',
      'titleAnimation'  => 'zoomIn'
    ])

    @include('partials.home-promo')

    @include('partials.section-line', [
      'withMap' => false,
      'contentType' => 'slider',
      'content' => [
        'Brett is a diligent and professional operator and his knowledge in our sector has been important with regard to assisting us in identifying opportunities. His personal and flexible approach also means he has been a “preferred provider” over many years.',
        'Brett is a diligent and professional operator and his',
      ],
      'title' => 'People are noticing.'
    ])

    @include('partials.home-bottom')
  @endwhile
@endsection
