{{--
  Template Name: Template Jobs
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(shortcode_exists('jobs'))
      @shortcode('[jobs]')
    @endif
  @endwhile
@endsection
