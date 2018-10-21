<template>
<div class="container" >
  <button v-on:click="showUrgent">Greet</button>
  <p>urgent: {{ userAge }} </p>
  <div id="serverData">Here is the server data</div>
</div>
</template>

<script>
  import { eventBus } from '../main';
  export default {
      data: function () {
        return {
              userAge: 30,
              type: "normal",
              name: "hi",
                markerCoordinates: [{
                latitude: 51.501527,
                longitude: -0.1921837,
                title: "hi"
              }],
              }
      },
      methods: {
        showUrgent: function (event) {
            this.type = "urgent";
            eventBus.$emit('showUrgent', this.type);
          },
        serverData: function(EventSource) {
        if(typeof(EventSource)!=="undefined")
          {
            var eSource = new EventSource("send_sse.php");
            //detect message receipt
            eSource.onmessage = function(event) {
              //write the received data to the page
              document.getElementById("serverData").innerHTML = event.data;
            };
          }
          else {
            document.getElementById("serverData").innerHTML="Whoops! Your browser doesn't receive server-sent events.";
          }
        }
        
      }
      
  };
</script>

<style>
</style>
