/**
 * External Dependencies
 */


// import local dependencies
import Router from './util/Router';
import domReady from "./util/domReady";

import common from './routes/common';
import withSectorSelect from './routes/withSectorSelect';
import withCalculator from './routes/withCalculator';
import jobList from './routes/jobList';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  withSectorSelect,
  withCalculator,
  jobList,
});

domReady( () => {
  routes.loadEvents();
});
