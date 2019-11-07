require('./bootstrap');

window.Vue = require('vue');
import store from './store/index';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-album', require('./components/CreateAlbum.vue').default);
Vue.component('user-albums', require('./components/UserAlbums').default);
Vue.component('manage-albums', require('./components/ManageAlbums').default);
Vue.component('public-albums', require('./components/PublicAlbums').default);

const app = new Vue({
    store,
    el: '#app',
});
