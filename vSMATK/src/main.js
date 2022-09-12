// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import VueRouter from 'vue-router'
import vueResource from 'vue-resource'
import Aksidentet_smatk from './components/Aksidentet_smatk'
import RrethNesh_smatk from './components/RrethNesh_smatk'
import ShtoAksident_smatk from './components/ShtoAksident_smatk'
import ModifikoAksident_smatk from './components/ModifikoAksident_smatk'

Vue.use(vueResource)
Vue.use(VueRouter)

const router = new VueRouter ({
	mode: 'history',
	base: __dirname,
	routes: [
	  {path: '/', component: Aksidentet_smatk},
		{path: '/RrethNesh_smatk', component: RrethNesh_smatk},
		{path: '/ShtoAksident_smatk', component: ShtoAksident_smatk},
		{path: '/ModifikoAksident_smatk/:NumriAksidentit_SMATK', component: ModifikoAksident_smatk},
	]
})

new Vue({
  router,
   template: `
    <div id="app">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:blue" href="#">vSMATK</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><router-link to="/">Aksidentet</router-link></li>
              <li><router-link to="/RrethNesh_smatk">Rreth SMATK</router-link></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><router-link to="/ShtoAksident_smatk">Shto Aksident</router-link></li>
            </ul>
          </div>
        </div>
      </nav>	
      <router-view></router-view>
    </div>`
}).$mount('#app')