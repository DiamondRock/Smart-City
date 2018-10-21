<template>
  <div class="photo-capture">
    <video muted autoplay ref="video"></video>
    <div class="photo" @click="getImage"></div>
  </div>
</template>

<script>
/* eslint-disable */
export default {
  name: "PhotoCapture",

  props: ['setImage'],

  data() {
    return {
      cameraList: [],
      selectedCameraIdx: 0
    };
  },

  computed: {
    camera() {
      return this.cameraList[this.selectedCameraIdx];
    }
  },

  mounted() {
    this.videoElement = this.$refs.video;
    navigator.mediaDevices
      .enumerateDevices()
      .then(this.gotDevices)
      .then(this.getStream)
      .catch(this.handleError);
  },

  methods: {
    _modalPosition() {
      return {
        type: 'viewport'
      }
    },

    gotDevices(infos) {
      infos.forEach(info => {
        if (info.kind === "videoinput") {
          this.cameraList.push(info.deviceId);
        }
      });
      this.selectedCameraIdx = this.cameraList.length - 1;
    },

    getStream() {
      if (window.stream) {
        window.stream.getTracks().forEach(track => {
          track.stop();
        });
      }

      navigator.mediaDevices
        .getUserMedia({
          video: {
            deviceId: { exact: this.camera }
          }
        })
        .then(this.gotStream)
        .catch(this.handleError);
    },

    gotStream(stream) {
      window.stream = stream;
      this.videoElement.srcObject = stream;
    },

    handleError(error) {
      console.log("Error: ", error);
    },

    getImage() {
      let canvas = document.createElement('canvas')
      let context = canvas.getContext('2d')
      canvas.width = this.videoElement.clientWidth / 2
      canvas.height = this.videoElement.clientHeight / 2
      context.drawImage(this.videoElement, 0, 0, canvas.width, canvas.height)
      this.setImage(canvas.toDataURL())
      this.$modal.close()
    }
  }
};
</script>

<style lang="scss">
.photo-capture {
  video {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    background-color: #353535;
  }

  .photo {
    position: fixed;
    bottom: 3em;
    left: 50%;
    margin-left: -3em;
    height: 6em;
    width: 6em;
    border-radius: 6em;
    border: solid 0.5em #fff;
    background-color: #7b50ff;
    cursor: pointer;
  }
}
</style>
