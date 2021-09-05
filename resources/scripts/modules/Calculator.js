import noUiSlider from 'nouislider';
import wNumb from 'wnumb';
import { Chart, registerables } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';

export default class Calculator {
  constructor() {
    Chart.register(...registerables);

    this.sliders = {
      slider_billing_revenue: document.querySelector('#slider_billing_revenue'),
      slider_salary_package: document.querySelector('#slider_salary_package'),
      slider_working_hours: document.querySelector('#slider_working_hours'),
      slider_non_revenue: document.querySelector('#slider_non_revenue'),
      slider_commute: document.querySelector('#slider_commute'),
    };

    this.values = {
      slider_billing_revenue: null,
      slider_commute: null,
      slider_non_revenue: null,
      slider_salary_package: null,
      slider_working_hours: null,
    };

    this.moneyFormat = wNumb({
      mark: '.',
      thousand: ',',
      prefix: '$',
      decimals: 0,
    });

    this.oldHoursChart = document.querySelector('#oldHoursChart');
    this.oldHoursChartLabel =  document.querySelector('#oldHoursChartLabel');
    this.newHoursChart = document.querySelector('#newHoursChart');
    this.newHoursChartLabel =  document.querySelector('#newHoursChartLabel');
    this.oldHoursChart2 = document.querySelector('#oldHoursChart2');
    this.newHoursChart2 = document.querySelector('#newHoursChart2');



    this.logo  = new Image();
    this.logo.src = "data:image/jpeg;base64,/9j/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQECAgICAgICAgICAgMDAwMDAwMDAwMBAQEBAQEBAgEBAgICAQICAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA//dAAQABf/uAA5BZG9iZQBkwAAAAAH/wAARCAANACUDABEAAREBAhEB/8QAeAAAAwEAAAAAAAAAAAAAAAAABgcJCgEAAgMBAQAAAAAAAAAAAAAAAwUBAgYEBxAAAQUBAQEAAwEAAAAAAAAABAIDBQYHCAEJABIUExEAAgIBAwMDAwIHAAAAAAAAAQIDEQQFEiEABjETQXEHMlGRoRQWIkJhYtH/2gAMAwAAARECEQA/ANYf0R7RcxvANdqOA2UVXW9gteZ8245BkxD7hUBtvRpwMBQLd4DORaoexxOfwMoVbzPE+EhegQrrZHqfFep91X8p6vhYOn69qkBTQNQWZ4JdyMsq47FZlpHLIwcbNrhGPlQRz151h/U7s/Xu5dd7D7fzVm727eOIufi+nLHJjfx6CTFe5IhHIkkZ3rJEZY1ra5VjtM27z9P9Jt3zD7tt2U6mTFdD8ZbZQ8fjtVbgAET95zewbJmMVnG3l1K5VMEIT3Xc6m5AYn12HHFVKBHrDbSyhhzwCabGmpQLKt48yFtt8AhWtbB/tIHvdEX07k1eV9KyHhesqCRV3V5Usu16IH3KSPAFg14HR39FevZ7KO/Krjd77y1bijn9zigTX35vI8lperzMnqS9ms1TQ9YhJvEdok67VHaoGtbxzo4QHjwLbSSGnXFeOD0/EWXBMyQJPP622mYr/TtB4pls38+fH4JqmY0OoiB8l8fG9DdaqrHduI5tHoV70Bx56Xcf9COs5nk3lir3y8y2a6nsO5bbbSulWMVlYK22z5vcgmm3yy9Vm4CZCWyYz+X32DZrFUHAbj5F9bVwTMxYykrGaaIcDEGXIUG6NUUbNwoTScBN1iwps3/rR9z1Eeo5j4UQkbZKzsd5RraGM2ZNgB2lxVA+zbhfCmxnzw64G7g5Bx/od6Lj65cLLDmwGqU+MJWSJS9cpUmXVNIrQvr7izkRgtoiX3o70nxBLsW+M64lKnPfPFGfiHCymxzyo5B/KkWD+h/Xpzp2amoYi5Ke9gjwQykgirNcjxZ+ev/Q2eaVxJiOr9T4P17cGbOTp/OoVrZz+KFmBR6K/LWqAlquq1WSvqi3SpezV+Bnjh40hJbKGEk/stt1TQ6mnp7k1du3k7XaUnRY8l51SvtkkVEcg+eVQAA2FtytGR92Nh7A7Ux++8j6lQYiJ3ll6bBgTZA+6TFxpZ5oYj+AsmQ7MVoybYhIWEMQRZdG/NDnbp207tar7IaXCu9J4xl2JbFDUe0xsBA2yHxXTCNTyy4khk1yUIb0OmThxIY0j49625EkLFeYdQlv1vhx9RyMZUWPafTcstgmtw2sPPgjz/nrRZWmY+X6nqFgJECttIF7TYN1diqHNVfHJ6K8d4giMwsVvnLp0R0p0xHXfOZjLp2odL2PLtAq79VnTxDJIX1MLkdPniWyGGHhVCknvxqxzSPFDKcc8cTSXNMihUjjjIbcCgYGx8sf+8dTBgCJmaSWWUMpUhypFH4UH965PHQxy7828P5S0OB02o3La9CsVEwUTl7JUbDewbmFj2AhXHy7j5pQ/Ra1BSS4xMqKAx/bMEy8t7HxIIn9f+AyEfl8nUJsqMxuEVWfe20Vuaqs8n9qFkmrPVcTTIMSUSo0jMsexQxsKgN0oofFmzQAuh03sj5IoOFXfoO65da9FrKeldae3DQKgiXr8jTI/S5KswNYs1hp0TK1Y0uvruTVbGMlGvCXmyJD93k+N/v6n8DLlPMiJIFPprtB5ur4B59vbo8WLHC7vESPUbcQKqz5Pi7PuSSfbwAB/9k=";

    this.billingRevenueChartEl = document.querySelector('#billing_revenue_chart').getContext('2d');
    this.salaryChartEl = document.querySelector('#salary_package_chart').getContext('2d');

    this.resultWrappers = {
      continueEarning: document.querySelector('#continue-earning'),
      changeWork: document.querySelector('#change-work'),
      currentBilling: document.querySelector('#current-billing'),
      changeSalary: document.querySelector('#change-salary'),
      lessHours: document.querySelector('#less-hours'),
    };

    this.onSliderSetAlias = this.onSliderSet.bind(this);

    this.valid = true;

    this.initSliders();

    this.calculate();

  }

