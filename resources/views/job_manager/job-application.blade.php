{{--
/**
 * Show job application when viewing a single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-application.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.31.1
 */

 --}}


@if ( $apply = get_the_job_application_method() )
	<div id="job_application-{{ get_the_ID() }}" class="job_application application modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apply</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          @action( 'job_application_start', $apply )
          <div class="application_details">
            {{--
              /**
               * job_manager_application_details_email or job_manager_application_details_url hook
               */
               --}}
            @action( 'job_manager_application_details_' . $apply->type, $apply )
          </div>
          @action( 'job_application_end', $apply )
        </div>
      </div>
    </div>
	</div>
@endif
