<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img class="img-50 rounded-circle" src="/backend/assets/images/1.jpg" alt="#" />
            </div>
            <h6 class="mt-3 f-12">Bm Support Admin</h6>
        </div>
        <div class="sidebar-menu">


            <ul style="margin-left: 10px">

                <li class="my-2 d-flex align-items-center gap-2">
                    <i class="icon-desktop"></i>
                    <router-link :to="{ name: `${rolePrefix}AllVouchers` }" href="general-widget.html">সকল সহকারী বি ম
                        ভাউচার</router-link>
                </li>
                <li class="my-2 d-flex align-items-center gap-2">
                    <i class="icon-desktop"></i>
                    <router-link :to="{ name: `${rolePrefix}NotApprovedByBmVoucher` }">
                        সহকারী বিএম
                        দ্বারা অনুমোদিত নয়</router-link>
                </li>
                <li class="my-2 d-flex align-items-center gap-2">
                    <i class="icon-desktop"></i>
                    <router-link :to="{ name: `${rolePrefix}NotApprovedByCpVoucher` }" href="chart-widget.html">সি পি
                        দ্বারা অনুমোদিত নয়</router-link>
                </li>

            </ul>



        </div>
    </div>
</template>
<script>
import roleSetup from './role_setup';


export default {
    data: () => ({
        submenu: false,
        subSubMenu: false,
        rolePrefix: roleSetup.role
    }),
    created: function () {
        console.log(this.rolePrefix);
    },
    methods: {
        toggleMenu() {
            event.target.closest("li").classList.toggle("active");
        },
        subToggleMenu() {
            event.target.classList.toggle("active");
        },
    },
};
</script>

<style></style>
