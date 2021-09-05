{{--
/**
 * Content shown before job listings in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-listings-start.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.15.0
 */
--}}

@include('partials.section-line', [
     'withMap' => true,
     'contentType' => 'list-reverse',
     'content' => [
       'Realised.',
       'Rewarded.',
       '<span class="fw-black">Amplified.</span>',
       'Supported.',
       'Unleashed.',
     ],
     'title' => 'Your Job Search.'
   ])

<div id="job-listings-wrap" class="job_listings-wrap mx-auto px-28">
  <header class="page-header mb-56 mb-lg-64">
    <h2 class="text-gun-metal fs-2 mb-10">
      Recent new
      opportunities
    </h2>
      <div class="fw-medium">
        <p>13 new opportunities posted today!</p>
      </div>
  </header>

<div class="job_listings">
