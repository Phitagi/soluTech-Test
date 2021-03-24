
<template>
     <div class='mainDiv suppliersDiv'>
        <router-link to="suppliers_create" class="nav-link"><button class='btn'>Add supplier</button></router-link>
    <table class="table table-bordered ">
            <thead>
                <td>Name</td>
                <td></td>
            </thead>
            <tbody>
                <tr v-bind:key="supplier.id" v-for="supplier in suppliers">
                    <td>{{supplier.name}}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                    
                            <ul class="dropdown-menu" role="menu">
                                <!--<li><router-link to="products_show" class="">View</router-link></li>-->
                                <li><router-link :to="{name:'suppliers_edit',params:{id:supplier.id}}" class="">Update</router-link></li>
                                <li class='deleteLi' v-on:click="dropSupplier(supplier.id)">Delete</li>
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
    name: 'Suppliers_index',
    components:{

    },
    data() {
        return {
            suppliers:[]
        }
    },
    mounted:{
        
    },
    methods:{
        dropSupplier(supplierId){
            //e.preventDefault();
           axios.post("http://127.0.0.1:8000/api/supplier/"+supplierId,{_method:'DELETE'})
                .then((res)=>{window.location.reload();})
                .catch(err => console.log(err));
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/supplier')
            //.then(res => console.log(res.data))
            .then(res => this.suppliers = res.data)
            .catch(err => console.log(err));
    }
};
</script>

