
<template>
    <div class='mainDiv'>
        <div class='pageHedDiv' style='padding:0px 50px;'><h3>Edit Supplier's details</h3></div>
        <form @submit="updateSupplier" class='updateSuppForm'> 
            <div class="form-group">
                <label for="username">Supplier name</label>
                <input class="form-control" placeholder="" type="text" v-model="form.namee" name="name" required>
            </div>

            <input class="form-control" type="submit" name="updSupplier" value="submit">
        </form>
    </div>
</template>

<script>

export default {
    name: 'Suppliers_edit',
    components:{
        
    },
    data() {
        return {
            supplierId:0,
           form:{
               namee:''
           }
        }
    },
    mounted:{

    },
    methods:{
        updateSupplier(e){
            e.preventDefault();
            axios.post('http://127.0.0.1:8000/api/supplier/'+this.supplierId,{_method:'PUT',namee:this.form.namee})
                .then(res => console.log(res.data))
               .catch(err => console.log(err));
            this.$router.push('suppliers_index');
        },
        fillFields(supplier){
            this.form.namee = supplier.name;
        }
    },
    created(){
         this.supplierId=this.$route.params.id;

        //this.$route.query.product;
        //console.log(this.$route.query.product);
        axios.get('http://127.0.0.1:8000/api/supplier/'+this.supplierId)
            .then((res) =>{this.fillFields(res.data)})
            .catch(err => console.log(err));
    }
};
</script>
