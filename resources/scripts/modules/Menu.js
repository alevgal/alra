class Menu {
  constructor() {
    this.openButton = document.querySelector('#menu-open');
    this.closeButton = document.querySelector('#menu-close');
    this.isOpen = false;
    this.attachHandlers();
  }

  attachHandlers() {
    this.openButton.addEventListener('click', Menu.preventDefaults);
    this.closeButton.addEventListener('click', Menu.preventDefaults);
    this.openButton.addEventListener('click', this.open.bind(this));
    this.closeButton.addEventListener('click', this.close.bind(this));
  }

  open() {
    if( ! this.isOpen ) {
      document.body.classList.add('menu-open');
      this.isOpen = true;
    }
  }

  close() {
    if( this.isOpen ) {
      document.body.classList.remove('menu-open');
      this.isOpen = false;
    }
  }

  static preventDefaults(event) {
    event.preventDefault();
    event.stopPropagation();
  }
}

export default () => new Menu()
