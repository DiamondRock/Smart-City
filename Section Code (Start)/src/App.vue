<template>
    <div >
        <div>Smart city</div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <app-manage></app-manage>
            </div>
            <div class="col-sm-9">
                <app-map name="example"></app-map>
            </div>
        </div>
    </div>
</template>

<script>
    import tomtomMap from "./components/tomtomMap.vue"
    import manage from "./components/manage.vue"
    export default {
        components: {
            appMap: tomtomMap,
            appManage: manage
        }
    }
</script>

<style>
</style>
