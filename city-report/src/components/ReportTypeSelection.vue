<template>
  <div class="report-type-selection">
    <p class="prompt">PLEASE SELECT YOUR REPORT TYPE</p>
    <div class="item"
         v-for="item in type"
         :key="item.typeId"
         @click="selectedId = item.typeId"
         :style="{backgroundColor: selectedId === item.typeId ? selectedColor : unselectedColor}">
      <!--<img :src="'@/assets/' + item.imgId + '.png'">-->
      <p class="name">{{ item.name }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "ReportTypeSelection",

  data() {
    return {
      type: [
        { typeId: 1, name: "Fire", imgId: "img-fire" },
        { typeId: 2, name: "Car Accident", imgId: "img-car-accident" },
        { typeId: 3, name: "Broken Facility", imgId: "img-broken-facility" }
      ],
      selectedId: 0,
      selectedColor: "#7b50ff",
      unselectedColor: "#353535"
    };
  }
};
</script>

<style lang="scss">
.report-type-selection {
  .prompt {
    margin: 40px 0;
    font-size: 1.2em;
  }

  .item {
    height: 100px;
    width: auto;
    margin: 10px;
    line-height: 100px;
    border-radius: 5px;
    cursor: pointer;

    .name {
      margin: 0;
      color: #fff;
      font-size: 1.8em;
    }
  }
}
</style>
