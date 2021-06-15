@global($post)
<form class="job-manager-application-form job-manager-form" method="post" enctype="multipart/form-data" action="{!! esc_url( get_permalink() ) !!}">
	@action( 'job_application_form_fields_start' )

	@foreach ( $application_fields as $key => $field )
		@if ( 'output-content' === $field['type'] )
			<div class="form-content">
				<h3>{!! esc_html__( $field['label'] ) !!}</h3>
				@if ( ! empty( $field['description'] ) )
          {!! wpautop( wp_kses_post( $field['description'] ) ) !!}
        @endif
			</div>
		@else
			<fieldset class="mb-20 fieldset-{{ esc_attr__( $key ) }}">
        <div class="form-floating field @php echo $field['required'] ? 'required-field' : ''; @endphp">
					@php($class->get_field_template( $key, $field ))
          <label {!! isset( $field['type'] ) && $field['type'] === 'file' ? 'class="sr-only"' : '' !!} for="{{ esc_attr__( $key ) }}">
            {!! __( $field['label'] ) . apply_filters( 'submit_job_form_required_label', $field['required'] ? '' : ' <small>' . __( '(optional)', 'wp-job-manager' ) . '</small>', $field ) !!}
          </label>
				</div>
			</fieldset>
		@endif
	@endforeach

	@action( 'job_application_form_fields_end' )

	<p>
		<input type="submit" class="btn btn-dark fw-medium button wp_job_manager_send_application_button" value="{{ esc_attr__( 'Send application', 'wp-job-manager-applications' ) }}" />
		<input type="hidden" name="wp_job_manager_send_application" value="1" />
		<input type="hidden" name="job_id" value="{{ absint( $post->ID ) }}" />
	</p>
</form>
