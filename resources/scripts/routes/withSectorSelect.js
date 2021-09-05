export default {
  init() {
    //Init the menu

    let sectorSelector = document.querySelector('#sectors-select');
    let sectorSearchBtn = document.querySelector('#sectors-submit');

    if( sectorSelector ) {
      try {
        $(sectorSelector).select2({
          placeholder: 'Select Sector',
          minimumResultsForSearch: Infinity,
        });
      }
      catch (e) {
        console.log(e);
      }
    }

    if( sectorSearchBtn ) {
      sectorSearchBtn.addEventListener('click', event => {
        event.preventDefault();
        const selected = sectorSelector.value;

        if( selected ) {
          window.location = selected;
        }
      })
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
