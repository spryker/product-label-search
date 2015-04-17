'use strict';

var $ = require('jquery'),
    spinner = require('./ui/spinner'),
    search = require('./ui/search'),
    cart = require('./ui/shopping-cart'),
    overlay = require('./ui/overlay'),
    loginForm = require('./ui/login-form');

$(function() {
  spinner.init();
  search.init();
  cart.init();
  overlay.init();
  loginForm.init();
});
