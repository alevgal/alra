import menu from '../modules/Menu';
import Swiper from 'swiper/bundle';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/modal';


export default {
  init() {
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
        let button = event.target;
        const text = button.innerText;
        const newText = button.dataset.text;
        let wrapper = button.closest('.job-box');

        if( wrapper ) {
          wrapper.classList.toggle('job-box-expanded');
        }

        if( newText ) {
          button.innerText = newText;
          button.dataset.text = text;
        }
      }
    })

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
