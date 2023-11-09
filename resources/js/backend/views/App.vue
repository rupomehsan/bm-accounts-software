<template>
    <router-view></router-view>
</template>

<script>
import { mapActions, mapState } from 'pinia';
import { use_auth_store } from '../store/auth_store';

export default {
    created: async function () {
        await this.check_is_auth();
        console.log("hi");
    },
    watch: {
        is_auth: {
            handler: function (v) {
                switch (this.role.name) {

                    case "super_admin":
                        break;

                    case "admin":
                        console.log('admin');
                        location.hash = "admin"
                        break;

                    case "bm_manager":
                        break;

                    case "cp":
                        console.log('cp');
                        location.hash = "cp"
                        break;

                    default:
                        console.log('you have no permission');

                }
            },
            deeps: true,
        }
    },
    methods: {
        ...mapActions(use_auth_store, {
            check_is_auth: "check_is_auth",
        })
    },
    computed: {
        ...mapState(use_auth_store, {
            is_auth: "is_auth",
            auth_info: "auth_info",
            role: "role",
        })
    }
}
</script>

<style></style>