  initSliders()
  {
    Object.entries(this.sliders).forEach(slider => {
      const el = slider[1];
        if( ! this.valid || !el ) {
          this.valid = false;
          return;
        }

        let options = {
          start: parseInt( el.dataset.start ),
          range: {
            'min': [ parseInt( el.dataset.min )],
            'max': [ parseInt( el.dataset.max )],
          },
          step: parseInt( el.dataset.step ),
          connect: 'lower',
          tooltips: el.dataset.format === 'money'
              ? this.moneyFormat : wNumb({
              decimals: 0,
            }),
        };

        noUiSlider.create( el, options );

        this.values[slider[0]] = parseInt( el.noUiSlider.get() );
        el.noUiSlider.on('set', this.onSliderSetAlias);
    });

  }

  onSliderSet( values, handle, unencoded, tap, positions, noUiSlider ) {
    this.values[noUiSlider.target.id] = parseInt( unencoded[0] );
    this.calculate( noUiSlider.target.id );
  }

  calculate(slider = 'all')
  {
    if( ! this.valid ) {
      return;
    }
    const {
      slider_billing_revenue,
      slider_commute,
      slider_non_revenue,
      slider_salary_package,
      slider_working_hours } = this.values;

    let newRevenue = Math.round(slider_salary_package / 0.7 + 50655);
    let newSalaryPackage = Math.round( slider_billing_revenue * 0.7 - 50655);
    let payIncrease = Math.round( (newSalaryPackage - slider_salary_package) / (slider_salary_package / 100) );

    const advantages = Calculator.calculateSave( slider_billing_revenue, slider_working_hours, slider_non_revenue, newRevenue, slider_commute);


    this.resultWrappers.changeWork.innerText = `${ Math.abs(advantages.timeSavingPercentage) }% ${ advantages.timeSavingPercentage > 0 ? 'less' : 'more' } work!`;
    this.resultWrappers.changeSalary.innerText = `${ Math.abs(payIncrease) }% more pay!`;
    this.resultWrappers.lessHours.innerText = `That ${ payIncrease }% increase in pay also saves you in hours per week!`;

    if( ['all', 'slider_salary_package'].includes(slider) ) {
      this.resultWrappers.continueEarning.innerText = this.moneyFormat.to(slider_salary_package);
    }

    if( ['all', 'slider_billing_revenue'].includes(slider) ) {
      this.resultWrappers.currentBilling.innerText = this.moneyFormat.to(slider_billing_revenue);
    }

    if(['all', 'slider_working_hours', 'slider_commute'].includes(slider)) {
      this.updateTimeChart( this.oldHoursChart, advantages.oldHours, 9);
      this.oldHoursChartLabel.innerText = `${Calculator.maybePluralize(advantages.oldHours, 'Hour')} per day employee`;

      this.updateTimeChart( this.oldHoursChart2, advantages.oldHours, 9);
      this.updateTimeChart( this.newHoursChart2, 6, 10);
    }

    if(['all', 'slider_working_hours', 'slider_non_revenue', 'slider_billing_revenue'].includes(slider)) {
      this.updateTimeChart( this.newHoursChart, advantages.hoursNoWasting, 11);
      this.newHoursChartLabel.innerText = `${Calculator.maybePluralize(advantages.hoursNoWasting, 'Hour')} per day`;
      this.newHoursChartLabel.appendChild(this.logo);
    }

    if( ['all', 'slider_salary_package', 'slider_billing_revenue'].includes(slider) ) {
      this.billingRevenueChart( slider_billing_revenue, newRevenue );
      this.salaryPackageChart( slider_salary_package, newSalaryPackage );
    }
  }

