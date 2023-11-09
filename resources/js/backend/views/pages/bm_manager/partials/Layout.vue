<template>
    <!--page-wrapper Start-->
    <div class="page-wrapper">
        <Header></Header>
        <!--Page Body Start-->
        <div class="page-body-wrapper">
            <div>
                <Sidebar></Sidebar>
                <router-view></router-view>
            </div>
        </div>
        <!--Page Body Ends-->
    </div>
    <!--page-wrapper Ends-->
</template>

<script>
import Sidebar from "./Sidebar.vue"
import Header from "./Header.vue"

export default {
    components: { Sidebar, Header },

}
</script>

<style></style>
