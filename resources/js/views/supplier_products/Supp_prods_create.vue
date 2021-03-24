<template>
    <div class='mainDiv'>
        <div class='pageHedDiv' style='padding:0px 50px;'><h3>New supply</h3></div>
        <form @submit="addSupply" class='createSuppForm'>
            <div class="form-group">
                <label for="">Supplier</label>
                <select name='supplier_id' class="form-control" v-model="supplierId" required>
                    <option v-bind:key="supplier.id" v-for="supplier in suppliers"  v-bind:value="supplier.id">{{supplier.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Products</label>
                <select name='product_id' class="form-control" v-model="productId" required>
                    <option v-bind:key="product.id" v-for="product in products" v-bind:value="product.id">{{product.name}}</option>
                </select>
            </div>
            <input class="form-control" type="submit" name="subSupply" value="submit">
        </form>
    </div>
</template>


<script>

export default {
    name: 'Supp_prods_create',
    components:{

    },
    data() {
        return {
            suppliers:[],
            products:[],
            supplierId:0,
            productId:0
        }
    },
    mounted:{

    },
    methods:{
        addSupply(e){
            e.preventDefault();
            axios.post('http://127.0.0.1:8000/api/supplierProduct',{supplier_id:this.supplierId,product_id:this.productId})
                .then(res => console.log(res.data))
               .catch(err => console.log(err));
               this.$router.push('supplierProduct_index');
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/supplier')
            .then(res =>this.suppliers=res.data)
            .catch(err => console.log(err));
        axios.get('http://127.0.0.1:8000/api/products')
            .then(res =>this.products=res.data)
            .catch(err => console.log(err));
    }
};
</script>