<template>
    <div>
        <Navbar />
        <router-view />
    </div>
</template>
<script>
const default_layout = "default";

import Navbar from './layouts/Navbar';
import {createPopper} from '@popperjs/core';

export default {
  name: 'app',
  components:{
     Navbar,
     createPopper
  },
  computed: {},
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

<style scoped>
    a,ul{text-decoration: none !important; list-style: none;}
    .navbarUl{width:2;padding:5px; display:flex; flex-direction: row; justify-content: space-between; }
    li{float: unset !important; padding:5px;}
    .mainDiv{width:80%; margin:0 auto;} 
    .productsDiv table{ width:100%; text-align:center; }
    input[type=submit]{background-color:silver;}
    textarea{resize:vertical;}
    /*create*/
    .createProdForm{width:100%; padding:10px 50px;}
    .createProdForm input{width:2; border-radius:4px; padding:2;}

    /*delete*/
    .tableDelBut{background-color: white !important; border:none;}
    
    .drop-menu{display:none;}
    .deleteSpan{cursor:pointer;}
    .dropdown-menu{display:inline-block !important;}
</style>