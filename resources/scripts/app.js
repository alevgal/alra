/**
 * External Dependencies
 */


// import local dependencies
import Router from './util/Router';
import domReady from "./util/domReady";

import common from './routes/common';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
});

domReady( () => {
  routes.loadEvents();
});
