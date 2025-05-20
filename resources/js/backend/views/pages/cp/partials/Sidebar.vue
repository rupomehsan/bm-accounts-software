<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#" />
            </div>
            <h5 class="mt-3 f-12">Name : {{ auth_info.full_name }}</h5>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp')"
                    :class="set_active_link('/cp')" class="bn-text"
                    :to="{ name: `CpDashboard` }">ড্যাশবোর্ড</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/applications')"
                :class="set_active_link('/cp/applications')" :to="{ name: `ApplicationsAll` }" class="d-flex align-items-center bn-text" href="">আবেদন
                    সমুহ</router-link>
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ApplicationsAll` }" class="d-flex align-items-center" href="">Asset
                    application</router-link>
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/receipt-book')"
                :class="set_active_link('/cp/receipt-book')" :to="{ name: `ReceiptBookAll` }" class="d-flex align-items-center" href="">রশিদ বই
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/bm-at-a-glance/income')"
                :class="set_active_link('/cp/bm-at-a-glance/income')" :to="{ name: `AtAGlance` }" class="d-flex align-items-center" href="">একনজরে বি ম
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/division-at-a-glance')"
                :class="set_active_link('/cp/division-at-a-glance')" :to="{ name: `DivisionAtAGlance` }" class="d-flex align-items-center" href="">একনজরে
                    বিভাগ</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/income-expense')"
                :class="set_active_link('/cp/income-expense')" :to="{ name: `Income&Expense` }" class="d-flex align-items-center" href="">আয় &amp;
                    ব্যয়</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/notifications')"
                :class="set_active_link('/cp/notifications')" :to="{ name: `Notifications` }" class="d-flex align-items-center" href="">বিজ্ঞপ্তি
                    সমুহ</router-link>
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `Messages` }"
                    class="d-flex align-items-center"
                    href=""
                    >বার্তা সমুহ</router-link
                >
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/vouchers')"
                :class="set_active_link('/cp/vouchers')" :to="{ name: `CpAllVouchers` }" class="d-flex align-items-center"
                    href="">ভাউচার</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link @click="set_active_link('/cp/asset-quotasion-request')"
                :class="set_active_link('/cp/asset-quotasion-request')" :to="{ name: `CpAllAssetRequest` }" class="d-flex align-items-center" href="">সম্পদ কোটেশন
                    আবেদন</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <a role="button" @click="logOut" class="d-flex align-items-center">প্রস্থান</a>
            </li>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { use_auth_store } from "../../../../store/auth_store";
export default {
    data: () => ({
        submenu: false,
    }),
    created: function () {
        this.current_page = this.$route.href
        this.set_active_link(this.current_page)
    },
    methods: {
        ...mapActions(use_auth_store, {
            log_out: "log_out",
        }),

        logOut() {
            if (confirm("Are you sure you want to logout?")) {
                this.log_out();
            }
        },
        set_active_link(link) {
            let current_page = this.$route.path;
            if (current_page == link) {
                return 'active-link';
            }
        },
    },
    computed: {
        ...mapState(use_auth_store, {
            auth_info: "auth_info",
        })
    }
};
</script>

<style scoped>
.active-link {
    color: #ab8ce4 !important;
}
</style>

