{{--
  /**
   * Filters in `[jobs]` shortcode.
   *
   * This template can be overridden by copying it to yourtheme/job_manager/job-filters.php.
   *
   * @see         https://wpjobmanager.com/document/template-overrides/
   * @author      Automattic
   * @package     wp-job-manager
   * @category    Template
   * @version     1.33.0
   */
--}}

@php(wp_enqueue_script( 'wp-job-manager-ajax-filters' ))

@action( 'job_manager_job_filters_before', $atts )

<div class="job-filters bg-banner bg-banner-2 bg-overlay position-relative text-white px-28 bg-almost-black beveled-bottom">
  <h1 class="job-filters__title text-center text-uppercase mb-40 mb-lg-48">@title</h1>

  <form class="job_filters">
	  @action( 'job_manager_job_filters_start', $atts )

    <div class="search_jobs row justify-content-center">
		  @action( 'job_manager_job_filters_search_jobs_start', $atts )

      <div class="search_keywords filter-group col-12 mb-48">
        <label for="search_keywords" class="sr-only">
            {{ esc_html__( 'Keywords', 'wp-job-manager' ) }}
        </label>
        <input type="text"
               name="search_keywords"
               class="form-control form-control-light"
               id="search_keywords"
               placeholder="{{ esc_attr__( 'Keywords', 'wp-job-manager' ) }}"
               value="{{ esc_attr( $keywords ) }}">
      </div>

      <div class="search_location filter-group col-12 mb-48">
        <label for="search_location" class="sr-only">
            {{ esc_html__( 'Location', 'wp-job-manager' ) }}
        </label>
        <input
          type="text"
          name="search_location"
          class="form-control form-control-light"
          id="search_location"
          placeholder="{{ esc_attr__( 'Location', 'wp-job-manager' ) }}"
          value="{{ esc_attr( $location ) }}">
      </div>

      @if ( $categories )
        @foreach ( $categories as $category )
          <input type="hidden" name="search_categories[]" value="{{ esc_attr( sanitize_title( $category ) ) }}">
        @endforeach
      @elseif ( $show_categories && ! is_tax( 'job_listing_category' ) && get_terms( [ 'taxonomy' => 'job_listing_category' ] ) )
        <div class="search_categories filter-group col-12 mb-48">
          <label for="search_categories" class="sr-only">
            {{ esc_html__( 'Category', 'wp-job-manager' ) }}
          </label>

          @if ( $show_category_multiselect )
            @php( job_manager_dropdown_categories( [ 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'hide_empty' => true ] ) )
          @else
            @php( job_manager_dropdown_categories( [ 'taxonomy' => 'job_listing_category', 'hierarchical' => 1, 'show_option_all' => __( 'Any category', 'wp-job-manager' ), 'name' => 'search_categories', 'orderby' => 'name', 'selected' => $selected_category, 'multiple' => false, 'hide_empty' => true ] ) )
        @endif
      </div>
    @endif

      {{--
        /**
        * Show the submit button on the job filters form.
        *
        * @since 1.33.0
        *
        * @param bool $show_submit_button Whether to show the button. Defaults to true.
        * @return bool
        */
      --}}
      @if ( apply_filters( 'job_manager_job_filters_show_submit_button', true ) )

      <div class="search_submit col-12 col-lg-auto text-center">
        <button type="submit" class="btn btn-transparent mb-48">
          {{ esc_attr__( 'Search Jobs', 'wp-job-manager' ) }}
        </button>
      </div>
    @endif

    @action( 'job_manager_job_filters_search_jobs_end', $atts )
  </div>

    @action( 'job_manager_job_filters_end', $atts )

  </form>

  @action( 'job_manager_job_filters_after', $atts )
</div>

<noscript>
    {{ esc_html__( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'wp-job-manager' ) }}
</noscript>
