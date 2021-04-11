<template>
      <!-- <b-card> -->
        <div v-bind:class="togglecontents ? 'adjusted' : 'not-adjusted'">
            <br>
            <b-card class="custom-container">    
              <b-container>        
                <b-row>
                    <b-col cols="6">
                      <b-form-group label-cols-sm="6" label-cols-lg="6" content-cols-sm content-cols-lg="6" description="Select a city" label="Select a city">
                        <b-form-select id="selected-city" v-bind:options="options" v-on:change="setCity" cols="6"></b-form-select>
                      </b-form-group>
                    </b-col>
                    <b-col cols="6">
                      <b-form-group label-cols-sm="6" label-cols-lg="6" content-cols-sm content-cols-lg="6" description="Select a category" label="Select venue category">
                        <b-form-select id="selected-category" v-bind:options="categories" cols="6" v-on:change="setCategory" ></b-form-select>
                      </b-form-group>
                    </b-col>
                </b-row>
              </b-container>
            </b-card>
            <br>
            <b-row class="custom-container">
                  <b-container>
                     <Alert v-bind:showAlert="showAlert" textDisplay="No city was selected! "></Alert>
                    <div v-show="!showAlert">
                      <Weather v-bind:city="selectedCity" v-bind:weatheritems="weatheritems"></Weather>
                    </div>
                  </b-container>
                </b-col>
            </b-row>
            <b-row class="custom-container">
                  <b-container>
                    <Places v-bind:venueitems="venueitems" v-bind:city="selectedCity"></Places>
                  </b-container>
            </b-row>
        </div>
      <!-- </b-card> -->
        
</template>

<script>
    export default {
        async mounted() {
          const data = await axios.get('/categories');
          this.categories = (data.data.data.categories).map((category) => { 
            const newdata = {};
            newdata.value = category.id;
            newdata.text = category.name;
            return newdata;
          });
          
        },
        data(){
          return {
            categories : [],
            selectedCity : null,
            selectedCategory : null,
            options: [
              { value: 'Tokyo', text: 'Tokyo' },
              { value: 'Kyoto', text: 'Kyoto' },
              { value: 'Yokohama', text: 'Yokohama' },
              { value: 'Osaka', text: 'Osaka' },
              { value: 'Sapporo', text: 'Sapporo' },
              { value: 'Nagoya', text: 'Nagoya' }
            ],
            showAlert : false
          }
        },
        props : {
          togglecontents : Boolean,
          weatheritems : {
            type : Array,
            default : []
          },
          venueitems : {
            type : Array,
            default : []
          }
        },
        methods : {
          setCity : async function(city){ 
              if(city !== null)
              {
                  this.selectedCity = city;
                  this.showAlert = false;
                  
                  const data = await axios.get('/weather', { params : { query : city, cnt : 5 }  });
                  this.$emit("set-weather-items", data.data.data)

              }
              else{
                
                this.showAlert = true;
              }
          },
          setCategory : async function(category){ 
                this.selectedCategory = category;
                const data = await axios.get('/venues', { params : { category : category, city : this.selectedCity }  });
                this.$emit("set-venue-items", data.data.data.venues)
              
          }
        }
    }
</script>

<style scoped>
  .adjusted {
    margin-left: 320px;
  }

  .not-adjusted{
    margin-left: 0px;
    width: 100%;
  }

  .custom-container{
    margin-left: 5%;
    margin-right: 5%;
    margin-bottom : 30px;
    width : 90%;
  }
  /* .custom-container{
    width : 40%;
    margin : 20px;
  } */
</style>