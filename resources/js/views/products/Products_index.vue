
<template>
    <div class='mainDiv productsDiv'>

    <h4>Products</h4>

    <router-link to="products_create" class=""><button class='btn'>Add product</button></router-link>

    <table class="table table-bordered">
        <thead>
            <td>Name</td>
            <td>Description</td>
            <td>Quantity</td>
            <td></td>
        </thead>
        <tbody >
            <tr v-bind:key="product.id" v-for="product in products">
                <td>{{product.name}}</td>
                <td>{{product.description}}</td>
                <td>{{product.quantity}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dtoggle" lang=0 data-toggle="dropdown" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                
                        <ul class="dropdown-menu" role="menu">
                            <input type='hidden' v-model="cartProd" value='pproduct'>
                            <!--<li class='addtocartLi' v-on:click="addCart"><a href="">Add to cart</a></li> -->
                            <li class='addtocartLi' v-on:click="order(product.id)">Order</li>                            
                            <!--<li><router-link to="products_show" class="">View</router-link></li>-->
                            <li><router-link :to="{name:'products_edit',params:{id:product.id}}" class="">Update</router-link></li>
                            <li class='deleteLi' v-on:click="dropProduct(product.id)">Delete</li>
                        </ul>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

        </div>
</template>

<script>

export default {
    name: 'Products_index',
    components:{

    },
    data() {
        return {
            products: [],
            cartProd:''
        }
    },
    methods:{
        dropProduct(productId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/products/"+productId,{_method:'DELETE'})
                .then((res)=>{window.location.reload();})
                .catch(err => console.log(err));
        },
        order(productId){
             axios.post("http://127.0.0.1:8000/api/order",{productId:productId})
                .then(res=>res.data)
                .catch(err => console.log(err));
        },
    },
    created(){ 
        axios.get('http://127.0.0.1:8000/api/products')
            //.then(res => console.log(res.data))
            .then(res => this.products = res.data)
            .catch(err => console.log(err));
    }
}
</script>

<style scoped>
    /*.mainDiv2{width:80%; margin:0 auto;} */ 
        .drop-menu{display:none;}
</style>
