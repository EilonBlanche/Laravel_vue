<template>
    <div>
        
        <NavBar v-on:show-sidebar="adjustContent" v-bind:togglecontents="togglecontents" ></NavBar>
        <!-- <SideBar v-bind:togglecontents="togglecontents"></SideBar> -->
        <Content v-bind:togglecontents="togglecontents" v-on:set-weather-items="setWeatherItems" v-bind:venueitems="venueitems" v-bind:weatheritems="weatheritems"></Content>
        
    </div>
</template>

<script>

    export default {
        data(){
            return {
                togglecontents : false,
                weatheritems : [],
                venueitems : []
            }
        },
        methods : {
            adjustContent : function(data){
                this.togglecontents = !data;
            },
            changeDateandTime(datePassed)
            {
                let parts = datePassed.split(" ")
                let newdate = moment(parts[0], 'YYYY-MM-DD').format('MM/DD/YYYY');
                let newtime = moment(parts[1], 'HH:mm:ss').format('h:mm A');
            
                return newdate+" "+newtime;
            },
            getDate(datePassed)
            {
                let parts = datePassed.split(" ")
                let newdate = moment(parts[0], 'YYYY-MM-DD').format('MM/DD/YYYY');
                let newtime = moment(parts[1], 'HH:mm:ss').format('h:mm A');

                return newdate+" "+newtime;
            },
            setWeatherItems : function(data) {
                this.weatheritems = data.map((item, index) => {
                        
                        return {
                            tag: this.changeDateandTime(item['dt_txt']), 
                            htmlMode: true, 
                            content: `<ul class="list-group">
                                                <li class="list-group-item">Temperature (<span>&#8451;</span>:<strong>) ${ (item['main'].temp_min - 273.15).toFixed(2) } to ${ (item['main'].temp_max - 273.15).toFixed(2) }</strong></li>
                                                <li class="list-group-item">Weather Condition : <strong> ${ item['weather'][0].main == "Clouds" ? "Cloudy" : item['weather'][0].main }</strong></li>
                                                <li class="list-group-item">Description : <strong> ${ item['weather'][0].description } </strong></li>
                                                <li class="list-group-item">Chance of Rain : <strong> ${ item['pop'] }% </strong></li>
                                    </ul>` 
                        }
                });
            }
        }
    }
</script>

<style>
</style>