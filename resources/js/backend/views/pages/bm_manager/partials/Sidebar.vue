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
                <router-link :to="{ name: `bmManagerDashboard` }">Dashboard</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllReceiptBook` }" class="d-flex align-items-center" href="">Receipt
                    book</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllBranchTarget` }" class="d-flex align-items-center" href="">Branch
                    Target</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllBranchIncome` }" class="d-flex align-items-center" href="">Branch Income
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllCentralDivisionIncome` }" class="d-flex align-items-center" href="">Central Division
                    Income </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllDailyIncome` }" class="d-flex align-items-center" href="">Daily
                    Income</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllPaymentMethod` }" class="d-flex align-items-center" href="">Payment Method</router-link>
            </li>

        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
