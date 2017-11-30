require('./bootstrap');

window.Vue = require('vue');


var VueTruncate = require('vue-truncate-filter');
Vue.use(VueTruncate);

Vue.component('item-loja', require('./components/ItemLoja.vue'));
Vue.component('lista-de-lojas', require('./components/ListaDeLojas.vue'));

Vue.component('cardapio', require('./components/Cardapio.vue'));
Vue.component('loja', require('./components/Loja.vue'));

const app = new Vue({
    el: '#app'
});
