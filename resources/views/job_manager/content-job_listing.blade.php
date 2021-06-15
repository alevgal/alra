{{--
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.34.0
 */
--}}

@global($post)

<div @php(job_listing_class()) data-longitude="{{ esc_attr( $post->geolocation_long ) }}" data-latitude="{{ esc_attr( $post->geolocation_lat ) }}">
	<div class="job-box d-flex flex-row">
    <figure class="job-box__company-logo d-none d-md-block">
      @php(the_company_logo())
    </figure>
    <div class="job-box__content">
      <header class="job-box__header d-lg-flex flex-lg-row">
        <div class="job-box__header-left">
          <a class="position d-block text-decoration-none text-gun-metal" href="@php(the_job_permalink())">
            <h3 class="position__title mb-20 mb-md-10">@php(wpjm_the_job_title())</h3>
          </a>
          <div class="job-box__meta d-md-flex flex-wrap mb-28 mb-md-20">

            @action( 'job_listing_meta_start' )

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
          <button class="btn btn-white expand-btn fw-medium mb-16" type="button" data-bs-toggle="collapse" data-bs-target="#job-content-{{ get_the_ID() }}" data-text="See less" aria-expanded="false" aria-controls="job-content-{{ get_the_ID() }}">
            Show more
          </button>
        </div>
      </header>

      @if( $excerpt )
        <div class="job-box__description fw-medium mb-20">
          {!! $excerpt !!}
        </div>
      @endif

      <div class="d-md-flex flex-wrap">
        <p class="job-box__date fs-7 mb-12">
          <i class="job-box__icon icon-calendar-solid" aria-hidden="true"></i>
          @php(the_job_publish_date())
        </p>

        @if ( get_option( 'job_manager_enable_types' ) )

          @set($types, wpjm_get_the_job_types())
          @notempty($types)

          <ul class="job-box__types list-unstyled d-flex">
            @foreach ( $types as $type )
              <li class="job-type fs-7 {{ esc_attr( sanitize_title( $type->slug ) ) }}">
                {{ esc_html( $type->name ) }}
              </li>
            @endforeach
          </ul>
          @endnotempty
        @endif
      </div>

      <div id="job-content-{{ get_the_ID() }}" class="job-box__full collapse pt-32 pb-25 pt-md-0 pb-md-20">
        @content
      </div>

      <div class="job-buttons flex-column flex-md-row mt-25 mb-48 mt-mb-20 mb-md-64">
        <button class="btn btn-white expand-btn fw-medium mb-20 mb-md-0 order-md-1" type="button" data-bs-toggle="collapse" data-bs-target="#job-content-{{ get_the_ID() }}" data-text="See more" aria-expanded="false" aria-controls="job-content-{{ get_the_ID() }}">
          Show less
        </button>
        <x-job-apply-button class="me-md-12 order-md-0">
          Apply Now
        </x-job-apply-button>
      </div>

      <div class="job-box__agents row">
        @if($agent)
          @set($post, $agent)
          @php(setup_postdata( $agent ))
            @include('partials.content-agents', [
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

  </div>
    @if ( candidates_can_apply() )
      @php( get_job_manager_template( 'job-application.php' ) )
    @endif
</div>

