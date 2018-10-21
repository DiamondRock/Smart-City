<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import ReportTypeSelection from '@/components/ReportTypeSelection.vue'
import InformationGather from '@/components/InformationGather.vue'
import PhotoCapture from '@/components/PhotoCapture.vue'
import WelcomePage from '@/components/WelcomePage.vue'
import TypeSelectModal from "@/components/TypeSelectModal.vue";

export default {
  name: "app",

  components: {
    ReportTypeSelection,
    InformationGather,
    PhotoCapture,
    WelcomePage,
    TypeSelectModal
  }
};
</script>

<style>
* {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin: 0;
}
</style>
