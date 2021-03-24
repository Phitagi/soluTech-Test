<template>
        <div class='mainDiv ordersDiv'>
            <h4>Orders</h4>
            <router-link to="products_index" class="nav-link">Make order</router-link>
            <table class="table table-bordered">
                <thead>
                    <td>{{r=1}}</td>   
                    <td>Order_number</td>
                    <td></td>
                </thead>
                <tbody> 
                    <tr v-bind:key="order.id" v-for="order in orders">
                        <td>{{r++}}</td>
                        <td>{{order.order_number}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                        
                                <ul class="dropdown-menu"  role="menu">

                                    <li><router-link :to="{name:'orders_show',params:{id:order.id}}" class="">View</router-link></li>

                                    <!--<li><router-link :to="{name:'orders_edit',params:{id:order.id}}" class="">Update</router-link></li>-->
                                    
                                    <li class='deleteLi' v-on:click="dropOrder(order.id)">Delete</li>
                                    
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
    name: 'Orders_index',
    components:{

    },
    data() {
        return {
            orders:[]
        }
    },
    mounted:{

    },
    methods:{
         dropDetail(detailId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/orderDetail/"+detailId,{_method:'DELETE'})
                .then((res)=>{window.location.reload();})
                .catch(err => console.log(err));
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/order')
            .then(res => this.orders = res.data)
            .catch(err => console.log(err));
    }
};
</script>