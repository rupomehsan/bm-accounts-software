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
                <router-link :to="{ name: `AllCentralDivisionIncome` }" class="d-flex align-items-center" href="">
                    Department Income
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllDailyIncome` }" class="d-flex align-items-center" href="">Monthly
                    Income</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllPaymentMethod` }" class="d-flex align-items-center"
                    href="">Accounts</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllSohidFund` }" class="d-flex align-items-center" href="">Sohid
                    Fund</router-link>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllUser` }" class="d-flex align-items-center" href="">Users</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `AllApplicationCategory` }" class="d-flex align-items-center" href="">Application
                    Category</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ApplicationFormatAll` }" class="d-flex align-items-center" href="">Application
                    Format</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `ApplicationAll` }" class="d-flex align-items-center" href="">Application
                </router-link>
            </li>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
