<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#" />
            </div>
            <h6 class="mt-3 f-12">Admin</h6>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `sgDashboard` }">Dashboard</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ApplicationsAll` }" class="d-flex align-items-center"
                    href="">Applications</router-link>
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `ApplicationsAll` }"
                    class="d-flex align-items-center"
                    href=""
                    >Asset application</router-link
                >
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ReceiptBookAll` }" class="d-flex align-items-center" href="">Receipt book
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AtAGlance` }" class="d-flex align-items-center" href="">BM at a
                    glance</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `DivisionAtAGlance` }" class="d-flex align-items-center" href="">Department at a
                    glance</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `Income&Expense` }" class="d-flex align-items-center" href="">Income &amp;
                    Expense</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `Notifications` }" class="d-flex align-items-center"
                    href="">Notificaiton</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `Messages` }" class="d-flex align-items-center"
                    href="">Messages</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <a role="button" @click="log_out" class="d-flex align-items-center">Logout</a>
            </li>
        </div>
    </div>
</template>

<script>
import { mapActions } from "pinia";
import { use_auth_store } from "../../../../store/auth_store";
export default {
    methods: {
        ...mapActions(use_auth_store, {
            log_out: "log_out",
        }),
    },
};
</script>

<style></style>
