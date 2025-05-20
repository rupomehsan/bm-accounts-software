<template>
    <div class="pace pace-inactive">
        <div
            class="pace-progress"
            data-progress-text="100%"
            data-progress="99"
            style="transform: translate3d(100%, 0px, 0px)"
        >
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="page-main-header">
        <!--Page Header Start-->
        <div
            class="main-header-left"
            semilight-bg-color="bg-default-light-colo"
        >
            <div class="logo-wrapper">
                <a
                    href="http://127.0.0.1:8000/dashboard#/admin"
                    id="logo"
                    class="d-flex align-items-end gap-1"
                >
                    <img
                        src="/backend/assets/images/logo-light.png"
                        class="image-light"
                        alt=""
                    />
                    <!-- <span class="text-white h4"> Dashboard </span> -->
                </a>
            </div>
        </div>
        <div
            class="main-header-right row"
            header-bg-color="bg-default-light-colo"
        >
            <div class="mobile-sidebar col-1 ps-0">
                <div class="text-start switch-sm">
                    <label class="switch"
                        ><input
                            type="checkbox"
                            id="sidebar-toggle"
                            v-model="toggleSwitch"
                            :checked="toggleSwitch" /><span
                            class="switch-state"
                        ></span
                    ></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li class="onhover-dropdown mx-3">
                        <router-link
                            :to="{ name: 'MyNotification' }"
                            class="txt-dark"
                        >
                            <img
                                class="align-self-center pull-right me-2"
                                src="/backend/assets/images/notification.png"
                                alt="header-notification"
                            />
                            <span
                                class="badge rounded-pill badge-primary notification"
                            >
                                {{ user_unseen_notification.length }}</span
                            >
                        </router-link>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>
                                Notification
                                <span
                                    class="badge rounded-pill badge-secondary text-white text-uppercase pull-right"
                                    >{{
                                        user_unseen_notification.length
                                    }}
                                    New</span
                                >
                            </li>
                            <template
                                v-for="item in user_unseen_notification"
                                :key="item.id"
                            >
                                <li>
                                    <div class="d-flex">
                                        <i
                                            class="flex-shrink-0 align-self-center notification-icon icofont icofont-shopping-cart bg-primary"
                                        ></i>
                                        <div>
                                            <h6 class="mt-0">
                                                {{ item.topic }}
                                            </h6>
                                            <p class="mb-0">
                                                {{ item.description }}
                                            </p>
                                            <span
                                                ><i
                                                    class="icofont icofont-clock-time p-r-5"
                                                ></i
                                                >{{
                                                    new Date(
                                                        item.created_at
                                                    ).toDateString()
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                </li>
                            </template>

                            <!-- <li class="text-center">
                                You have Check
                                <router-link
                                    :to="{ name: 'BmSupportNotifications' }"
                                    href="#"
                                    >all</router-link
                                >
                                notification
                            </li> -->
                        </ul>
                    </li>
                    <li class="onhover-dropdown">
                        <div class="d-flex align-items-center">
                            <img
                                class="align-self-center pull-right flex-shrink-0 me-2"
                                src="/backend/assets/images/user.png"
                                alt="header-user"
                            />
                            <div>
                                <h6 class="m-0 txt-dark f-16">
                                    My Account
                                    <i
                                        class="fa fa-angle-down pull-right ms-2"
                                    ></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <!-- <li>
                                <router-link :to="{ name: 'BMSupoortUpdateProfile' }">
                                    <i class="icon-user"></i>
                                    Edit Profile
                                </router-link>
                            </li> -->
                            <li>
                                <a @click="logOut">
                                    <i class="icon-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--Page Header Ends-->
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { use_auth_store } from "../../../../store/auth_store";

export default {
    data: () => ({
        toggleSwitch: true,
    }),
    created: async function () {
        await this.get_user_unseen_notification();
    },
    methods: {
        ...mapActions(use_auth_store, {
            log_out: "log_out",
            get_user_unseen_notification: "get_user_unseen_notification",
        }),
        logOut() {
            if (confirm("Are you sure you want to logout?")) {
                this.log_out();
            }
        },
    },

    computed: {
        ...mapState(use_auth_store, {
            user_unseen_notification: "user_unseen_notification",
        }),
    },

    watch: {
        toggleSwitch: async function () {
            let pageSidebar =
                document.getElementsByClassName("page-sidebar")[0];
            let pageBody = document.getElementsByClassName("page-body")[0];
            if (!this.toggleSwitch) {
                pageSidebar.classList.add("d-none");
                pageBody.style.marginLeft = "0";
            } else {
                pageSidebar.classList.remove("d-none");
                pageBody.style.marginLeft = "250px";
            }
        },
    },
};
</script>

<style></style>
