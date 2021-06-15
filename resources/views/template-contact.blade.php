{{--
  Template Name: Template Contact Us
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
  <div class="px-16 with-map">
    <div class="container-xl contact-content pt-40 pb-32 pt-md-75 pb-md-100">
      <div class="row">
        <div class="col-md-7 col-lg-6 pe-md-20 pe-lg-32 pe-xl-48">
          <header class="mb-40 mb-lg-64">
            <h1 class="contact-title fs-32-46 mb-10 text-gun-metal">
              {!! get_the_title() !!}
            </h1>
            <p class="fw-medium sub-title">That unspoken trust that existed previously is now gone.</p>
          </header>
          <div class="row">
            <address class="col-6 mb-40 text-gun-metal">
              <h3 class="fw-black mb-10">Sydney</h3>
              Suite B, 3 Best Avenue, Mosman NSW 2088
            </address>
            <address class="col-6 mb-40 text-gun-metal">
              <h3 class="fw-black mb-10">Melbourne</h3>
              Level 3, 480 Collins St, Melbourne VIC 3000
            </address>
            <div class="col-12 mb-40">
              <ul class="list-unstyled mb-lg-20">
                <li>
                  <a href="#" class="text-decoration-none text-battleship-grey lh-lg">
                    <i class="icon-phone contact-icon me-5" aria-hidden="true"></i> 1300 002 572
                  </a>
                </li>
                <li>
                  <a href="#" class="text-decoration-none text-battleship-grey lh-lg">
                    <i class="icon-envelope contact-icon me-5" aria-hidden="true"></i> hello@alra.com.au
                  </a>
                </li>
              </ul>
              <ul class="social-links-menu list-unstyled d-flex flex-wrap">
                <li>
                  <a href="#" class="text-decoration-none text-gun-metal me-10">
                    <i class="icon-linkedin" aria-hidden="true"></i>
                    <span class="sr-only">LinkedIn</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-decoration-none text-gun-metal me-10">
                    <i class="icon-facebook" aria-hidden="true"></i>
                    <span class="sr-only">LinkedIn</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-decoration-none text-gun-metal me-10">
                    <i class="icon-twitter" aria-hidden="true"></i>
                    <span class="sr-only">LinkedIn</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>

        </div>
        <div class="col-md-5 col-lg-6 ps-md-20 ps-lg-32 ps-xl-48">
          <div class="box-wrapper pt-40 px-40 pb-48 bg-white">
            <h4 class="fs-3 text-gun-metal mb-4">Get In Touch</h4>
            <form action="#">
              <div class="form-floating mb-20">
                <input type="text" class="form-control" id="inputName" placeholder="Full name">
                <label for="inputName">Full name</label>
              </div>
              <div class="form-floating mb-20">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
                <label for="inputEmail">Email Address</label>
              </div>
              <div class="form-floating mb-20">
                <input type="tel" class="form-control" id="inputPhone" placeholder="Contact Number">
                <label for="inputPhone">Contact Number</label>
              </div>
              <div class="form-floating mb-40">
                <textarea class="form-control contact-textarea" id="inputMessage" placeholder="Message" rows="4"></textarea>
                <label for="inputMessage">Message</label>
              </div>
              <div class="d-flex flex-column align-items-stretch align-items-md-end">
                <button class="btn btn-gun-metal" type="submit">
                  Submit
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

    @include('partials.content-page')
  @endwhile
@endsection
