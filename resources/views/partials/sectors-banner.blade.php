<div class="job-filters bg-banner bg-banner-1 position-relative text-white px-28 bg-almost-black beveled-bottom">
  <div class="mb-40 mb-lg-48">
    <h1 class="job-filters__title text-center text-uppercase mb-0">
      Companies
    </h1>
    <p class="job-filters__subtitle text-center mb-0">Search your sectors</p>
  </div>

  @if($categories)

    <div class="search_jobs row justify-content-center">
      <div class="search_sectors filter-group col-12 mb-48">
        <label for="sectors-select" class="sr-only">
          Category
        </label>

        <select id="sectors-select" class="form-control form-control-light sectors-select">
          <option></option>
          @foreach($categories as $category)
            <option value="{!! get_term_link( $category->term_id, 'sector' ) !!}?scroll#sector-content" {!! selected( $category->term_id, $term_id, false ) !!}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="search_submit col-12 col-lg-auto text-center">
        <button id="sectors-submit" type="button" class="btn btn-transparent mb-48">
          Search
        </button>
      </div>
    </div>

  @endif
</div>
