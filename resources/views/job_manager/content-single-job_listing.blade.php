{{--
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */
--}}


@global($post)

@if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status )
  <div class="job-manager-info">
    {{ __( 'This listing has expired.', 'wp-job-manager' ) }}
  </div>
@else

  <div class="job-box job-box-expanded d-flex flex-row">
  <figure class="job-box__company-logo d-none d-md-block">
    @php(the_company_logo())
  </figure>
  <div class="job-box__content">
    <header class="job-box__header d-lg-flex flex-lg-row">
      <div class="job-box__header-left">

        <h1 class="position__title text-gun-metal mb-20 mb-md-10">
          @php(wpjm_the_job_title())
        </h1>

        <div class="job-box__meta d-md-flex flex-wrap mb-28 mb-md-20">

          @if( $categories )
            <p class="job-box__meta-item job-categories mb-10 me-md-12">
              <i class="job-box__icon icon-portfolio" aria-hidden="true"></i>
              {!! implode(', ', $categories) !!}
            </p>
          @endif

          <p class="job-box__meta-item job-location location mb-10 me-md-12">
            <i class="job-box__icon icon-pin" aria-hidden="true"></i>
            @php(the_job_location( false ))
          </p>

          @if( $salary )
            <p class="job-box__meta-item job-categories mb-10 me-md-12">
              <i class="job-box__icon icon-coin" aria-hidden="true"></i>
              {!! implode(' &mdash; ', $salary) !!}
            </p>
          @endif

          @action( 'job_listing_meta_end' )
        </div>
      </div>

      <div class="job-box__header-right job-box__header-buttons job-buttons d-none d-lg-flex flex-lg-column">
        <x-job-apply-button class="mb-16">
          Apply Now
        </x-job-apply-button>
      </div>
    </header>

    <div class="single_job_listing">
        {{--
            /**
             * single_job_listing_start hook
             *
             * @hooked job_listing_meta_display - 20
             * @hooked job_listing_company_display - 30
             */
        --}}
        @action( 'single_job_listing_start' )

        <div class="job_description job-box__full pt-32 pb-25 pt-md-0 pb-md-20">
          @php(wpjm_the_job_description())
        </div>

        <div class="job-buttons d-flex flex-column flex-md-row mt-25 mb-48 mt-mb-20 mb-md-64">
            <x-job-apply-button class="me-md-12">
              {{ __('Apply Now', 'alra') }}
            </x-job-apply-button>
          </div>

        <div class="job-box__agents row">
          @if($agent)
            @set($post, $agent)
            @php(setup_postdata( $agent ))
            @include('partials.content-people', [
              'classes' => 'job-box__agent col-12 col-md-7 col-lg-6 d-flex flex-row pe-lg-48'
            ])
            @php(wp_reset_postdata())

            <div class="agent-buttons col-12 col-md-5 col-lg-6 d-flex flex-column flex-lg-row justify-content-lg-between flex-wrap mb-28">
              <button class="btn btn-white fw-medium mb-12 text-overflow" type="button">
                Ask {!! App\getFirstName( $agent->post_title ) !!} Question
              </button>
              @else
                <div class="agent-buttons col-12 col-md-5 col-lg-6 d-flex flex-column flex-lg-row justify-content-lg-between flex-wrap ms-md-auto">
                  @endif

                  <button class="btn btn-white fw-medium mb-12" type="button">
                    Job Alerts
                  </button>
                  <button class="btn btn-white fw-medium mb-12" type="button">
                    Send Job
                  </button>
                  <button class="btn btn-white fw-medium mb-12" type="button">
                    Refer a friend
                  </button>
                  @if( $specialOffer )
                    <div class="job-special-offer fw-medium mt-28 mt-md-20 mt-lg-10">
                      {!! $specialOffer !!}
                    </div>
                  @endif
                </div>
            </div>

        </div>

        @if ( candidates_can_apply() )
          @php( get_job_manager_template( 'job-application.php' ) )
        @endif
        {{--
          /**
           * single_job_listing_end hook
           */
        --}}
        @action( 'single_job_listing_end' )

    </div>
  </div>
</div>
@endif

