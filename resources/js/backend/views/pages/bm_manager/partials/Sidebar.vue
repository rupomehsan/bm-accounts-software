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
                <router-link :to="{ name: `bmManagerDashboard` }"
                    >ড্যাশবোর্ড</router-link
                >
            </li>
            <li class="my-2">
                <router-link
                    :to="{ name: `bmMainLedger` }"
                    href="general-widget.html"
                >
                    <i class="icon-desktop"></i> মুল লেজার</router-link
                >
            </li>
            <li class="my-2">
                <router-link
                    :to="{ name: `bmIncomeExpenseStatement` }"
                    href="general-widget.html"
                >
                    <i class="icon-desktop"></i> আয় ব্যয় খতিয়ান</router-link
                >
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize"
                        >রিসিপ্ট বুক ম্যনেজমেন্ট</span
                    >
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
                            :to="{ name: `AllReceiptBook` }"
                            class="d-flex align-items-center"
                            href=""
                            >রিসিপ্ট বুক</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllAssignReceiptBook` }"
                            class="d-flex align-items-center"
                            href=""
                            >রিসিপ্ট বুক প্রদান
                        </router-link>
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">একাউন্ট ম্যনেজমেন্ট</span>
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
                            :to="{ name: `AllBranchTarget` }"
                            class="d-flex align-items-center"
                            href=""
                            >ব্রাঞ্চ টার্গেট</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllIncome` }"
                            class="d-flex align-items-center"
                            href=""
                            >সকল আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllBranchIncome` }"
                            class="d-flex align-items-center"
                            href=""
                            >ব্রাঞ্চ আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllCentralDivisionIncome` }"
                            class="d-flex align-items-center"
                            href=""
                        >
                            বিভাগ আয়
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllDailyIncome` }"
                            class="d-flex align-items-center"
                            href=""
                            >মাসিক আয়</router-link
                        >
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllSohidFund` }"
                            class="d-flex align-items-center"
                            href=""
                            >শহীদ ফান্ড</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllPaymentMethod` }"
                            class="d-flex align-items-center"
                            href=""
                            >একাউন্ট মেথড</router-link
                        >
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllAccountCategory` }"
                            class="d-flex align-items-center"
                            href=""
                            >একাউন্ট ক্যাটাগরি</router-link
                        >
                    </li>
                </ul>
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">ঋণ ম্যনেজমেন্ট</span>
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
                            :to="{ name: `AllLoan` }"
                            class="d-flex align-items-center"
                            href=""
                            >ঋণ তালিকা
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllLoanPayment` }"
                            class="d-flex align-items-center"
                            href=""
                            >ঋণ পেমেন্ট
                        </router-link>
                    </li>
                </ul>
            </li>
            <li @click="toggleMenu">
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
                            :to="{ name: `AllApplicationCategory` }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন ক্যাটাগরি</router-link
                        >
                    </li>

                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `ApplicationFormatAll` }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন ফরম্যাট</router-link
                        >
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `ApplicationAll` }"
                            class="d-flex align-items-center"
                            href=""
                            >আবেদন তালিকা
                        </router-link>
                    </li>
                </ul>
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">জামানত ম্যনেজমেন্ট</span>
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
                            :to="{ name: `AllJamanot` }"
                            class="d-flex align-items-center"
                            href=""
                            >জামানত তালিকা
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllJamanotPayment` }"
                            class="d-flex align-items-center"
                            href=""
                            >জামানত পেমেন্ট
                        </router-link>
                    </li>
                </ul>
            </li>
            <li @click="toggleMenu">
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
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllOfficeRent` }"
                            class="d-flex align-items-center"
                            href=""
                            >অফিস ভাড়া
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllHouseRent` }"
                            class="d-flex align-items-center"
                            href=""
                            >বাড়ি ভাড়া
                        </router-link>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="fa fa-angle-right"></i>
                        <router-link
                            :to="{ name: `AllSalary` }"
                            class="d-flex align-items-center"
                            href=""
                            >সেলারি তালিকা
                        </router-link>
                    </li>
                    <li @click="subToggleMenu">
                        <a href="javascript:void(0)" class="sidebar-header">
                            <i class="fa fa-angle-right"></i
                            ><span class="text-capitalize">ভাউচার সমুহ</span>
                            <i
                                class="fa fa-angle-right pull-right fw-bolder"
                            ></i>
                        </a>
                        <ul
                            :class="subSubMenu ? 'menu-open' : ''"
                            class="sidebar-submenu"
                        >
                            <li>
                                <router-link
                                    :to="{ name: `BmSetMonthForVouchers` }"
                                    href="general-widget.html"
                                    ><i class="fa fa-angle-right"></i>সেট
                                    মাস</router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: `BmAllVouchers` }"
                                    href="general-widget.html"
                                    ><i class="fa fa-angle-right"></i>সকল বি ম
                                    ভাউচার</router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: `BmNotApprovedByBmVoucher` }"
                                    ><i class="fa fa-angle-right"></i>বিএম
                                    দ্বারা অনুমোদিত নয়</router-link
                                >
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: `BmNotApprovedByCpVoucher` }"
                                    href="chart-widget.html"
                                    ><i class="fa fa-angle-right"></i>সি পি
                                    দ্বারা অনুমোদিত নয়</router-link
                                >
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
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
                        <router-link :to="{ name: `AllAssetCategory` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ ক্যটাগরি
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: `AllAsset` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ</router-link
                        >
                    </li>
                    <li>
                        <router-link :to="{ name: `AllAssetLost` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            লস্ট</router-link
                        >
                    </li>

                    <li>
                        <router-link :to="{ name: `AllAssetAudit` }"
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
                        <router-link :to="{ name: `AllQuotation` }"
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
                        <router-link :to="{ name: `AllAssetRequestToCp` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ রিকোয়েস্ট টূ
                            সি পি</router-link
                        >
                    </li>
                    <li>
                        <router-link :to="{ name: `AllAssetTransfer` }"
                            ><i class="fa fa-angle-right"></i>সম্পদ
                            ট্রান্সফার</router-link
                        >
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">রিপোর্ট সমুহ</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="menu-open sidebar-submenu" style="margin-left: 20px">
                    <li>
                        <router-link
                            :to="{ name: `bmMainLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>প্রধান
                            খাতা</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmIncomeExpenseStatement` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>আয় ব্যয়
                            বিবরণী</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmLoanRegister` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>লোন
                            রেজিস্টার</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmJamanot` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>জামানত</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmOfficeRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>অফিস
                            ভাড়া</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmHouseRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>ঘর
                            ভাড়া</router-link
                        >
                    </li>
                    <!-- <li><router-link :to="{ name: `bmAssetList` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>Asset List</router-link></li>
                    <li><router-link :to="{ name: `bmBMStockRegister` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>BM Stock Register</router-link></li>
                    <li><router-link :to="{ name: `bmAssetRegister` }" href="general-widget.html">
                            <i class="fa fa-angle-right"></i>Asset Register</router-link></li> -->
                    <li>
                        <router-link
                            :to="{ name: `bmEkkalinProdan` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>এককালীন
                            প্রদান</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmNiyomitoProdan` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>নিয়মিত
                            প্রদান</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmKendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>কেন্দ্রীয়
                            শুভকাঙ্খী থেকে আয়</router-link
                        >
                    </li>
                </ul>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllUser` }"
                    class="d-flex align-items-center"
                    href=""
                    >ইউজার তালিকা</router-link
                >
            </li>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        submenu: false,
        subSubMenu: false,
    }),
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
