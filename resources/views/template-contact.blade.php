{{--
  Template Name: Template Contact Us
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <div class="px-16 with-map">
    <div class="container-xl contact-content pt-40 pt-lg-120 pb-32 pt-md-75 pb-lg-100">
      <div class="row">
        <div class="col-md-7 col-lg-6 pe-md-20 pe-lg-32 pe-xl-48">
          <header class="mb-40 mb-lg-64">
            <h1 class="contact-title fs-32-46 mb-10 text-gun-metal">
              {!! get_the_title() !!}
            </h1>
            @hasfield('sub-title')
              <p class="fw-medium sub-title">
                @field('sub-title')
              </p>
            @endfield
          </header>
          <div class="row">
            @hasoptions('offices')
              @options('offices')
                <address class="col-6 mb-40 text-gun-metal">
                  @hassub('title')
                    <h3 class="fw-black mb-10">@sub('title')</h3>
                  @endsub
                  @sub('address')
                </address>
              @endoptions
            @endhasoptions
            <div class="col-12 mb-40">
              <ul class="list-unstyled mb-lg-20">
                @hasoption('contact-phone')
                  <li>
                    <a href="tel:{!! App\formatPhone( get_field('contact-phone', 'option') ) !!}" class="text-decoration-none text-battleship-grey lh-lg">
                      <i class="icon-phone contact-icon me-5" aria-hidden="true"></i> {!! get_field('contact-phone', 'option') !!}
                    </a>
                  </li>
                @endoption
                @hasoption('contact-email')
                <li>
                  <a href="mailto:@option('contact-email')" class="text-decoration-none text-battleship-grey lh-lg">
                    <i class="icon-envelope contact-icon me-5" aria-hidden="true"></i> @option('contact-email')
                  </a>
                </li>
                @endoption
              </ul>
              <ul class="social-links-menu list-unstyled d-flex flex-wrap">
                @hasoption('contact-linkedin')
                  <li>
                    <a href="{!! esc_url( get_field('contact-linkedin')) !!}" class="text-decoration-none text-gun-metal me-10" target="_blank" rel="noopener norefferer">
                      <i class="icon-linkedin" aria-hidden="true"></i>
                      <span class="sr-only">LinkedIn</span>
                    </a>
                  </li>
                @endoption
                @hasoption('contact-facebook')
                  <li>
                    <a href="{!! esc_url( get_field('contact-facebook')) !!}" class="text-decoration-none text-gun-metal me-10" target="_blank" rel="noopener norefferer">
                      <i class="icon-facebook" aria-hidden="true"></i>
                      <span class="sr-only">Facebook</span>
                    </a>
                  </li>
                @endoption
                @hasoption('contact-twitter')
                  <li>
                    <a href="{!! esc_url( get_field('contact-twitter')) !!}" class="text-decoration-none text-gun-metal me-10" target="_blank" rel="noopener norefferer">
                      <i class="icon-twitter" aria-hidden="true"></i>
                      <span class="sr-only">Twitter</span>
                    </a>
                  </li>
                @endoption
              </ul>
            </div>
          </div>

        </div>
        <div class="col-md-5 col-lg-6 ps-md-20 ps-lg-32 ps-xl-48">
          <div class="box-wrapper pt-40 px-40 pb-48 bg-white">
            <h4 class="fs-3 text-gun-metal mb-4">Get In Touch</h4>
            @content
          </div>
        </div>
      </div>
    </div>
  </div>
  @endwhile
@endsection
