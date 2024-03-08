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
                                    <i
                                        class="icon-user font-primary align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Receipt Books</span>
                                        <h4 class="counter">
                                            {{ totalReceiptBooks }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i
                                        class="icon-id-badge font-secondary align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Users</span>
                                        <h4 class="counter">
                                            {{ totalUsers }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i
                                        class="icon-camera font-success align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Application</span>
                                        <h4 class="counter">
                                            {{ totalApplication }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i
                                        class="icon-video-camera font-info align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Category</span>
                                        <h4 class="counter">
                                            {{ totalCategory }}
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
                                    <i
                                        class="icon-user font-primary align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Vouchers</span>
                                        <h4 class="counter">
                                            {{ totalVouchers }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-6 xs-width-100">
                            <div class="crm-top-widget card-body">
                                <div class="d-flex">
                                    <i
                                        class="icon-user font-primary align-self-center me-3"
                                    ></i>
                                    <div>
                                        <span class="mt-0">Books Assign</span>
                                        <h4 class="counter">
                                            {{ totalBookAssign }}
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
        totalReceiptBooks: 0,
        totalUsers: 0,
        totalVouchers: 0,
        totalCategory: 0,
        totalBookAssign: 0,
        totalApplication: 0,
    }),
    created: async function () {
        this.get_dashboard_analytics();
    },

    methods: {
        async get_dashboard_analytics() {
            let response = await axios.get("get-dashboard-analytics");
            response = response.data;
            if (response.status == "success") {
                this.totalReceiptBooks = response.data.totalReceiptBooks;
                this.totalUsers = response.data.totalUsers;
                this.totalVouchers = response.data.totalVouchers;
                this.totalCategory = response.data.totalCategory;
                this.totalBookAssign = response.data.totalBookAssign;
                this.totalApplication = response.data.totalApplication;
            }
        },
    },
};
</script>

<style></style>
