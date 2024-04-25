<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img
                    class="img-50 rounded-circle"
                    src="/backend/assets/images/1.jpg"
                    alt="#"
                />
            </div>
            <h6 class="mt-3 f-12">Admin</h6>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `CpDashboard` }"
                    >ড্যাশবোর্ড</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `ApplicationsAll` }"
                    class="d-flex align-items-center"
                    href=""
                    >আবেদন সমুহ</router-link
                >
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ApplicationsAll` }" class="d-flex align-items-center" href="">Asset
                    application</router-link>
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `ReceiptBookAll` }"
                    class="d-flex align-items-center"
                    href=""
                    >রিসিপ্ট বই
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AtAGlance` }"
                    class="d-flex align-items-center"
                    href=""
                    >একনজরে বি ম
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `DivisionAtAGlance` }"
                    class="d-flex align-items-center"
                    href=""
                    >একনজরে বিভাগ</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `Income&Expense` }"
                    class="d-flex align-items-center"
                    href=""
                    >আয় &amp; ব্যয়</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `Notifications` }"
                    class="d-flex align-items-center"
                    href=""
                    >বিজ্ঞপ্তি সমুহ</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `Messages` }"
                    class="d-flex align-items-center"
                    href=""
                    >বার্তা সমুহ</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `CpAllVouchers` }"
                    class="d-flex align-items-center"
                    href=""
                    >ভাউচার</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `CpAllAssetRequest` }"
                    class="d-flex align-items-center"
                    href=""
                    >সম্পদ কোটেশন আবেদন</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <a
                    role="button"
                    @click="logOut"
                    class="d-flex align-items-center"
                    >প্রস্থান</a
                >
            </li>
        </div>
    </div>
</template>

<script>
import { mapActions } from "pinia";
import { use_auth_store } from "../../../../store/auth_store";
export default {
    data: () => ({
        submenu: false,
    }),
    methods: {
        ...mapActions(use_auth_store, {
            log_out: "log_out",
        }),

        logOut() {
            if (confirm("Are you sure you want to logout?")) {
                this.log_out();
            }
        },
    },
};
</script>

<style></style>
