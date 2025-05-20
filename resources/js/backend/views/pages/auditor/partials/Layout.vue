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
import { mapState } from 'pinia';
import { use_auth_store } from '../../../../store/auth_store';

export default {
    components: { Sidebar, Header },
    created: function () {
        console.log('admin layout');
        console.log(this.role);
    },
    computed: {
        ...mapState(use_auth_store, {
            role: "role",
        })
    }
}
</script>

<style></style>
