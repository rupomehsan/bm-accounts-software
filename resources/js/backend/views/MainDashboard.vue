<template>
    <div>
        <!-- <h5>Dashboard root</h5> -->
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { use_auth_store } from "../store/auth_store";
export default {
    created: async function () {
        await this.check_is_auth();
        console.log("hi");
    },
    watch: {
        is_auth: {
            handler: function (v) {
                let prev_url = window.sessionStorage.getItem("prevurl");
                switch (this.role.name) {
                    case "super_admin":
                        window.location.hash = prev_url || "#/bm-manager";
                        break;
                    case "admin":
                        window.location.hash = prev_url || "#/bm-manager";
                        break;
                    case "bm_manager":
                        window.location.hash = prev_url || "#/bm-manager";
                        break;
                    case "cp":
                        window.location.hash = prev_url || "#/cp";
                        break;
                    case "sg":
                        window.location.hash = prev_url || "#/sg";
                        break;
                    case "bm_support_manager":
                        window.location.hash =
                            prev_url || "#/bm-support-manager";
                        break;
                    case "division_admin":
                        window.location.hash = prev_url || "#/division-admin";
                        break;
                    case "division_support_admin":
                        window.location.hash =
                            prev_url || "#/division-support-admin";
                        break;
                    case "division_without_audit":
                        window.location.hash =
                            prev_url || "#/division-without-audit";
                        break;
                    case "branch":
                        window.location.hash = prev_url || "#/branch";
                        break;
                    case "auditor":
                        window.location.hash = prev_url || "#/auditor";
                        break;
                    case "division_employee":
                        window.location.hash =
                            prev_url || "#/division-employee";
                        break;
                    case "well_wisher":
                        window.location.hash = prev_url || "#/well-wisher";
                        break;
                    default:
                        console.log("you have permission");
                }
            },
            deeps: true,
        },
    },
    methods: {
        ...mapActions(use_auth_store, {
            check_is_auth: "check_is_auth",
        }),
    },
    computed: {
        ...mapState(use_auth_store, {
            is_auth: "is_auth",
            auth_info: "auth_info",
            role: "role",
        }),
    },
};
</script>

<style></style>