  billingRevenueChart(oldRevenue, newRevenue)
  {
    let $this = this;

    const maximum = Math.max(oldRevenue, newRevenue);

    if( this.billingChart === undefined ) {
      const labels = ['Employee', 'Alra'];
      const data = {
        labels: labels,
        datasets: [{
          data: [oldRevenue, newRevenue],
          backgroundColor: [
            '#aeaeae',
            '#67cef5',
          ],
          borderWidth: 0,
        }],
      };

      const config = {
        type: 'bar',
        data: data,
        plugins: [
          ChartDataLabels,
          {
            afterDraw: chart => {
              let ctx = chart.ctx;
              let xAxis = chart.scales.xAxis;
              let yAxis = chart.scales.yAxis;
              xAxis.ticks.forEach((value, index) => {
                if( 'Alra' === value.label ) {
                  const x = xAxis.getPixelForTick(index);
                  ctx.drawImage($this.logo, x - 12, yAxis.bottom + 10);
                }
              });
            },
          },
        ],
        options: {
          maintainAspectRatio: false,
          plugins: {
            title: {
              display:false,
            },
            legend: {
              display: false,
            },
            tooltip: {
              enabled: false,
            },
            datalabels: {
              anchor: 'end',
              align: 'top',
              offset: 2,
              color: [
                '#aeaeae',
                '#67cef5',
              ],
              font: {
                size: '16px',
                weight: '500',
              },
              formatter: function(value, context) {
                value = parseInt( value );

                if( value > 1000) {
                  value = Math.round( value / 1000 ) + ' K';
                }

                return value;
              }
            }
          },
          barPercentage: 1.0,
          categoryPercentage: 0.9,
          responsive: true,
          scales: {
            yAxis: {
              title: {
                color: '#a2a2a2',
              },
              beginAtZero: true,
              suggestedMax: maximum + 0.1 * maximum,
              grid: {
                display: false,
              },
              ticks: {
                color: '#a2a2a2',
                callback: function(value) {
                  return value > 1000 ? value / 1000 : value;
                },
              },
            },
            xAxis: {
              categoryPercentage: 1.0,
              barPercentage: 1.0,
              ticks: {
                color: '#a2a2a2',
              },
              grid: {
                display: false,
              },
            },
          },
        },
      };

      this.billingChart = new Chart(
        this.billingRevenueChartEl,
        config,
      )
    } else {
       this.billingChart.options.scales.yAxis.suggestedMax = maximum + 0.1 * maximum;
       this.billingChart.data.datasets[0].data = [oldRevenue, newRevenue];
       this.billingChart.update();
    }
  }

