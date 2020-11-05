
require('./bootstrap');


window.Vue = require('vue');

import 'bootstrap/js/src/index'

var Turbolinks = require("turbolinks")
Turbolinks.start()


import '../create project form/vendor/jquery/jquery-3.2.1.min.js';
import '../create project form/vendor/animsition/js/animsition.min.js';
// import '../create project form/vendor/bootstrap/js/popper.js';
// import '../create project form/vendor/bootstrap/js/bootstrap.min.js';
import '../create project form/vendor/select2/select2.min.js';
// import '../create project form/vendor/countdowntime/countdowntime.js';
import '../create project form/js/main.js';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
