<template>
<div>
  <div>{{type}}</div>
  <div class="tomtom-map" :id="mapName">{{ mapName }}</div>
</div>
</template>

<script>
  import { eventBus } from '../main';

  export default {
    name: 'tomtom-map',
    props:  ['name'],
    type: 0,
    data: function () {
      return {
        age: 10,
        type: "normal",
        mapName: this.name + "-map",
        map: null,
        markerCoordinates: [{
          latitude: 51.501527,
          longitude: -0.1921837,
          title: "Copenhagen",
          type: "urgent"
        }, {
          latitude: 51.505874,
          longitude: -0.1838486,
          title: "Odense",
          type: "normal"
        }, {
          latitude: 51.4998973,
          longitude: -0.202432,
          title: "Dallas",
          type: "normal"
        }],
      }
    },
    methods: {
      render_map: function() {
          const element = document.getElementById(this.mapName)
          const options = { key: 'BVP38FDUranXCEOUBeXauunx6FDxEwva', 
                            basePath: '/sdk', 
                            center: [51.501527,-0.1921837], 
                            zoom: 15 
                            }
          this.map = new tomtom.L.map(element, options);

          this.markerCoordinates.forEach((coord) => {
            if( coord.type == this.type ) {
                let marker = tomtom.L.marker([coord.latitude,coord.longitude]);
                marker.addTo(this.map)
                marker.bindPopup(coord.type);
                this.markerList.push(marker)
            }
          });
     
      },
    },
    mounted: function() {
      this.render_map()
    },
   
    created() {
      this.markerList = []

      eventBus.$on('showUrgent', (data) => {
          this.type = data;

          this.markerList.forEach(marker => {marker.remove()})

          this.markerList.length = 0
          
          this.markerCoordinates.forEach((coord) => {
            if( coord.type == this.type ) {
                var marker = tomtom.L.marker([coord.latitude,coord.longitude]).addTo(this.map);
                marker.bindPopup(coord.type);
                this.markerList.push(marker)
            }
          });
      });
    }
  };
</script>

<style scoped>
.tomtom-map {
  width: auto;
  height: 800px;
  margin: 0 auto;
  background: gray;
}
</style>