  salaryPackageChart(oldSalary, newSalary)
  {
    let $this = this;

    const maximum = Math.max(oldSalary, newSalary);

    if( this.salaryChart === undefined ) {
      const labels = ['Employee', 'Alra'];
      const data = {
        labels: labels,
        datasets: [{
          data: [oldSalary, newSalary],
          backgroundColor: [
            '#aeaeae',
            '#67cef5',
          ],
          borderWidth: 0,
        }],
      };

      const config = {
        type: 'bar',
        data: data,
        plugins: [
          ChartDataLabels,
          {
            afterDraw: chart => {
              let ctx = chart.ctx;
              let xAxis = chart.scales.xAxis;
              let yAxis = chart.scales.yAxis;
              xAxis.ticks.forEach((value, index) => {
                if( 'Alra' === value.label ) {
                  const x = xAxis.getPixelForTick(index);
                  ctx.drawImage($this.logo, x - 12, yAxis.bottom + 10);
                }
              });
            },
          },
        ],
        options: {
          maintainAspectRatio: false,
          plugins: {
            title: {
              display:false,
            },
            legend: {
              display: false,
            },
            tooltip: {
              enabled: false,
            },
            datalabels: {
              anchor: 'end',
              align: 'top',
              offset: 2,
              color: [
                '#aeaeae',
                '#67cef5',
              ],
              font: {
                size: '16px',
                weight: '500',
              },
              formatter: function(value, context) {
                value = parseInt( value );

                if( value > 1000) {
                  value = Math.round( value / 1000 ) + ' K';
                }

                return value;
              }
            }
          },
          barPercentage: 1.0,
          categoryPercentage: 0.9,
          responsive: true,
          scales: {
            yAxis: {
              title: {
                color: '#a2a2a2',
              },
              beginAtZero: true,
              suggestedMax: maximum + 0.1 * maximum,
              grid: {
                display: false,
              },
              ticks: {
                color: '#a2a2a2',
                callback: function(value) {
                  return value > 1000 ? value / 1000 : value;
                },
              },
            },
            xAxis: {
              categoryPercentage: 1.0,
              barPercentage: 1.0,
              ticks: {
                color: '#a2a2a2',
              },
              grid: {
                display: false,
              },
            },
          },
        },
      };

      this.salaryChart = new Chart(
        this.salaryChartEl,
        config,
      )
    } else {
       this.salaryChart.options.scales.yAxis.suggestedMax = maximum + 0.1 * maximum;
       this.salaryChart.data.datasets[0].data = [oldSalary, newSalary];
       this.salaryChart.update();
    }
  }

  updateTimeChart(el, value, startValue)
  {
    if( !el ) {
      return;
    }

    const base = 31.42;
    const percentage = value / 0.12;
    let angleOffset = Calculator.calculateOffsetAngle(startValue);

    let angle = Math.round(360 * value / 12 - angleOffset);

    if(angle >= 360 ) {
      angle = 360 - angle;
    }

    angle = angle * (Math.PI / 180);
    let x = Math.round(50 * Math.cos(angle));
    let y = Math.round(50 * Math.sin(angle));

    let endValue = value + startValue > 13 ? startValue + value - 12 : startValue + value;
    endValue = Calculator.decimalsToTime(endValue);
    let label = el.closest('.time-chart').querySelector('.time-chart-label-active');

    const k = 20;
    label.innerText = endValue;
    label.style.top = 50 + y + k * y / 100 + '%';
    label.style.left = 50 + x + k * x / 100 + '%';
    let circle = el.querySelector('.active-circle');
    circle.setAttribute('stroke-dasharray', `${percentage * base /100} ${base}`);
  }

  static calculateSave(revenue, hoursPerWeek, hoursNonRevenue, newRevenue, commuting)
  {
    let oldHours = (hoursPerWeek + commuting) / 5;
    let oldHoursRate = Math.round( revenue / (( hoursPerWeek - hoursNonRevenue) * 46) );
    let hoursNoWasting = parseFloat((newRevenue / oldHoursRate / 230).toFixed(2));
    //let freeHoursPerWeek = Math.round(5 * (( hoursPerWeek + commuting ) / 5 - hoursNoWasting ) - 2 );
    let hoursPerDay = ( hoursPerWeek + commuting ) / 5;

    return {
      oldHours,
      hoursNoWasting,
      timeSavingPercentage: 100 - Math.round(( hoursNoWasting / (hoursPerDay / 100) )),
    }
  }

  static decimalsToTime( decimal ) {
    let hour = Math.floor(decimal);
    let decpart = decimal - hour;
    decpart = (1 / 60) * Math.round( decpart / ( 1 / 60 ));
    let minute = Math.floor( decpart * 60 );
    if(minute === 0) {
      minute = '';
    } else {
      minute = ':15';
    }

    if( minute > 15) {
      minute = ':30';
    }

    if( minute > 30 ) {
      minute = ':45';
    }


    return hour + minute;
  }

  static calculateOffsetAngle( value ) {
    let offset;

    if( value === 3 ) {
      offset = 0;
    } else if( value > 3 && value < 9 ) {
      offset = 3 - value;
    } else if( value === 9 ) {
      offset = 6;
    } else if( value > 9 ) {
      offset = 3 + 12 - value;
    } else {
      offset = value - 3;
    }

    return 360 * offset / 12;
  }

  static maybePluralize(count, noun, suffix = 's') {
    count = Math.abs(count);
    return `${count} ${noun}${count >= 2 ? suffix : ''}`;
  }
}

