<template>
  <div class="information-gather">
    <div class="photo">
      <img class="icon" src="@/assets/camera-icon.svg">
      <p>Take a picture</p>
    </div>
    <div>

    </div>
  </div>
</template>

<script>
export default {
  name: "InformationGather"
};
</script>

<style lang="scss">
.information-gather {
  .photo {
    background-color: #7b50ff;
    margin: 10px;
    border-radius: 10px;
    padding: 20px;

    .icon {
      height: 100px;
      width: 100px;
    }
    
    p {
      margin: 0;
      color: #fff;
      font-size: 1.2em;
    }
  }
}
</style>
