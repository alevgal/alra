export default class AnimatedHeader {
  constructor(args) {
        this.docElem = document.documentElement;
        this.header = args.header;
        this.changeHeaderOn = args.changeHeaderOn || 300;
        this.didScroll = false;
        //this.prevScrollPos = window.pageYOffset;


      this.addListeners();
  }

  addListeners() {
    window.addEventListener( 'scroll', () => {
      if( !this.didScroll ) {
        this.didScroll = true;
        setTimeout( this.scrollPage.bind(this), 250 );
      }
    });
  }

  scrollPage() {
    let sy = this.scrollY();

    if ( sy >= this.changeHeaderOn ) {
      this.header.classList.add('header-scroll');
      //
      // if (this.prevScrollPos < sy) {
      //   if( ! this.header.classList.contains('hideOnScroll') ) {
      //     this.header.classList.add('hideOnScroll');
      //   }
      // } else {
      //   if( this.header.classList.contains('hideOnScroll') ) {
      //     this.header.classList.remove('hideOnScroll');
      //   }
      // }

    }
    else {
      this.header.classList.remove('header-scroll');
    }

  //  this.prevScrollPos = sy;

    this.didScroll = false;
  }

  scrollY() {
    return window.pageYOffset || this.docElem.scrollTop;
  }
}
