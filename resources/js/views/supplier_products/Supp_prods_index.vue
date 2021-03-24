
<template>
     <div class='mainDiv'>
        <router-link to="supplierProduct_create" class="nav-link"><button class='btn'>Add supply</button></router-link>
        <table class="table table-bordered">
            <thead>
                <td>Supplier</td>
                <td>Product</td>
                <td>Date</td>
                <td></td>
            </thead>
            <tbody>
                <tr v-bind:key="supply.supplyId" v-for="supply in supplies">
                    <td>{{supply.supplierName}}</td>
                    <td>{{supply.productName}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                    
                            <ul class="dropdown-menu" role="menu">

                                <li><router-link :to="{name:'supplierProduct_show',params:{id:supply.supplyId}}" class="">View</router-link></li>

                                <!--<li><a href="{{route('supplierProduct.edit',$supp_product->id)}}">Update</a></li> -->

                                <span class='deleteSpan' v-on:click="dropDetail(supply.supplyId)">Delete</span>

                                
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
    name: 'Supp_prods_index',
    components:{

    },
    data() {
        return {
            supplies:[]
        }
    },
    mounted:{

    },
    methods:{
         dropDetail(detailId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/supplierProduct/"+detailId,{_method:'DELETE'})
                .then((res)=>{window.location.reload();})
                .catch(err => console.log(err));
                this.$router.push('supplierProduct_index');
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/supplierProduct')
            //.then(res => console.log(res.data))
            .then(res => this.supplies = res.data)
            .catch(err => console.log(err));
    }
};
</script>
   