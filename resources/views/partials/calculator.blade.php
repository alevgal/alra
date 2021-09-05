<section class="calculator beveled-top-bottom pt-80 pt-lg-128 pb-80 pb-lg-128 px-16">
  <div class="container">
    <h3 class="calculator-title text-white text-center mb-75 mb-lg-80">Lifestyle Calculator</h3>

    <div class="calculator-wrap bg-white d-lg-flex flex-lg-row flex-lg-wrap">
      <div class="calculator-data d-lg-flex flex-lg-column justify-content-lg-between">
        <h4 class="text-gun-metal fs-3 mb-40">Your Data</h4>
        @set($sliders, get_field('sliders'))
        @if( $sliders )
          @foreach( $sliders as $id => $slider)
            <div class="mb-20 mb-lg-48">
              <label class="fw-medium text-gun-metal mb-40">{!! App\formatBracesLabel($slider['label']) !!}</label>
              <div id="slider_{{ $id }}"
                   class="range-slider"
                   data-min="{{ $slider['min'] }}"
                   data-max="{{ $slider['max'] }}"
                   data-step="{{ $slider['step'] }}"
                   data-start="{{ $slider['start'] }}"
                   data-format="{{ $slider['format'] }}"
              ></div>
            </div>
          @endforeach
        @endif

        @hasfield('data-bottom-text')
          <div class="calculator-note fw-medium mb-20">
            @field('data-bottom-text')
          </div>
        @endfield

      </div>

      <div class="calculator-results">
        <div class="calculator-result mb-20 d-lg-flex flex-lg-row flex-lg-wrap align-items-lg-stretch">
          <h4 class="text-gun-metal fs-3 w-100 text-lg-center mb-40">Lifestyle Amplified</h4>

          <div class="calculator-result-col">
            <div class="billing_revenue_chart d-lg-flex flex-lg-column">
              <div class="mb-16">
                <p class="fw-medium text-gun-metal mb-0">To continue earning <span id="continue-earning" class="d-block calculator-result-value text-light-blue mt-4"></span></p>
              </div>
              <h5 class="text-gun-metal mb-28 fs-6">Billing revenue</h5>
              <div class="bar-chart-wrap d-flex flex-row flex-wrap align-items-end mt-lg-auto">
                <canvas id="billing_revenue_chart"></canvas>
                <p id="change-work"></p>
              </div>
            </div>
          </div>

          <div class="calculator-result-col">
            <div class="mb-60 mb-lg-32 w-100">
              <p class="fw-medium text-gun-metal mb-0">Less hours</p>
            </div>
            <div class="row justify-content-lg-center">
              <div class="col-6">
                <div class="time-chart ratio ratio-1x1">
                  <svg id="oldHoursChart" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <circle r="10" cx="10" cy="10" fill="#cecece" />
                    <circle class="active-circle" r="5" cx="10" cy="10" fill="transparent"
                            stroke="#aeaeae"
                            stroke-width="10"
                            stroke-dasharray="31.42 31.42"
                            transform="rotate(-180 10 10)"
                    />
                  </svg>
                  <span class="time-chart-label" style="top: 50%; left: -10%;">9</span>
                  <span class="time-chart-label time-chart-label-active"></span>
                </div>
                <span id="oldHoursChartLabel" class="time-chart-legend d-block fw-500 text-gun-metal text-center"></span>
              </div>
              <div class="col-6">
                <div class="time-chart ratio ratio-1x1">
                  <svg id="newHoursChart" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <circle r="10" cx="10" cy="10" fill="#cecece" />
                    <circle class="active-circle" r="5" cx="10" cy="10" fill="transparent"
                            stroke="#67cef5"
                            stroke-width="10"
                            stroke-dasharray="31.42 31.42"
                            transform="rotate(-120 10 10)"
                    />
                  </svg>
                  <span class="time-chart-label" style="top: -1.6%; left: 20%;">11</span>
                  <span class="time-chart-label time-chart-label-active"></span>
                </div>
                <span id="newHoursChartLabel" class="time-chart-legend d-block fw-500 text-gun-metal text-center"></span>
              </div>

              @hasfield('amplifier-bottom-text')
                <div class="calculator-note fw-medium mt-28">
                  @field('amplifier-bottom-text')
                </div>
              @endfield
            </div>

          </div>
        </div>

        <div class="calculator-result d-lg-flex flex-lg-row flex-lg-wrap align-items-lg-stretch">
          <h4 class="text-gun-metal fs-3 w-100 text-lg-center mb-40">Earnings Amplified</h4>

          <div class="calculator-result-col">
            <div class="billing_revenue_chart d-lg-flex flex-lg-column">
              <div class="mb-12">
                <p class="fw-medium text-gun-metal mb-0">Your current billing is <span id="current-billing" class="d-block calculator-result-value text-light-blue mt-4"></span></p>
              </div>
              <h5 class="text-gun-metal mb-25 fs-6">Salary Package</h5>
              <div class="bar-chart-wrap d-flex flex-row flex-wrap align-items-end mt-lg-auto">
                <canvas id="salary_package_chart"></canvas>
                <p id="change-salary"></p>
              </div>
            </div>
          </div>

          <div class="calculator-result-col">
            <div class="mb-60 mb-lg-32 w-100">
              <p id="less-hours" class="fw-medium text-gun-metal mb-0"></p>
            </div>
            <div class="row justify-content-lg-center">
              <div class="col-6">
                <div class="time-chart ratio ratio-1x1">
                  <svg id="oldHoursChart2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <circle r="10" cx="10" cy="10" fill="#cecece" />
                    <circle class="active-circle" r="5" cx="10" cy="10" fill="transparent"
                            stroke="#aeaeae"
                            stroke-width="10"
                            stroke-dasharray="31.42 31.42"
                            transform="rotate(-180 10 10)"
                    />
                  </svg>
                  <span class="time-chart-label" style="top: 50%; left: -10%;">9</span>
                  <span class="time-chart-label time-chart-label-active"></span>
                </div>
              </div>
              <div class="col-6">
                <div class="time-chart ratio ratio-1x1">
                  <svg id="newHoursChart2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <circle r="10" cx="10" cy="10" fill="#cecece" />
                    <circle class="active-circle" r="5" cx="10" cy="10" fill="transparent"
                            stroke="#67cef5"
                            stroke-width="10"
                            stroke-dasharray="31.42 31.42"
                            transform="rotate(-150 10 10)"
                    />
                  </svg>
                  <span class="time-chart-label" style="top: 20%; left: -1.6%;">10</span>
                  <span class="time-chart-label time-chart-label-active"></span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
