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
            <li @click="toggleMenu">
                <router-link :to="{ name: `${rolePrefix}ManagerDashboard` }" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">ড্যাশবোর্ড</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </router-link>
                <ul class="sidebar-submenu" style="margin-left: 20px">
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}SetMonthForVouchers` }">সেট
                            মাস</router-link>
                    </li>
                </ul>
            </li>


            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">আয় ম্যানেজমেন্ট
                    </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 10px">

                    <li @click="subToggleMenu">
                        <a href="javascript:void(0)" class="sidebar-header">
                            <i class="fa fa-angle-right"></i><span class="text-capitalize">রশিদ বই ম্যানেজমেন্ট
                            </span>
                            <i class="fa fa-angle-right pull-right fw-bolder"></i>
                        </a>
                        <ul :class="subSubMenu ? 'menu-open' : ''" class="sidebar-submenu">
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa fa-angle-right"></i>
                                <router-link :to="{ name: `${rolePrefix}AllReceiptBook` }"
                                    class="d-flex align-items-center" href="">রশিদ বই তালিকা
                                </router-link>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="fa fa-angle-right"></i>
                                <router-link :to="{ name: `${rolePrefix}AllAssignReceiptBook` }"
                                    class="d-flex align-items-center" href="">রশিদ বই প্রদান তালিকা
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllIncome` }" class="d-flex align-items-center"
                            href="">সকল আয়
                        </router-link>
                    </li>
                    <!-- <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllBranchIncome` }" class="d-flex align-items-center"
                            href="">ব্রাঞ্চ
                            আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllCentralDivisionIncome` }"
                            class="d-flex align-items-center" href="">
                            বিভাগ আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllMonthlyIncome` }" class="d-flex align-items-center"
                            href="">মাসিক
                            আয়</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllSohidFund` }" class="d-flex align-items-center"
                            href="">শহীদ
                            ফান্ড আয়</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllKollanTohobilIncome` }"
                            class="d-flex align-items-center" href="">কল্যান তহবিল আয়</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllTranIncome` }" class="d-flex align-items-center"
                            href="">ত্রান তহবিল আয়</router-link>
                    </li> -->

                </ul>
            </li>




            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">ব্যয় ম্যনেজমেন্ট</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 10px">
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllPendingVouchers` }"><i
                                class="fa fa-angle-right"></i>পেন্ডিং
                            ভাউচার তালিকা
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllVouchers` }"><i class="fa fa-angle-right"></i>টপশীট
                            তালিকা
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllVouchers` }"><i
                                class="fa fa-angle-right"></i>অনুমোদিত ভাউচার

                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}NotApprovedByBmVoucher` }"><i
                                class="fa fa-angle-right"></i>অনুমোদিত নয় ভাউচার

                        </router-link>
                    </li>
                </ul>
            </li>


            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">নিয়মিত হিসাব </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 10px">
                    <li class="my-2">
                        <router-link :to="{ name: `${rolePrefix}MainLedger` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i> মুল লেজার</router-link>
                    </li>
                    <li class="my-2">
                        <router-link :to="{ name: `${rolePrefix}IncomeStatement` }">
                            <i class="fa fa-angle-right"></i>আয়ের খতিয়ান </router-link>
                    </li>
                    <li class="my-2">
                        <router-link :to="{ name: `${rolePrefix}ExpenseStatement` }">
                            <i class="fa fa-angle-right"></i>ব্যয়ের খতিয়ান
                        </router-link>
                    </li>

                    <li class="my-2">
                        <router-link :to="{ name: `${rolePrefix}AllBranchIncome` }">
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়

                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">

                        <router-link :to="{ name: `${rolePrefix}AllLoan` }" class="d-flex align-items-center" href="">
                            <i class="fa fa-angle-right"></i>ঋণ
                            রেজিস্টার
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

                        <router-link :to="{ name: `${rolePrefix}AllJamanot` }" class="d-flex align-items-center"
                            href=""> <i class="fa fa-angle-right"></i>জামানত
                            রেজিস্টার
                        </router-link>
                    </li>
                    <!-- <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllJamanotPayment` }" class="d-flex align-items-center"
                            href="">জামানত পেমেন্ট
                        </router-link>
                    </li> -->
                    <li>
                        <router-link :to="{ name: `${rolePrefix}NiyomitoProdan` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>নিয়মিত
                            প্রদান</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}OfficeRent` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>অফিস
                            ভাড়া</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}HouseRent` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>বাসা
                            ভাড়া</router-link>
                    </li>

                    <li>
                        <router-link :to="{ name: `${rolePrefix}EkkalinProdan` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>এককালীন
                            প্রদান</router-link>
                    </li>

                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllSalary` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>সম্মানি/বেতন রেজিস্টার
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}NiyomitoProdan` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>কেন্দ্রীয় শুভাকাক্ষ্মী থেকে আয়
                        </router-link>
                    </li>

                </ul>
            </li>







            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">কল্যাণ তহবিল</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">শহীদ ফান্ড </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">ত্রাণ ফান্ড </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>লেজার
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>এক নজরে
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}KendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html">
                            <i class="fa fa-angle-right"></i>শাখা থেকে আয়
                        </router-link>
                    </li>
                </ul>
            </li>



            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">সিপির কছে আবেদন</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllApplicationCategory` }"
                            class="d-flex align-items-center" href="">আবেদন ক্যাটাগরি</router-link>
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}ApplicationFormatAll` }"
                            class="d-flex align-items-center" href="">আবেদন ফরম্যাট</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}ApplicationAll` }" class="d-flex align-items-center"
                            href="">আবেদন
                            তালিকা
                        </router-link>
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">সম্পদ ম্যনেজমেন্ট</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllAssetCategory` }"><i
                                class="fa fa-angle-right"></i>সম্পদ ক্যটাগরি
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllAsset` }"><i
                                class="fa fa-angle-right"></i>সম্পদ</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllAssetLost` }"><i class="fa fa-angle-right"></i>সম্পদ
                            লস্ট</router-link>
                    </li>

                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllAssetAudit` }"><i class="fa fa-angle-right"></i>সম্পদ
                            অডিট</router-link>
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
                        <router-link :to="{ name: `${rolePrefix}AllQuotation` }"><i class="fa fa-angle-right"></i>সম্পদ
                            কোটেশন</router-link>
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
                        <router-link :to="{ name: `${rolePrefix}AllAssetRequestToCp` }"><i
                                class="fa fa-angle-right"></i>সম্পদ
                            রিকোয়েস্ট টূ
                            সি পি</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `${rolePrefix}AllAssetTransfer` }"><i
                                class="fa fa-angle-right"></i>সম্পদ
                            ট্রান্সফার</router-link>
                    </li>
                </ul>
            </li>





            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${rolePrefix}AllBudget` }" class="d-flex align-items-center" href="">বাজেট
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${rolePrefix}AllAudit` }" class="d-flex align-items-center"
                    href="">অডিট</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${rolePrefix}MainLedger` }" class="d-flex align-items-center"
                    href="">রিপোর্ট</router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${rolePrefix}AllAnalysis` }" class="d-flex align-items-center"
                    href="">এনালাইসিস</router-link>
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i><span class="text-capitalize">সেটিংস </span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu" style="margin-left: 20px">
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllUser` }" class="d-flex align-items-center"
                            href="">ইউজার তালিকা
                        </router-link>
                    </li>
                    <li class="my-2 d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllblockListUser` }" class="d-flex align-items-center"
                            href="">ইউজার ব্ল্যাক লিস্ট
                            তালিকা</router-link>
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllPaymentMethod` }" class="d-flex align-items-center"
                            href="">পেমেন্ট মেথড</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllAccountIncomeCategory` }"
                            class="d-flex align-items-center" href="">আয়ের খাতসমূহ</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}ApplicationAll` }" class="d-flex align-items-center"
                            href="">আয়ের মাধ্যম

                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllAccountExpenseCategory` }"
                            class="d-flex align-items-center" href="">ব্যয় খাতসমূহ</router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link :to="{ name: `${rolePrefix}AllBranchTarget` }" class="d-flex align-items-center"
                            href="">ব্রাঞ্চ
                            টার্গেট</router-link>
                    </li>
                </ul>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link :to="{ name: `${rolePrefix}AllUser` }" class="d-flex align-items-center" href="">যোগাযোগ
                </router-link>
            </li>

        </div>
    </div>
</template>
<script>
import roleSetup from './role_setup';
import { mapState } from 'pinia';
import { use_auth_store } from '../../../../store/auth_store';

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
    computed: {
        ...mapState(use_auth_store, {
            auth_info: "auth_info",
        })
    }
};
</script>

<style></style>
