
<template>
    <div class='mainDiv'>
        <div class='pageHedDiv' style='padding:0px 50px;'><h3></h3></div>
         <table class="table table-bordered">
            <thead>
                <td>Order number</td>
                <td>Product</td>
                <td></td>
            </thead>
            <tbody >
                <tr v-bind:key="detail.detailId" v-for="detail in order_details">
                    <td>{{detail.order_number}}</td>
                    <td>{{detail.productName}}</td>
                    <td>
                        <span class='deleteSpan' v-on:click="dropDetail(detail.detailId)">Delete</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    name: 'Orders_show',
    components:{

    },
    data() {
        return {
            orderid:0,
            order_details:[]
        }
    },
    mounted:{

    },
    methods:{
         dropDetail(detailId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/orderDetail/"+detailId,{_method:'DELETE'})
                .then(res)
                .catch(err => console.log(err));
                this.$router.push('orders_index');
        }
    },
    created(){
        this.orderid=this.$route.params.id;
        //this.$route.query.product;
        //console.log(this.$route.query.product);
        axios.get('http://127.0.0.1:8000/api/order/'+this.orderid)
            .then(res =>this.order_details=res.data)//this.order_details=res.data)
            .catch(err => console.log(err));
    }
};
</script>
<style>
    .deleteSpan{cursor:pointer;}
</style>