<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Branch Target Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link :to="{ name: `${role}BranchTargetCreate` }" class="btn rounded-pill btn-outline-info">
                                <i class="fa fa-pencil me-5px"></i>
                                Create
                            </router-link>
                        </span>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">

                        <div class="w-25 d-flex gap-2">
                            <div>
                                <label for="">Start date</label>
                                <date-field :label="`Start Date`" :name="`start_date`" :value="startDate"
                                    :onchange="getDate" />
                                <!-- <input type="date" v-model="startDate" class="form-control " @change="getstartDate" /> -->
                            </div>
                            <div>
                                <label for="">End date</label>
                                <date-field :label="`End Date`" :name="`end_date`" :value="endDate"
                                    :onchange="getDate" />
                                <!-- <input type="date" v-model="endDate" class="form-control " @change="getendDate" /> -->
                            </div>
                        </div>
                        <div class="w-25">
                            <label for="">Selcet your Session</label>
                            <select name="session" v-model="session" class="form-select ">
                                <option value="" selected>Session</option>
                                <template v-for="(
                                    sessionData, index
                                ) in all_branch_target_data.session" :key="index">
                                    <option :value="sessionData">
                                        {{ sessionData }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="table_actions">
                            <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                    class="fa fa-list"></i></a>
                            <ul>
                                <li>
                                    <a href="" @click.prevent="branchTarget(all_branch_target_data.data?.data)">
                                        <i class="fa-regular fa-hand-point-right"></i>
                                        Export All
                                    </a>
                                </li>


                            </ul>
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
                                        Account Category

                                    </th>
                                    <th class="cursor_n_resize">
                                        Payment interval

                                    </th>
                                    <th class="cursor_n_resize">
                                        Branch Name

                                    </th>
                                    <th class="cursor_n_resize">
                                        Target Amount

                                    </th>
                                    <th class="cursor_n_resize">
                                        Session

                                    </th>

                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(
                                        item
                                    ) in all_branch_target_data.data?.data" :key="item.id">
                                    <!-- <td class="w-10">
                                        <input type="checkbox" class="form-check-input" />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.account_category?.title }}
                                    </td>
                                    <td>
                                        {{ item.payment_interval }}
                                    </td>
                                    <td>
                                        {{ item.user?.full_name }}
                                    </td>
                                    <td>{{ item.target_amount }}</td>
                                    <td>{{ item.session }}</td>

                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                                name: `${role}BranchTargetCreate`,
                                query: {
                                    id: item.id,
                                },
                            }" class="">
                                                            <i class="fa text-warning fa-pencil"></i>
                                                            Edit
                                                        </router-link>

                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a @click.prevent="
                                user_delete(
                                    item.id
                                )
                                " href="#" class="">
                                                            <i class="fa text-danger fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1">
                        <pagination :data="all_branch_target_data.data" :method="get_all_data" />
                        <!-- <div class="float-right">
                            <div class="show-limit d-inline-block">
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
                                <span>{{ all_branch_target_data.total }}</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { banch_target_store } from "./setup/store";
import { CsvBuilder } from 'filefy';
import roleSetup from '../../partials/role_setup';

export default {
    data: () => ({
        role: roleSetup.role,
        offset: "5",
        search_data: "",
        session: "",
        startDate: "",
        endDate: "",
    }),

    created: async function () {
        this.startDate = moment()
            .subtract(1, "months")
            .startOf("month")
            .format("YYYY-MM-DD");
        this.endDate = moment().format("YYYY-MM-DD");
        await this.get_all_data();
    },

    methods: {
        ...mapActions(banch_target_store, {
            get_all_data: "all",
            user_delete: "delete",
            get_session_wise_data: "get_session_wise_data",
            get_date_wise_data: "get_date_wise_data",
        }),

        getDate: async function (getresponse) {
            if (getresponse.target.name == 'start_date') {
                this.startDate = getresponse.target.value
            }
            if (getresponse.target.name == 'end_date') {
                this.endDate = getresponse.target.value
            }

            this.get_date_wise_data(this.startDate, this.endDate);
        },

        branchTarget(data = [], prefix_name = 'branch_target') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.account_category = item.account_category?.title
                temp.payment_interval = item.payment_interval
                temp.user = item.user?.full_name
                temp.target_amount = item.target_amount
                dataArray.push(temp)
            })
            let col = [
                'Account Category',
                'Payment interval',
                'Branch Name',
                'Target Amount',
            ];
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },

    },

    computed: {
        ...mapState(banch_target_store, {
            all_branch_target_data: "all_data",
        }),
    },

    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_data("users");
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
        session: async function (data) {
            this.get_session_wise_data(data);
        },
    },
};
</script>

<style></style>
