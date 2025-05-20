<template>
    <div class="page-sidebar custom-scrollbar page-sidebar-open">
        <!--Page Sidebar Start-->
        <div class="sidebar-user text-center">
            <div>
                <img
                    class="img-50 rounded-circle"
                    :src="`${
                        auth_info.image ?? '/backend/assets/images/1.jpg'
                    }`"
                    alt="#"
                />
            </div>
            <h5 class="mt-3 f-12">Name : {{ auth_info.full_name }}</h5>
        </div>
        <div class="sidebar-menu">
            <li
                @click="toggleMenu"
                :class="
                    previous_page == '#/bm-manager/vouchers/set-month'
                        ? 'active'
                        : ''
                "
            >
                <router-link
                    :to="{ name: `${rolePrefix}ManagerDashboard` }"
                    class="sidebar-header"
                >
                    <i class="icon-blackboard"></i>
                    <span class="text-capitalize">ড্যাশবোর্ড</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </router-link>
                <ul class="sidebar-submenu" style="margin-left: 20px">
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            class=""
                            :class="{
                                active:
                                    $route.path ==
                                    `/bm-manager/vouchers/set-month`,
                            }"
                            :to="{ name: `${rolePrefix}SetMonthForVouchers` }"
                            >সেট মাস</router-link
                        >
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="income_menu().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">আয় ম্যানেজমেন্ট </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 10px"
                >
                    <li
                        @click="subToggleMenu"
                        :class="
                            receipt_book_menu().includes(previous_page)
                                ? 'active'
                                : ''
                        "
                    >
                        <a href="javascript:void(0)" class="sidebar-header">
                            <span class="text-capitalize"
                                >রশিদ বই ম্যানেজমেন্ট</span
                            >
                            <i
                                class="fa fa-angle-right pull-right fw-bolder"
                            ></i>
                        </a>
                        <ul
                            :class="subSubMenu ? 'menu-open' : ''"
                            class="sidebar-submenu"
                        >
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa fa-angle-right"></i>
                                <router-link
                                    :to="{
                                        name: `${rolePrefix}AllReceiptBook`,
                                    }"
                                    class="d-flex align-items-center"
                                    @click="
                                        set_active_link(
                                            '/bm-manager/receipt-books'
                                        )
                                    "
                                    :class="
                                        set_active_link(
                                            '/bm-manager/receipt-books'
                                        )
                                    "
                                >
                                    রশিদ বই তালিকা
                                </router-link>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa fa-angle-right"></i
                                ><router-link
                                    :to="{
                                        name: `${rolePrefix}AllAssignReceiptBook`,
                                    }"
                                    class="d-flex align-items-center"
                                    @click="
                                        set_active_link(
                                            '/bm-manager/receipt-books-assign'
                                        )
                                    "
                                    :class="
                                        set_active_link(
                                            '/bm-manager/receipt-books-assign'
                                        )
                                    "
                                >
                                    রশিদ বই প্রদান তালিকা
                                </router-link>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa fa-angle-right"></i
                                ><router-link
                                    :to="{
                                        name: `${rolePrefix}AllRejectedReceiptBook`,
                                    }"
                                    class="d-flex align-items-center"
                                    @click="
                                        set_active_link(
                                            '/bm-manager/rejected-receipt-books'
                                        )
                                    "
                                    :class="
                                        set_active_link(
                                            '/bm-manager/rejected-receipt-books'
                                        )
                                    "
                                >
                                    বাতিলকৃত রশিদ পাতা
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <router-link
                            :to="{ name: `${rolePrefix}AllIncome` }"
                            class="d-flex align-items-center"
                            @click="set_active_link('/bm-manager/income')"
                            :class="set_active_link('/bm-manager/income')"
                        >
                            সকল আয়
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="expense_menu().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">ব্যয় ম্যনেজমেন্ট</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 10px"
                >
                    <li>
                        <router-link
                            :class="{
                                active:
                                    $route.path ==
                                    `/bm-manager/vouchers/pending`,
                            }"
                            :to="{ name: `${rolePrefix}AllPendingVouchers` }"
                            ><i class="fa fa-angle-right"></i>পেন্ডিং ভাউচার
                            তালিকা
                        </router-link>
                    </li>

                    <li>
                        <router-link
                            :class="{
                                active: $route.path == `/bm-manager/vouchers`,
                            }"
                            :to="{ name: `${rolePrefix}AllVouchers` }"
                            ><i class="fa fa-angle-right"></i>অনুমোদিত ভাউচার
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            :class="{
                                active:
                                    $route.path ==
                                    `/bm-manager/not-approved-by-bm-vouchers`,
                            }"
                            :to="{
                                name: `${rolePrefix}NotApprovedByBmVoucher`,
                            }"
                            ><i class="fa fa-angle-right"></i>অনুমোদিত নয় ভাউচার
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="
                    regular_account().includes(previous_page) ? 'active' : ''
                "
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">নিয়মিত হিসাব </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 10px"
                >
                    <li class="my-2">
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/main-ledger'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/main-ledger'
                                )
                            "
                            :to="{ name: `${rolePrefix}MainLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i> মুল
                            লেজার</router-link
                        >
                    </li>
                    <li class="my-2">
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/income-statements'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/income-statements'
                                )
                            "
                            :to="{ name: `${rolePrefix}IncomeStatement` }"
                        >
                            <i class="fa fa-angle-right"></i>আয়ের খতিয়ান
                        </router-link>
                    </li>
                    <li class="my-2">
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/expense-statements'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/expense-statements'
                                )
                            "
                            :to="{ name: `${rolePrefix}ExpenseStatement` }"
                        >
                            <i class="fa fa-angle-right"></i>ব্যয়ের খতিয়ান
                        </router-link>
                    </li>

                    <li class="my-2">
                        <router-link
                            @click="
                                set_active_link('/bm-manager/branch-income')
                            "
                            :class="
                                set_active_link('/bm-manager/branch-income')
                            "
                            :to="{ name: `${rolePrefix}AllBranchIncome` }"
                        >
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <router-link
                            @click="set_active_link('/bm-manager/loan')"
                            :class="set_active_link('/bm-manager/loan')"
                            :to="{ name: `${rolePrefix}AllLoan` }"
                            class="d-flex align-items-center"
                            href=""
                        >
                            <i class="fa fa-angle-right"></i>ঋণ রেজিস্টার
                        </router-link>
                    </li>
                    <!-- <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllLoanPayment` }" class="d-flex align-items-center"
                            href="">ঋণ
                            পেমেন্ট
                        </router-link>
                    </li> -->
                    <li class="d-flex align-items-center gap-2">
                        <router-link
                            @click="set_active_link('/bm-manager/jamanot')"
                            :class="set_active_link('/bm-manager/jamanot')"
                            :to="{ name: `${rolePrefix}AllJamanot` }"
                            class="d-flex align-items-center"
                            href=""
                        >
                            <i class="fa fa-angle-right"></i>জামানত রেজিস্টার
                        </router-link>
                    </li>
                    <!-- <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllJamanotPayment` }" class="d-flex align-items-center"
                            href="">জামানত পেমেন্ট
                        </router-link>
                    </li> -->
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/regular-paying'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/regular-paying'
                                )
                            "
                            :to="{ name: `${rolePrefix}NiyomitoProdan` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>নিয়মিত
                            প্রদান</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/office-rent'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/office-rent'
                                )
                            "
                            :to="{ name: `${rolePrefix}OfficeRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>অফিস
                            ভাড়া</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/house-rent'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/house-rent'
                                )
                            "
                            :to="{ name: `${rolePrefix}HouseRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>বাসা
                            ভাড়া</router-link
                        >
                    </li>

                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/lump-sum-payment'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/lump-sum-payment'
                                )
                            "
                            :to="{ name: `${rolePrefix}EkkalinProdan` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এককালীন
                            প্রদান</router-link
                        >
                    </li>

                    <li>
                        <router-link
                            @click="set_active_link('/bm-manager/salary')"
                            :class="set_active_link('/bm-manager/salary')"
                            :to="{ name: `${rolePrefix}AllSalary` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>সম্মানি/বেতন
                            রেজিস্টার
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/at-a-glance'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/at-a-glance'
                                )
                            "
                            :to="{ name: `${rolePrefix}AtAGlance` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/reports/Central-Auspicious-to-Income'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/reports/Central-Auspicious-to-Income'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}KendriyoSuvakankhiThekeAy`,
                            }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>কেন্দ্রীয়
                            শুভাকাক্ষ্মী থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="
                    kollan_tohobil().includes(previous_page) ? 'active' : ''
                "
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">কল্যাণ তহবিল</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/ledger'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/ledger'
                                )
                            "
                            :to="{ name: `${rolePrefix}KollanTohobilLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/at-a-glance'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/at-a-glance'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}AllKollanTohobilAtAGlance`,
                            }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/branch-income'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/kollan-tohobil/branch-income'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}KollanTohobilAllBranchIncome`,
                            }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>
            <li
                @click="toggleMenu"
                :class="sohid_fund().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">শহীদ ফান্ড</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/sohid-fund/ledger')
                            "
                            :class="
                                set_active_link('/bm-manager/sohid-fund/ledger')
                            "
                            :to="{ name: `${rolePrefix}SohidFundLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/sohid-fund/at-a-glance'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/sohid-fund/at-a-glance'
                                )
                            "
                            :to="{ name: `${rolePrefix}AllSohidFundAtAGlance` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/sohid-fund/branch-income'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/sohid-fund/branch-income'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}SohidFundAllBranchIncome`,
                            }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="tran_fund().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">ত্রাণ ফান্ড </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/tran-fund/ledger')
                            "
                            :class="
                                set_active_link('/bm-manager/tran-fund/ledger')
                            "
                            :to="{ name: `${rolePrefix}TranFundLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/tran-fund/at-a-glance'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/tran-fund/at-a-glance'
                                )
                            "
                            :to="{ name: `${rolePrefix}AllTranFundAtAGlance` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/tran-fund/branch-income'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/tran-fund/branch-income'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}TranFundAllBranchIncome`,
                            }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="
                    cp_application().includes(previous_page) ? 'active' : ''
                "
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">সিপির কছে আবেদন</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/application-category'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/application-category'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}AllApplicationCategory`,
                            }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন ক্যাটাগরি</router-link
                        >
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/application-format'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/application-format'
                                )
                            "
                            :to="{ name: `${rolePrefix}ApplicationFormatAll` }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন ফরম্যাট</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="set_active_link('/bm-manager/applications')"
                            :class="set_active_link('/bm-manager/applications')"
                            :to="{ name: `${rolePrefix}ApplicationAll` }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন তালিকা
                        </router-link>
                    </li>
                </ul>
            </li>

            <li
                @click="toggleMenu"
                :class="asset().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">সম্পদ ম্যনেজমেন্ট</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/asset-category')
                            "
                            :class="
                                set_active_link('/bm-manager/asset-category')
                            "
                            :to="{ name: `${rolePrefix}AllAssetCategory` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ ক্যটাগরি
                        </router-link>
                    </li>
                    <li>
                        <router-link
                            @click="set_active_link('/bm-manager/asset')"
                            :class="set_active_link('/bm-manager/asset')"
                            :to="{ name: `${rolePrefix}AllAsset` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            @click="set_active_link('/bm-manager/asset-lost')"
                            :class="set_active_link('/bm-manager/asset-lost')"
                            :to="{ name: `${rolePrefix}AllAssetLost` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            লস্ট</router-link
                        >
                    </li>

                    <li>
                        <router-link
                            @click="set_active_link('/bm-manager/asset-audit')"
                            :class="set_active_link('/bm-manager/asset-audit')"
                            :to="{ name: `${rolePrefix}AllAssetAudit` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            অডিট</router-link
                        >
                    </li>

                    <!-- <li>
                        <router-link :to="{ name: `AllAssetAuditList` }"><i class="fa fa-angle-right"></i>Asset Audit
                            list</router-link>
                    </li> -->

                    <!-- <li>
                        <router-link :to="{ name: `AllAssetBrand` }"><i class="fa fa-angle-right"></i>সম্পদ
                            ব্রান্ড</router-link>
                    </li> -->

                    <!-- <li>
                        <router-link :to="{ name: `AllAssetChangeHistory` }"><i class="fa fa-angle-right"></i>Asset
                            change history</router-link>
                    </li> -->
                    <!-- <li>
                        <router-link :to="{ name: `AllAssetItem` }"><i class="fa fa-angle-right"></i>Asset
                            item</router-link>
                    </li> -->

                    <!-- <li>
                        <router-link :to="{ name: `AllAssetShopList` }"><i class="fa fa-angle-right"></i>সম্পদ শপ
                            লিস্ট</router-link>
                    </li> -->

                    <!-- <li>
                        <router-link :to="{ name: `AllAssetWaranty` }"><i class="fa fa-angle-right"></i>Asset
                            waranty</router-link>
                    </li> -->
                    <li>
                        <router-link
                            @click="set_active_link('/bm-manager/quotation')"
                            :class="set_active_link('/bm-manager/quotation')"
                            :to="{ name: `${rolePrefix}AllQuotation` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            কোটেশন</router-link
                        >
                    </li>
                    <!-- <li>
                        <router-link :to="{ name: `AllProduct` }"><i class="fa fa-angle-right"></i>Asset quotation
                            product</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `AllProductPrice` }"><i class="fa fa-angle-right"></i>Asset product
                            price</router-link>
                    </li> -->
                    <li>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/asset-request-to-cp'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/asset-request-to-cp'
                                )
                            "
                            :to="{ name: `${rolePrefix}AllAssetRequestToCp` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ রিকোয়েস্ট টূ
                            সি পি</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/asset-transfer')
                            "
                            :class="
                                set_active_link('/bm-manager/asset-transfer')
                            "
                            :to="{ name: `${rolePrefix}AllAssetTransfer` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            ট্রান্সফার</router-link
                        >
                    </li>
                </ul>
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    @click="set_active_link('/bm-manager/budget')"
                    :class="set_active_link('/bm-manager/budget')"
                    :to="{ name: `${rolePrefix}AllBudget` }"
                    class="d-flex align-items-center"
                    href=""
                    >বাজেট
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    @click="set_active_link('/bm-manager/audit')"
                    :class="set_active_link('/bm-manager/audit')"
                    :to="{ name: `${rolePrefix}AllAudit` }"
                    class="d-flex align-items-center"
                    href=""
                    >অডিট</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    @click="set_active_link('/bm-manager/reports/main-ledger')"
                    :class="set_active_link('/bm-manager/reports/main-ledger')"
                    :to="{ name: `${rolePrefix}MainLedger` }"
                    class="d-flex align-items-center"
                    href=""
                    >রিপোর্ট</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    @click="set_active_link('/bm-manager/analysis')"
                    :class="set_active_link('/bm-manager/analysis')"
                    :to="{ name: `${rolePrefix}AllAnalysis` }"
                    class="d-flex align-items-center"
                    href=""
                    >এনালাইসিস</router-link
                >
            </li>
            <li
                @click="toggleMenu"
                :class="settings().includes(previous_page) ? 'active' : ''"
            >
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">সেটিংস </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul
                    :class="submenu ? 'menu-open' : ''"
                    class="sidebar-submenu"
                    style="margin-left: 20px"
                >
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="set_active_link('/bm-manager/users')"
                            :class="set_active_link('/bm-manager/users')"
                            :to="{ name: `${rolePrefix}AllUser` }"
                            class="d-flex align-items-center"
                            href=""
                            >ইউজার তালিকা
                        </router-link>
                    </li>
                    <li class="my-2 d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/users/block-list')
                            "
                            :class="
                                set_active_link('/bm-manager/users/block-list')
                            "
                            :to="{ name: `${rolePrefix}AllblockListUser` }"
                            class="d-flex align-items-center"
                            href=""
                            >ইউজার ব্ল্যাক লিস্ট তালিকা</router-link
                        >
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="set_active_link('/bm-manager/accounts')"
                            :class="set_active_link('/bm-manager/accounts')"
                            :to="{ name: `${rolePrefix}AllPaymentMethod` }"
                            class="d-flex align-items-center"
                            href=""
                            >আয়ের মাধ্যম</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/account-category/income/all'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/account-category/income/all'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}AllAccountIncomeCategory`,
                            }"
                            class="d-flex align-items-center"
                            href=""
                            >আয়ের খাতসমূহ</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/account-category/income-source'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/account-category/income-source'
                                )
                            "
                            :to="{ name: `${rolePrefix}AllIncomeSource` }"
                            class="d-flex align-items-center"
                            href=""
                            >আয়ের উৎসের ধরণ
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link(
                                    '/bm-manager/account-category/expense/all'
                                )
                            "
                            :class="
                                set_active_link(
                                    '/bm-manager/account-category/expense/all'
                                )
                            "
                            :to="{
                                name: `${rolePrefix}AllAccountExpenseCategory`,
                            }"
                            class="d-flex align-items-center"
                            href=""
                            >ব্যয় খাতসমূহ</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            @click="
                                set_active_link('/bm-manager/branch-target')
                            "
                            :class="
                                set_active_link('/bm-manager/branch-target')
                            "
                            :to="{ name: `${rolePrefix}AllBranchTarget` }"
                            class="d-flex align-items-center"
                            href=""
                            >ব্রাঞ্চ টার্গেট</router-link
                        >
                    </li>
                </ul>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    @click="set_active_link('/bm-manager/contact')"
                    :class="set_active_link('/bm-manager/contact')"
                    :to="{ name: `${rolePrefix}AllUser` }"
                    class="d-flex align-items-center"
                    href=""
                    >যোগাযোগ
                </router-link>
            </li>
        </div>
    </div>
</template>
<script>
import roleSetup from "./role_setup";
import { mapState } from "pinia";
import { use_auth_store } from "../../../../store/auth_store";

export default {
    data: () => ({
        submenu: false,
        subSubMenu: false,
        rolePrefix: roleSetup.role,
        active_page_url: "",
        previous_page: "",
        current_page: "",
    }),
    created: function () {
        this.previous_page = sessionStorage.getItem("prevurl");

        this.current_page = this.$route.href;
        this.set_active_link(this.current_page);
    },
    methods: {
        toggleMenu() {
            event.target.closest("li").classList.toggle("active");
        },
        subToggleMenu() {
            event.target.classList.toggle("active");
        },

        income_menu() {
            return [
                "#/bm-manager/receipt-books",
                "#/bm-manager/receipt-books-assign",
                "#/bm-manager/income",
            ];
        },
        expense_menu() {
            return [
                "#/bm-manager/vouchers/pending",
                "#/bm-manager/vouchers",
                "#/bm-manager/not-approved-by-bm-vouchers",
            ];
        },
        receipt_book_menu() {
            return [
                "#/bm-manager/receipt-books",
                "#/bm-manager/receipt-books-assign",
            ];
        },
        regular_account() {
            return [
                "#/bm-manager/reports/main-ledger",
                "#/bm-manager/reports/income-statements",
                "#/bm-manager/reports/expense-statements",
                "#/bm-manager/reports/branch-income",
                "#/bm-manager/reports/loan",
                "#/bm-manager/reports/jamanot",
                "#/bm-manager/reports/regular-paying",
                "#/bm-manager/reports/office-rent",
                "#/bm-manager/reports/house-rent",
                "#/bm-manager/reports/lump-sum-payment",
                "#/bm-manager/reports/salary",
                "#/bm-manager/reports/Central-Auspicious-to-Income",
                "#/bm-manager/reports/at-a-galnce",
            ];
        },
        kollan_tohobil() {
            return [
                "#/bm-manager/kollan-tohobil/ledger",
                "#/bm-manager/kollan-tohobil/at-a-glance",
                "#/bm-manager/kollan-tohobil/branch-income",
            ];
        },
        sohid_fund() {
            return [
                "#/bm-manager/sohid-fund/ledger",
                "#/bm-manager/sohid-fund/at-a-glance",
                "#/bm-manager/sohid-fund/branch-income",
            ];
        },
        tran_fund() {
            return [
                "#/bm-manager/tran-fund/ledger",
                "#/bm-manager/tran-fund/at-a-glance",
                "#/bm-manager/tran-fund/branch-income",
            ];
        },
        cp_application() {
            return [
                "#/bm-manager/application-category",
                "#/bm-manager/application-format",
                "#/bm-manager/applications",
            ];
        },
        asset() {
            return [
                "#/bm-manager/asset-category",
                "#/bm-manager/asset",
                "#/bm-manager/asset-lost",
                "#/bm-manager/asset-audit",
                "#/bm-manager/quotation",
                "#/bm-manager/asset-request-to-cp",
                "#/bm-manager/asset-transfer",
            ];
        },
        settings() {
            return [
                "#/bm-manager/users",
                "#/bm-manager/users/block-list",
                "#/bm-manager/accounts",
                "#/bm-manager/account-category/income",
                "#/bm-manager/account-category/income-source",
                "#/bm-manager/account-category/expense",
                "#/bm-manager/branch-target",
            ];
        },

        set_active_link(link) {
            let current_page = this.$route.path;
            if (current_page == link) {
                return "active-link";
            }
        },
    },
    computed: {
        ...mapState(use_auth_store, {
            auth_info: "auth_info",
        }),
    },
};
</script>

<style scoped>
.active-link {
    color: #ab8ce4 !important;
}
</style>
