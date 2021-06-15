{{--
/**
 * Filter in `[jobs]` shortcode for job types.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-filter-job-types.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */
--}}

@if ( ! is_tax( 'job_listing_type' ) && empty( $job_types ) )
	<ul class="job_types list-unstyled d-flex flex-row justify-content-center flex-wrap">
		@foreach ( get_job_listing_types() as $type )
			<li class="mx-10 mb-20">
        <div class="checkbox-advanced">
          <input
            type="checkbox"
            name="filter_job_type[]"
            value="{{ esc_attr( $type->slug ) }}"
            id="job_type_{{ esc_attr( $type->slug ) }}"
            {{ checked( in_array( $type->slug, $selected_job_types ), true, false ) }}
          />
          <label for="job_type_{{  esc_attr( $type->slug ) }}"
                 class="{{ esc_attr( sanitize_title( $type->name ) ) }}">
            {{ esc_html( $type->name ) }}
          </label>
        </div>
      </li>
		@endforeach
	</ul>
	<input type="hidden" name="filter_job_type[]" value="" />
@elseif ( $job_types )
	@foreach ( $job_types as $job_type )
		<input
      type="hidden"
      name="filter_job_type[]"
      value="{{ esc_attr( sanitize_title( $job_type ) ) }}">
	@endforeach
@endif
