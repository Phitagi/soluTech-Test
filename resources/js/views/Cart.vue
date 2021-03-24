
<template>
    <div class='cartDiv'>
    <h1>CART</h1>

        <table class="table table-condensed table-bordered table-responsive table-hover">
            <thead>
                <td>Product</td>
                <td></td>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class='makeOrderDiv'><button>Order</button></div>
    </div>

</template>

<script>

export default {
    name: 'Cart',
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
        
    }
};
</script>
