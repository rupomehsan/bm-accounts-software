<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Voucher Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-primary" @click="allApprovedVucherByCp">
                            All approved vouchers
                        </button>
                        <button class="btn btn-primary mx-2" @click="allNotApprovedVucherByCp">
                            All not approved vouchers
                        </button>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>All not approved vouchers</h6>
                        <div class="search">
                            <form @submit.prevent="SearchHandler($event)" ref="myForm">
                                <div class="d-flex gap-2">
                                    <div>
                                        <label for="">Start date</label>
                                        <date-field :label="`Start Date`" :name="`start_date`" :value="from_date" />
                                    </div>
                                    <div>
                                        <label for="">End date</label>
                                        <date-field :label="`End Date`" :name="`end_date`" :value="end_date" />
                                    </div>

                                    <div class="pt-2">
                                        <button type="submit" class="btn btn-primary mt-3">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="" @click.prevent="ExportData(all_users.data)">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>

                                    <!-- <li>
                                        <a href="#/user/import" class="">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Import
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="display data that has been deactivated" class="d-flex">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Deactivated data
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <!-- <th>
                                        <input type="checkbox" class="form-check-input" />
                                    </th> -->
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID

                                    </th>
                                    <th class="cursor_n_resize">
                                        Date

                                    </th>
                                    <th class="cursor_n_resize">
                                        Category

                                    </th>
                                    <th class="cursor_n_resize">
                                        Amount

                                    </th>
                                    <th class="cursor_n_resize">
                                        Total voucher
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Sompadok approved
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Bm SP approved
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Bm approved
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        CP approved
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>


                                    <th class="cursor_n_resize">
                                        Overall Approval
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Status

                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(item, index) in all_users.data" :key="item.id">
                                    <!-- <td>
                                        <input type="checkbox" class="form-check-input" />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.date }}
                                    </td>
                                    <td>
                                        {{ item.account_category?.title }}
                                    </td>
                                    <td>{{ item.amount }}</td>
                                    <td>{{ item.approval?.total_sub_voucher }}</td>
                                    <td>{{ item.approval?.approved_by_admin_total }}</td>
                                    <td>{{ item.approval?.approved_by_sp_bm_total }}</td>
                                    <td>{{ item.approval?.approved_by_bm_total }}</td>
                                    <td>{{ item.approval?.approved_by_cp_total }}</td>
                                    <td>{{ item.approved == 0 ? 'Not approved' : 'Approved' }}</td>
                                    <td>
                                        <span class="badge bg-label-success me-1">{{ item.status }}</span>

                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <li>
                                                    <router-link
                                                        :to="{ name: `CpTopShit`, params: { id: item.id } }">
                                                        <i class="fa text-info fa-book"></i>
                                                        Topshit
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1">
                        <pagination :data="all_users" :method="get_all_approved_voucher" />
                        <div class="float-right">
                            <!-- <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="" v-model="offset">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block">
                                <span>Total:</span>
                                <span>{{ all_users.total }}</span>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="canvas_backdrop"></div>
                <div class="canvas_backdrop">
                    <div class="content right">
                        <div class="content_header">
                            <h3 class="offcanvas-title">Selected Users</h3>
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="cotent_body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>id</th>
                                        <th>name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { voucher_setup_store } from "./setup/store";
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.get_all_approved_voucher();
    },
    methods: {
        ...mapActions(voucher_setup_store, {
            get_all_approved_voucher: "all",
            user_delete: "delete",
            all_approved_vucher_by_cp: "all_approved_vucher_by_cp",
            all_not_approved_vucher_by_cp: "all_not_approved_vucher_by_cp",
            get_data_by_search: "get_data_by_search",
        }),

        allApprovedVucherByCp() {
            this.all_approved_vucher_by_cp();
        },
        allNotApprovedVucherByCp() {
            this.all_not_approved_vucher_by_cp();
        },
        ExportData(data = [], prefix_name = 'vouchers') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.date = item.date
                temp.account_category = item.account_category?.title
                temp.amount = item.amount
                temp.approval = item.approved == 0 ? "Not approved" : "Approved"
                dataArray.push(temp)
            })
            let col = Object.keys(dataArray[0]);
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
        SearchHandler() {
            this.get_data_by_search(this.$refs.myForm)
        },
    },
    computed: {
        ...mapState(voucher_setup_store, {
            all_users: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_approved_voucher("users");
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
