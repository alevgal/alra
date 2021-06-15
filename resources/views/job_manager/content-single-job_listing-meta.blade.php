{{--
/**
 * Single view job meta box.
 *
 * Hooked into single_job_listing_start priority 20
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing-meta.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.14.0
 * @version     1.28.0
 */
--}}


@global($post)

@action( 'single_job_listing_meta_before' )

<div class="job-listing-meta meta d-md-flex flex-wrap">
  @action( 'single_job_listing_meta_start' )

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

	@if ( is_position_filled() )
    <p class="job-position-filled fs-7 mb-12">
      {{ __( 'This position has been filled', 'wp-job-manager' ) }}
    </p>
	@elseif ( ! candidates_can_apply() && 'preview' !== $post->post_status )
    <p class="listing-expired fs-7 mb-12">
      {{ __( 'Applications have closed', 'wp-job-manager' ) }}
    </p>
	@endif

  @action( 'single_job_listing_meta_end' )
</div>

@action( 'single_job_listing_meta_after' )
