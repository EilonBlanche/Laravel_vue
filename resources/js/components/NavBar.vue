<template>
    <b-navbar v-bind:class="togglecontents ? 'adjusted' : ''" toggleable type="dark" variant="dark" >
      <b-navbar-brand href="#">
          
      <!-- <b-navbar-toggle target="sidebar-1" v-on:click="showsidebar(togglecontents)" > -->
      </b-navbar-toggle>
          Travel App
      </b-navbar-brand>
    </b-navbar>
</template>

<script>
    export default {
        props : {
          togglecontents : Boolean
        },
        methods: {
          showsidebar : function(data){
            this.$emit('show-sidebar', data)
          } 
        }
    }
</script>

<style scoped>
  .adjusted {
    margin-left: 320px;
  }
</style>