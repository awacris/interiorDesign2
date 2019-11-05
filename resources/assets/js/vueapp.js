
 import Vue from 'vue'
 import VueRouter from 'vue-router'
 require('./bootstrap');

window.Vue = require('vue');

 Vue.use(VueRouter)

 import App from './components/App'
 import Category from './components/Category'
 import Options from './components/Options'
 import OptionsValue from './components/OptionsValue'
 import Products from './components/Products'
 import ProductOptions from './components/ProductOptions'
 import ProductCombination from './components/ProductCombination'
 import store from './store/index'

 const router = new VueRouter({
     mode: 'history',
     routes: [
         {
             path: '/category-page',
             name: 'category',
             component: Category,
             props: { title: "Category Home" }
         },
         {
            path: '/options-page',
            name: 'options',
            component: Options,
            props: { title: "This is option page" }
        }, 
        {
            path: '/option-values-page',
            name: 'optionValues',
            component: OptionsValue,
            props: { title: "This is optionvalue page" }
        },
        
        {
            path: '/products-page',
            name: 'products',
            component: Products,
            props: { title: "This is  page" }
        },

        {
            path: '/products-option',
            name: 'productOption',
            component: ProductOptions,
            props: { title: "This is  productOption page" }
        },

        {
            path: '/products-combination',
            name: 'productCombination',
            component: ProductCombination,
            props: { title: "This is  productCombination page" }
        },
     ],
 })
 const app = new Vue({
     el: '#app',
     components: { App },
     props: { title: "Welcome Admin" },
     router,
     store,
 });