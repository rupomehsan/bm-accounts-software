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
                <router-link :to="{ name: `BranchAdminDashboard` }">Dashboard</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${role}AllAssetList` }" class="d-flex align-items-center" href="">Asset
                    List</router-link>
            </li>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            role: window.role.branch
        }
    }
}
</script>

<style></style>
