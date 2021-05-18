@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.home-banner')
    @include('partials.section-map', [
      'items' => ['Your Job Search.', 'Your Talent Search.', 'Your Career.', 'Ambitions.'],
      'title' => 'Amplified'
    ])
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection
