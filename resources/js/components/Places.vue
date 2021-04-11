<template>
    <b-card header-bg-variant="primary" header-text-variant="white" border-variant="dark" header-tag="header" footer-tag="footer">
      <template #header>
        <h3 v-if="city !== null" class="mb-0" v-b-toggle.collapse-2><b-icon icon="building"></b-icon> {{city + "- "}}  Places to check</h3>
        <h3 v-if="city === null" class="mb-0"><b-icon icon="building"></b-icon>  Places to check</h3>
      </template>
      <b-collapse id="collapse-2">
        <div id="places-body"></div>
      </b-collapse>
      <template #footer>
          Click Title to Show
      </template>
    </b-card>
</template>

<script>
    
    export default {
        updated() {
            console.log(this.venueitems);
        },
        props : { 
            venueitems : {
                type : Array,
                default : []
            },
            city : null
        }
    }
</script>

<style scoped>
    /* .timeline{
        max-height: 1000px;
        overflow-y: scroll;
    } */
</style>