<template>
    <div class="page-body">
        <div class="pt-3">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>CP Dashboard</h5>
                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends -->
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="card border-widgets shadow mb-4">
                    <div class="row m-0">
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-money font-primary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Total Income</span>
                                        <h4 class="counter">
                                            {{ result.totalIncome ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-widgetized font-secondary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Total Expense</span>
                                        <h4 class="counter">
                                            {{ result.totalExpense ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-anchor font-success align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Monthly Due</span>
                                        <h4 class="counter">
                                            {{
                                                result.monthlyDue ?? 0
                                            }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-bell font-info align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Current Month Income</span>
                                        <h4 class="counter">
                                            {{ result.monthlyIncome ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-widgets shadow mb-4">
                    <div class="row m-0">
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-book font-primary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Pending Receipt Books</span>
                                        <h4 class="counter">
                                            {{ result.totalReceiptBooks ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-id-badge font-secondary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Users</span>
                                        <h4 class="counter">
                                            {{ result.totalUsers ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-notepad font-success align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Application</span>
                                        <h4 class="counter">
                                            {{ result.totalApplication ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-bookmark font-info align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Category</span>
                                        <h4 class="counter">
                                            {{ result.totalCategory ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-widgets shadow mb-4">
                    <div class="row m-0">
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-user font-primary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Pending Vouchers</span>
                                        <h4 class="counter">
                                            {{ result.totalVouchers ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-user font-primary align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Books Assign</span>
                                        <h4 class="counter">
                                            {{ result.totalBookAssign ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-announcement font-success align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Total loan</span>
                                        <h4 class="counter">
                                            {{ result.loanProvide ?? 0 }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i class="icon-bookmark-alt font-info align-self-center me-3"></i>
                                    <div>
                                        <span class="mt-0">Loan Due</span>
                                        <h4 class="counter">
                                            {{
                                                result.due
                                            }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts -->
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        result: {},
    }),
    created: async function () {
        this.get_dashboard_analytics();

    },

    methods: {
        async get_dashboard_analytics() {
            let response = await axios.get("get-dashboard-analytics");
            response = response.data;
            if (response.status == "success") {

                this.result = response.data;
                this.result.totalIncome = window.number_format(this.result.totalIncome)
                this.result.totalExpense = window.number_format(this.result.totalExpense || 0)
                this.result.monthlyDue = window.number_format(this.result.monthlyDue || 0)
                this.result.monthlyIncome = window.number_format(this.result.monthlyIncome || 0)
                this.result.due = window.number_format(Number(this.result.loanProvide) -Number(this.result.loanPayment)|| 0)
                this.result.loanProvide = window.number_format(this.result.loanProvide || 0)
            }
        },

    },
};
</script>

<style></style>
