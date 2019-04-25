import user from './mixins/user'
import pluralize from './mixins/pluralize'
import highlight from './directives/highlight'

require('./bootstrap');

window.Vue = require('vue');

Vue.component('comments', require('./components/comments/Comments.vue').default);

/**
 * Mixins
 */
Vue.mixin(user)
Vue.mixin(pluralize)


const app = new Vue({
    el: '#app'
});
