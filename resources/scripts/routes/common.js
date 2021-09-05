import menu from '../modules/Menu';
import Swiper from 'swiper/bundle';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/modal';
import lozad from 'lozad'
import AnimatedHeader from "../modules/AnimatedHeader";


export default {
  init() {

    new AnimatedHeader({
      header: document.querySelector('.banner'),
      changeHeaderOn: 150,
    });

    const onAnimationEnd = event => {
      event.target.classList.add('animation-end');
    };

    const observer = lozad('.lozad', {
      loaded: el => {
        if( el.dataset.animation ) {
          el.classList.add('animated', el.dataset.animation);
          el.addEventListener('animationend', onAnimationEnd);
        } else {
          el.classList.add('loaded');
        }
      },
    });
    observer.observe();

    //Init the menu

    menu();

    //Section Sliders

    let sliders = document.querySelectorAll('.section-line__slider');

    if( sliders ) {
      sliders.forEach( slider => {
        new Swiper(slider, {
          loop: true,
          autoplay: {
            delay: 8000,
          },
          navigation: {
            nextEl: slider.querySelector('.swiper-button-next'),
            prevEl: slider.querySelector('.swiper-button-prev'),
          },
        });
      })
    }

    //Change text on expand btn

    document.body.addEventListener('click', ( event ) => {
      if( event.target.classList.contains('expand-btn') ) {
        let target = event.target.dataset.bsTarget;

        if( ! target  ) {
          return;
        }

        let buttons = document.querySelectorAll(`[data-bs-target="${ target }"]`);

        if( buttons ) {
          buttons.forEach( button => {
            const text = button.innerText;
            const newText = button.dataset.text;

            if( newText ) {
              button.innerText = newText;
              button.dataset.text = text;
            }
          } );
        }

        let wrapper = event.target.closest('.job-box');

        if( wrapper ) {
          wrapper.classList.toggle('job-box-expanded');
        }

      }
    })

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
