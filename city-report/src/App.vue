<template>
  <div id="app">
    <photo-capture></photo-capture>
  </div>
</template>

<script>
import ReportTypeSelection from '@/components/ReportTypeSelection.vue'
import InformationGather from '@/components/InformationGather.vue'
import PhotoCapture from '@/components/PhotoCapture.vue'

export default {
  name: "app",

  components: {
    ReportTypeSelection,
    InformationGather,
    PhotoCapture
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin: 0;
}
</style>
