<template>
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99"
            style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="page-main-header">
        <!--Page Header Start-->
        <div class="main-header-left" semilight-bg-color="bg-default-light-colo">
            <div class="logo-wrapper">
                <a href="http://127.0.0.1:8000/dashboard#/admin" id="logo" class="d-flex align-items-end gap-1">
                    <img src="/backend/assets/images/logo-light.png" class="image-light" alt="">
                    <!-- <span class="text-white h4"> Dashboard </span> -->
                </a>
            </div>
        </div>
        <div class="main-header-right row" header-bg-color="bg-default-light-colo">
            <div class="mobile-sidebar col-1 ps-0">
                <div class="text-start switch-sm"><label class="switch"><input type="checkbox" id="sidebar-toggle"
                            checked="checked"><span class="switch-state"></span></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li class="onhover-dropdown">
                        <div class="d-flex align-items-center"><img class="align-self-center pull-right flex-shrink-0 me-2"
                                src="/backend/assets/images/user.png" alt="header-user">
                            <div>
                                <h6 class="m-0 txt-dark f-16"> My Account <i class="fa fa-angle-down pull-right ms-2"></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li><a href="http://127.0.0.1:8000/dashboard#"><i class="icon-user"></i> Edit
                                    Profile </a></li>
                            <li><a href="http://127.0.0.1:8000/dashboard#"><i class="icon-power-off"></i> Logout
                                </a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <!--Page Header Ends-->
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
