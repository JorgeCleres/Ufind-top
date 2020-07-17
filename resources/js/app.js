/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from '../plugins/vuetify'
import Vuex from 'Vuex';
Vue.use(Vuex);


//Vuex
const store = new Vuex.Store({
  state:{
    item:{}
  },
  mutations:{
    setItem(state,obj){
      state.item = obj;
    }
  }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example', require('./components/ExampleComponent.vue').default);
Vue.component('botao', require('./components/Botao.vue').default);
Vue.component('border', require('./components/Border.vue').default);
Vue.component('mapa', require('./components/Mapa.vue').default);
Vue.component('link-botao', require('./components/LinkBotao.vue').default);
Vue.component('card-meu-produto', require('./components/CardMeusProduto.vue').default);
Vue.component('card-anuncio', require('./components/CardAnuncios.vue').default);
Vue.component('column', require('./components/Column.vue').default);
Vue.component('formulario', require('./components/Formulario.vue').default);
Vue.component('modal', require('./components/modal/Modal.vue').default);
Vue.component('modal-link', require('./components/modal/ModalLink.vue').default);
Vue.component('label-form', require('./components/LabelForm.vue').default);
Vue.component('menu-nav', require('./components/MenuNav.vue').default);

import * as VueGoogleMaps from 'vue2-google-maps'
 
Vue.use(VueGoogleMaps, {
  load: {
    //key: 'AIzaSyAWAkZ64JH2YCr7z6-rhYi13K4Z3uy3Ow0',
    libraries: 'places', // This is required if you use the Autocomplete plugin
    // OR: libraries: 'places,drawing'
    // OR: libraries: 'places,drawing,visualization'
    // (as you require)
 
    //// If you want to set the version, you can do so:
    // v: '3.26',
  },
 
  //// If you intend to programmatically custom event listener code
  //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
  //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
  //// you might need to turn this on.
  // autobindAllEvents: false,
 
  //// If you want to manually install components, e.g.
  //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
  //// Vue.component('GmapMarker', GmapMarker)
  //// then disable the following:
  // installComponents: true,
})


    function limite(){
        alert("olá")
    }


const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    store,
    mounted: function() {
      document.getElementById('app').style.display = "block";
    }
});
