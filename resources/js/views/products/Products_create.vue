<template>
    <div class='mainDiv'>
        <div class='pageHedDiv' style='padding:0px 50px;'><h3>New product</h3></div>
        <form  class='createProdForm' @submit="addProduct">   
            <div class="form-group">
                <label for="">Product name</label>
                <input class="form-control" placeholder="" type="text" v-model="namee" name="name" value="" required>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" v-model="description" name="description" required>}</textarea>
            </div>

            <div class="form-group">
                <label for="">Quantity</label>
                <input class="form-control" placeholder="" type="number" v-model="quantity" name="quantity" value="" required>
            </div>

            <input class="form-control" type="submit" name="subProduct" value="submit">
        </form>
    </div>
</template>


<script>

export default {
    name: 'Products_create',
    components:{
        
    },
    data() {
        return {
            errors:[]
        }
    },
    methods:{
        addProduct(e){
            e.preventDefault();
            axios.post('http://127.0.0.1:8000/api/products',{namee:this.namee,description:this.description,quantity:this.quantity})
                .then(res => console.log(res.data))
               .catch(err => console.log(err));
               this.$router.push('products_index');
        }
    }
};
</script>
