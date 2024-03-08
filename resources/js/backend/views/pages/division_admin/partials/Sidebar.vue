<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div><img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#">
            </div>
            <h6 class="mt-3 f-12">Admin</h6>
        </div>
        <div class="sidebar-menu">
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `DivisionAdminDashboard` }">Dashboard</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminAllVouchers` }" class="d-flex align-items-center" href="">Vouchers</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminNotApprovedVoucher` }" class="d-flex align-items-center" href="">Not
                    Approved Voucher</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminAllNotApprovedByAdminVouchers` }" class="d-flex align-items-center" href="">Not
                    Approved By Admin Voucher</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminNotApprovedByCpVoucher` }" class="d-flex align-items-center" href="">
                    Not Approved By CP Voucher</router-link>
            </li>

            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminAllVoucherReports` }" class="d-flex align-items-center"
                    href="">Report</router-link>
            </li> -->
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AdminSupportAllUser` }" class="d-flex align-items-center"
                    href="">User</router-link>
            </li>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
