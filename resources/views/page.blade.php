@extends('layouts.app')

@section('content')
  <div class="px-16">
    <div class="container-xl contact-content pt-40 pt-lg-120 pb-32 pt-md-75 pb-lg-100">
      @while(have_posts()) @php(the_post())
        @include('partials.page-header')
        @includeFirst(['partials.content-page', 'partials.content'])
      @endwhile
    </div>
  </div>
@endsection
