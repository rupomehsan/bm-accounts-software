<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#" />
            </div>
            <h6 class="mt-3 f-12">{{ auth_info.full_name }}</h6>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `DivisionAdminDashboard` }">ড্যাশবোর্ড</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `DivisionAdminAllIncome` }">আয় সমুহ</router-link>
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AdminAllVouchers` }"
                    class="d-flex align-items-center"
                    href=""
                    >ভাউচার সমুহ</router-link
                >
            </li> -->
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AdminNotApprovedVoucher` }"
                    class="d-flex align-items-center"
                    href=""
                >
                    অনুমোদিত নয় ভাউচার সমুহ</router-link
                >
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminAllNotApprovedByAdminVouchers` }" class="d-flex align-items-center"
                    href="">অ্যাডমিন দ্বারা অনুমোদিত নয় ভাউচার সমুহ</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminNotApprovedByCpVoucher` }" class="d-flex align-items-center" href="">
                    সি পি দ্বারা অনুমোদিত নয় ভাউচার সমুহ</router-link>
            </li>

            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminAllVoucherReports` }" class="d-flex align-items-center"
                    href="">Report</router-link>
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminSupportAllUser` }" class="d-flex align-items-center" href="">ইউজার
                    তালিকা</router-link>
            </li>
        </div>
    </div>
</template>

<script>
import { mapState } from 'pinia';
import { use_auth_store } from '../../../../store/auth_store';
export default {
    computed: {
        ...mapState(use_auth_store, {
            auth_info: "auth_info",
        })
    }
};
</script>

<style></style>
