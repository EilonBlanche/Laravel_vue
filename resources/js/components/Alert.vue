<template>
    <b-alert v-model="showAlert" variant="danger" dismissible>
        
        <h4 class="alert-heading">Error !</h4>
        <hr/>
        <p>{{ this.textDisplay }}</p>
        <p class="mb-0">
            Please select a city in the city dropdown. Click 'x' to dismiss
        </p>
    </b-alert>
    
</template>

<script>
    export default {
        props : {
            showAlert : {
                type : Boolean,
                default : true
            },
            textDisplay : {
                type : String,
                default : "Something Went Wrong !"
            }
        }
    }
</script>

<style>
</style>