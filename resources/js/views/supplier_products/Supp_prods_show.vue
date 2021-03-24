
<template>
    <div class='mainDiv productDiv'>
        <router-link to="supplierProduct_index" class="nav-link"><button class='btn'>Back</button></router-link>
        <table class="table table-bordered">
            <thead>
                <td>Supplier</td>
                <td>Product</td>
                <td></td>
            </thead>
            <tbody>
                <tr>
                    <td>{{supplyDetails.supplierName}}</td>
                    <td>{{supplyDetails.productName}}</td>
                    <td>
                        <span class='deleteSpan' v-on:click="dropDetail(supplyDetails.supplyId)">Delete</span>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    name: 'Supp_prods_show',
    components:{

    },
    data() {
        return {
            supplyDetails:[],
            supplyid:0
        }
    },
    mounted:{

    },
    methods:{
         dropDetail(detailId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/supplierProduct/"+detailId,{_method:'DELETE'})
                .then(res=>res.data)
                .catch(err => console.log(err));
                this.$router.push('supplierProduct_index');
        }
    },
    created(){
        this.supplyid=this.$route.params.id;
        //this.$route.query.product;
        //console.log(this.$route.query.product);
        axios.get('http://127.0.0.1:8000/api/supplierProduct/'+this.supplyid)
            .then(res =>this.supplyDetails=res.data)
            .catch(err => console.log(err));
    }
};
</script>
  