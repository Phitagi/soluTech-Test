<template>
        <div>
            <div class='pageHedDiv' style='padding:0px 50px;'><h3>Edit product</h3></div>
            <form @submit="updateProduct"  class='createProdForm'>
                <div class="form-group">
                    <label for="username">Product name : {{product.name}}</label>
                    <input class="form-control" placeholder="" type="text" name="name" v-model="form.namee"   required>
                </div>

                <div class="form-group">
                    <label for="username">Description : {{product.description}}</label>
                    <textarea class="form-control" v-model="form.description" name="description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="username">Quantity : {{product.quantity}}</label>
                    <input class="form-control" placeholder="" type="number" v-model="form.quantity" name="quantity" required>
                </div>

                <input class="form-control" type="submit" name="updProduct" value="submit">
            </form>
        </div>
</template>

<script>

export default {
    name: 'Products_edit',
    components:{
        
    },
    data() {
        return {
            productid:0,
            product:[],
            form:{
                namee:'',
                description:'',//this.product.description,
                quantity:0//this.product.quantity
            }
        }
    },
    created(){
        this.productid=this.$route.params.id;

        //this.$route.query.product;
        //console.log(this.$route.query.product);
        axios.get('http://127.0.0.1:8000/api/products/'+this.productid)
            .then((res) =>{this.fillFields(res.data)})
            .catch(err => console.log(err));
    },
    mounted:{

    },
    methods:{
        updateProduct(e){
            e.preventDefault();
            axios.post('http://127.0.0.1:8000/api/products/'+this.productid,{_method:'PUT',namee:this.form.namee,description:this.form.description,quantity:this.form.quantity})
                .then(res => console.log(res.data))
               .catch(err => console.log(err));
            this.$router.push('products_index');

        },
        fillFields(product){
            this.form.namee = product.name;
            this.form.description = product.description;
            this.form.quantity = product.quantity;   
        }
    }
}
</script>