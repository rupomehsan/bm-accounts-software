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
                <router-link :to="{ name: `DivisionSupportAdminDashboard` }"
                    >ড্যাশবোর্ড</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllVouchers` }"
                    class="d-flex align-items-center"
                    href=""
                    >ভাউচার</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `NotApprovedVoucher` }"
                    class="d-flex align-items-center"
                    href=""
                    >অনুমোদিত নয় ভাউচার সমুহ</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllNotApprovedByAdminVouchers` }"
                    class="d-flex align-items-center"
                    href=""
                    >অ্যাডমিন দ্বারা অনুমোদিত নয় ভাউচার সমুহ</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `NotApprovedByCpVoucher` }"
                    class="d-flex align-items-center"
                    href=""
                    >সি পি দ্বারা অনুমোদিত নয় ভাউচার সমুহ</router-link
                >
            </li>
            <!-- <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllVoucherReports` }" class="d-flex align-items-center"
                    href="">Report</router-link>
            </li> -->
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
