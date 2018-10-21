<template>
  <div class="information-gather">
    <div class="type" @click="selectType">
      <p>Report Type # {{ reportType.name }}</p>
    </div>
    <div class="photo" @click="takePhoto" ref="photo">
      <img class="icon" src="@/assets/camera-icon.svg">
      <p>Take a picture</p>
    </div>
    <div class="form">
      <input type="text" placeholder="NAME" ref="name">
      <input type="text" placeholder="PHONE" ref="phone">
      <textarea cols="30" rows="4" placeholder="DESCRIPTION" ref="description"></textarea>
    </div>
    <div class="confirm" @click="send">
      <p>SEND</p>
    </div>
  </div>
</template>

<script>
import PhotoCapture from "@/components/PhotoCapture.vue";
import TypeSelectModal from "@/components/TypeSelectModal.vue";
import send from '@/scripts/send.js'
import selectedType from "@/scripts/constant.js"

export default {
  name: "InformationGather",

  data() {
    return {
      imageData: null,
      reportType: {id: 0, name: 'None'}
    };
  },

  mounted() {
    this.reportType.id = selectedType.id
    this.reportType.name = selectedType.name
  },

  methods: {
    takePhoto() {
      this.$modal.open(PhotoCapture, {
        props: {
          setImage: image => {
            this.imageData = image;
            this.$refs.photo.style.backgroundImage = `url('${image}')`;
          }
        }
      });
    },

    selectType() {
      this.$modal.open(TypeSelectModal, {
        props: {
          initialId: this.reportType,
          onConfirm: (type) => {
            this.reportType = type
          }
        }
      });
    },

    send() {
      send({
        type: this.reportType.name,
        name: this.$refs.name,
        phoneNo: this.$refs.phone,
        description: this.$refs.description,
        image: this.imageData
      })
    }
  }
};
</script>

<style lang="scss">
.information-gather {
  .photo {
    background-size: cover;
    background-color: #7b50ff;
    margin: 10px;
    border-radius: 10px;
    padding: 20px;
    cursor: pointer;

    .icon {
      height: 100px;
      width: 100px;
    }

    p {
      margin: 0;
      color: #fff;
      font-size: 1.2em;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
  }

  .type {
    height: 60px;
    background-color: #7b50ff;
    margin: 10px;
    border-radius: 10px;
    cursor: pointer;

    p {
      color: #fff;
      font-size: 1.2em;
      line-height: 60px;
    }
  }

  .confirm {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 6em;
    background-color: #7b50ff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    cursor: pointer;

    p {
      line-height: 3em;
      color: #fff;
      font-size: 2em;
    }
  }

  .form {
    width: 100%;

    input[type=text] {
      margin: 10px;
      width: 40%;
      font-size: 1.5em;
      line-height: 2em;
      border: 0;
      padding: 4px 8px;
      outline: none;
      background: #ebebeb;
      border-radius: 10px;
    }

    textarea {
      resize: none;
      margin: 10px;
      width: 80%;
      font-size: 1.5em;
      line-height: 2em;
      text-align: left;
      border: 0;
      padding: 4px 16px;
      outline: none;
      background: #ebebeb;
      border-radius: 10px;
    }
  }
}
</style>
