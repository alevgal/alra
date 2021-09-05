<header class="page-header mb-56 mb-lg-64">
  <div class="row justify-content-lg-between">
    <div class="col-12 col-lg-7 mb-25 fw-medium">
      @if( $title )
        <h2 class="text-gun-metal fs-2 mb-10">
          {!! $title !!}
        </h2>
      @endif
      {!! $description !!}
    </div>

    @if($titleRight)
      <div class="check-list col-12 col-lg-5 d-lg-flex justify-content-lg-end pt-lg-15">
        {!! $titleRight !!}
      </div>
    @endif
  </div>
</header>
