
<template>
     <div class='mainDiv'>
        <div class='pageHedDiv' style='padding:0px 50px;'><h3>New suplier</h3></div>
        <form @submit="addSupplier" class='createSuppForm'>
            <div class="form-group">
                <label for="username">Supplier name</label>
                <input class="form-control" placeholder="" type="text" name="name" v-model="namee" required>
            </div>
            <input class="form-control" type="submit" name="subSupplier" value="submit">
        </form>
    </div>
</template>

<script>

export default {
    name: 'Suppliers_create',
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
         addSupplier(e){
            e.preventDefault();
            axios.post('http://127.0.0.1:8000/api/supplier',{namee:this.namee})
                .then(res => console.log(res.data))
               .catch(err => console.log(err));
               this.$router.push('suppliers_index');
        }
    }
};
</script>
