import Vue from 'vue';
import Router from 'vue-router';

import app from './views/app.vue';
import Orders_index from './views/orders/Orders_index.vue';
import Orders_create from './views/orders/Orders_create.vue';
import Orders_edit from './views/orders/Orders_edit.vue';
import Orders_show from './views/orders/Orders_show.vue';

import Products_index from './views/products/Products_index.vue';
import Products_create from './views/products/Products_create.vue';
import Products_edit from './views/products/Products_edit.vue';
import Products_show from './views/products/Products_show.vue';

import Supp_prods_index from './views/supplier_products/Supp_prods_index.vue';
import Supp_prods_create from './views/supplier_products/Supp_prods_create.vue';
import Supp_prods_edit from './views/supplier_products/Supp_prods_edit.vue';
import Supp_prods_show from './views/supplier_products/Supp_prods_show.vue';


import Suppliers_edit from './views/suppliers/Suppliers_edit.vue';
import Suppliers_create from './views/suppliers/Suppliers_create.vue';
import Suppliers_index from './views/suppliers/Suppliers_index.vue';
import Suppliers_show from './views/suppliers/Suppliers_show.vue';

import Cart from './views/Cart.vue';

Vue.use(Router)

export default new Router({
    routes: [
    {
        path: '/',
        name: 'app',
        component: Products_index
    },   
    {
        path: '/products_index',
        name: 'products_index',
        component: Products_index
    },
    {
        path: '/products_create',
        name: 'products_create',
        component: Products_create
    },
    {
        path: '/products_edit?:id',
        name: 'products_edit',
        component: Products_edit,
        props:true
    },
    {
        path: '/products_show',
        name: 'products_show',
        component: Products_show
    },

    {
        path: '/orders_index',
        name: 'orders_index',
        component: Orders_index
    },
    {
        path: '/orders_create',
        name: 'orders_create',
        component: Orders_create
    },
    {
        path: '/orders_edit',
        name: 'orders_edit',
        component: Orders_edit
    },
    {
        path: '/orders_show?:id',
        name: 'orders_show',
        component: Orders_show,
        props:true
    },
    {
        path: '/suppliers_index',
        name: 'suppliers_index',
        component: Suppliers_index
    },    
    {
        path: '/suppliers_edit?:id',
        name: 'suppliers_edit',
        component: Suppliers_edit
    },    
    {
        path: '/suppliers_create',
        name: 'suppliers_create',
        component: Suppliers_create
    },        
    {
        path: '/suppliers_show',
        name: 'suppliers_show',
        component: Suppliers_show
    },    
    {
        path: '/supplierProduct_index',
        name: 'supplierProduct_index',
        component: Supp_prods_index
    }, 
    {
        path: '/supplierProduct_create',
        name: 'supplierProduct_create',
        component: Supp_prods_create
    },   
    {
        path: '/supplierProduct_edit',
        name: 'supplierProduct_edit',
        component: Supp_prods_edit
    }, 
    {
        path: '/supplierProduct_show?:id',
        name: 'supplierProduct_show',
        component: Supp_prods_show,
        props:true
    }, 
    {
        path: '/cart_show',
        name: 'cart_show',
        component: Cart
    }
    ]
})