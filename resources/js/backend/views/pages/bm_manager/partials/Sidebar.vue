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
                    >Dashboard</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllReceiptBook` }"
                    class="d-flex align-items-center"
                    href=""
                    >Receipt book</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllAssignReceiptBook` }"
                    class="d-flex align-items-center"
                    href=""
                    >Receipt book Assing</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllBranchTarget` }"
                    class="d-flex align-items-center"
                    href=""
                    >Branch Target</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllIncome` }"
                    class="d-flex align-items-center"
                    href=""
                    >All Income
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllBranchIncome` }"
                    class="d-flex align-items-center"
                    href=""
                    >Branch Income
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllCentralDivisionIncome` }"
                    class="d-flex align-items-center"
                    href=""
                >
                    Department Income
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllDailyIncome` }"
                    class="d-flex align-items-center"
                    href=""
                    >Monthly Income</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllSohidFund` }"
                    class="d-flex align-items-center"
                    href=""
                    >Sohid Fund</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllPaymentMethod` }"
                    class="d-flex align-items-center"
                    href=""
                    >Accounts</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllAccountCategory` }"
                    class="d-flex align-items-center"
                    href=""
                    >Account Category</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllApplicationCategory` }"
                    class="d-flex align-items-center"
                    href=""
                    >Application Category</router-link
                >
            </li>

            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `ApplicationFormatAll` }"
                    class="d-flex align-items-center"
                    href=""
                    >Application Format</router-link
                >
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `ApplicationAll` }"
                    class="d-flex align-items-center"
                    href=""
                    >Application
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllLoan` }"
                    class="d-flex align-items-center"
                    href=""
                    >Loan Register
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllLoanPayment` }"
                    class="d-flex align-items-center"
                    href=""
                    >Loan Payment
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllJamanot` }"
                    class="d-flex align-items-center"
                    href=""
                    >Jamanot Register
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllJamanotPayment` }"
                    class="d-flex align-items-center"
                    href=""
                    >Jamanot Payment
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllOfficeRent` }"
                    class="d-flex align-items-center"
                    href=""
                    >Office Rent
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllHouseRent` }"
                    class="d-flex align-items-center"
                    href=""
                    >House Rent
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllSalary` }"
                    class="d-flex align-items-center"
                    href=""
                    >Salary
                </router-link>
            </li>
            <li class="my-2 d-flex align-items-center gap-2">
                <i class="icon-desktop"></i>
                <router-link
                    :to="{ name: `AllUser` }"
                    class="d-flex align-items-center"
                    href=""
                    >Users</router-link
                >
            </li>
            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">Vouchers</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul :class="submenu ? 'menu-open' : ''" class="sidebar-submenu">
                    <li>
                        <router-link
                            :to="{ name: `BmSetMonthForVouchers` }"
                            href="general-widget.html"
                            ><i class="fa fa-angle-right"></i>Set
                            Month</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `BmAllVouchers` }"
                            href="general-widget.html"
                            ><i class="fa fa-angle-right"></i>All bm
                            vouchers</router-link
                        >
                    </li>
                    <li>
                        <router-link :to="{ name: `BmNotApprovedByBmVoucher` }"
                            ><i class="fa fa-angle-right"></i>Not approved by
                            bm</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `BmNotApprovedByCpVoucher` }"
                            href="chart-widget.html"
                            ><i class="fa fa-angle-right"></i>Not approved by
                            cp</router-link
                        >
                    </li>
                </ul>
            </li>

            <li @click="toggleMenu">
                <a href="javascript:void(0)" class="sidebar-header">
                    <i class="icon-blackboard"></i
                    ><span class="text-capitalize">Reports</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="menu-open sidebar-submenu">
                    <li>
                        <router-link
                            :to="{ name: `bmMainLedger` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>Main
                            Ledger</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmIncomeExpenseStatement` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i
                            >Statement</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmLoanRegister` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>Loan
                            Register</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmJamanot` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i
                            >Jamanot</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmOfficeRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>Office
                            Rent</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmHouseRent` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>House
                            Rent</router-link
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
                            <i class="fa fa-angle-right"></i>Ekkalin
                            Prodan</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmNiyomitoProdan` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>Niyomito
                            Prodan</router-link
                        >
                    </li>
                    <li>
                        <router-link
                            :to="{ name: `bmKendriyoSuvakankhiThekeAy` }"
                            href="general-widget.html"
                        >
                            <i class="fa fa-angle-right"></i>Kendriyo Suvakankhi
                            ThekeAy</router-link
                        >
                    </li>
                </ul>
            </li>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        submenu: false,
    }),
    methods: {
        toggleMenu() {
            event.target.closest("li").classList.toggle("active");
        },
    },
};
</script>

<style></style>
