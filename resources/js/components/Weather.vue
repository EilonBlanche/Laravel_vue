<template>
    <b-card header-bg-variant="primary" header-text-variant="white" border-variant="dark" header-tag="header" footer-tag="footer" v-on:return-items="$emit('return-items')" >
      <template #header>
          
        <h3 v-if="city !== null" class="mb-0" v-b-toggle.collapse-1><b-icon icon="cloud-fill"></b-icon> {{city + "- "}}  Weather Update</h3>
        <h3 v-if="city === null" class="mb-0"><b-icon icon="cloud-fill"></b-icon>  Weather Update</h3>
      </template >
      <b-collapse id="collapse-1">
        <light-timeline :items='weatheritems'></light-timeline>
        <template #footer>
            End of Page
        </template>
      </b-collapse>
      
      <template #footer>
          Click Title to Show
      </template>
    </b-card>
</template>

<script>
    
    export default {
        props : {
            city : "",
            weatheritems : {
                type : Array,
                default : []
            }
        }
    }
</script>

<style scoped>
</style>