
<template>
<nav class="navbar navbar-expand-md navbar-light bg-light">  
    <router-link to="products_index" class="nav-link"><h4>Solutech store</h4></router-link>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbarUl">
            <!-- Authentication Links -->
            <router-link to="products_index" class="nav-link">Products</router-link>
            <router-link to="orders_index" class="nav-link">Orders</router-link>
            <router-link to="suppliers_index" class="nav-link">Suppliers</router-link>
            <router-link to="supplierProduct_index" class="nav-link">Supply</router-link>
            <router-link to="cart.show" class="nav-link">Cart</router-link>
        </ul>
    </div>
</nav>
</template>

<script>

export default {
    name:'header',
    components:{

    },
    data() {
        return {
            message:'Hello World'
        }
    },
    mounted:{

    },
    methods:{
        
    }
};
</script>