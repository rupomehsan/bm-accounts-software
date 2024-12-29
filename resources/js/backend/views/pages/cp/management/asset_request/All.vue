<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Asset quotation Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-primary" @click="getAllApprovalReqeust(1)">
                            All approved quotation
                        </button>
                        <button class="btn btn-primary mx-2" @click="getAllApprovalReqeust(0)">
                            All not approved quotation
                        </button>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
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
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
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
                                        Asset quotation

                                    </th>
                                    <th class="cursor_n_resize">
                                        Date

                                    </th>
                                    <th class="cursor_n_resize">
                                        Request form

                                    </th>
                                    <th class="cursor_n_resize">
                                        Request type

                                    </th>
                                    <th class="cursor_n_resize">
                                        Approval
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
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
                                    <td>{{ item.asset_quotation?.title }}</td>
                                    <td>
                                        {{
                            new Date(
                                item.created_at
                            ).toDateString()
                        }}
                                    </td>
                                    <td>
                                        {{ item.user?.full_name }}
                                    </td>
                                    <td>{{ item.request_type }}</td>
                                    <td>
                                        {{
                            item.is_approved == 1
                                ? "approved"
                                : "Not Approved"
                        }}
                                    </td>

                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <li>
                                                    <router-link :to="{
                            name: 'AssetRequestDetails',
                            params: {
                                id: item.id,
                            },
                        }">
                                                        <i class="fa text-info fa-book"></i>
                                                        Details
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
                        <pagination :data="all_users" :method="get_all_request_asset" />
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
import { asset_request_setup_store } from "./setup/store";
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.get_all_request_asset();
    },
    methods: {
        ...mapActions(asset_request_setup_store, {
            get_all_request_asset: "all",
            user_delete: "delete",
            all_approval_request_to_cp: "all_approval_request_to_cp",
            get_data_by_search: "get_data_by_search",
        }),

        getAllApprovalReqeust(status) {
            this.all_approval_request_to_cp(status);
        },
        ExportData(data = [], prefix_name = 'quotation_request') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.date = new Date(item.created_at).toDateString()
                temp.asset_quotation = item.asset_quotation?.title
                temp.Request_form = item.user?.full_name
                temp.Request_type = item.request_type
                temp.approval = item.approved ? "Approved" : "Not Approved"
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
        ...mapState(asset_request_setup_store, {
            all_users: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_request_asset("users");
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
