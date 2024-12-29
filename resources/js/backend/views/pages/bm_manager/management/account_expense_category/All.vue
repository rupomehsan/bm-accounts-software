<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">ব্যয়ের খাতসমূহ</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link :to="{ name: `${role}CreateAccountExpenseCategory` }"
                                class="btn rounded-pill btn-outline-info">
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

                        <div class="search">
                            <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
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
                                        আইডি

                                    </th>
                                    <th class="cursor_n_resize">
                                        ব্যয়ের খাত

                                    </th>
                                    <th class="cursor_n_resize">
                                        সিরিয়াল নং

                                    </th>

                                    <th class="cursor_n_resize">
                                        স্টাটাস

                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr v-for="(item, index) in all_users.data" :key="item.id">
                                    <!-- <td style="width: 10px">
                                        <input type="checkbox" class="form-check-input" />
                                    </td> -->
                                    <td>{{ index+1 }}</td>
                                    <td>
                                        {{ item.title }}
                                    </td>
                                    <td>
                                        {{ item.serial_number }}
                                    </td>

                                    <td>
                                        <span class="badge bg-label-success me-1">{{ item.status }}</span>

                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <!-- <li>
                                                    <a href="">
                                                        <i
                                                            class="fa text-info fa-eye"
                                                        ></i>
                                                        Quick View
                                                    </a>
                                                </li> -->
                                                <!-- <li>
                                                    <span>
                                                        <a
                                                            href="#/user/details/43"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-secondary fa-eye"
                                                            ></i>
                                                            Details
                                                        </a>

                                                    </span>
                                                </li> -->
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                                                            name: `${role}CreateAccountExpenseCategory`,
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
                        <pagination :data="all_users" :method="get_all_categories" />
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="" @change="set_limit($event.target.value)">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas_backdrop">

                </div>
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
import { account_expense_category_setup_store } from "./setup/store";
import roleSetup from '../../partials/role_setup';
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        offset: "5",
        search_data: "",
        loaded: false,
        role: roleSetup.role
    }),
    created: async function () {
        await this.get_all_expense_categories();
        this.loaded = true;
    },
    methods: {
        ...mapActions(account_expense_category_setup_store, {
            get_all_expense_categories: "all",
            user_delete: "delete",
            set_limit: "set_limit",
            set_search_data: "set_search_data",
        }),
        ExportData(data = [], prefix_name = 'account_category') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.id = item.id
                temp.name = item.title
                temp.status = item.status
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
    },
    computed: {
        ...mapState(account_expense_category_setup_store, {
            all_users: "all_data",
            api_url: "api_url",
        }),

    },
    watch: {

        search_data: async function (newSearchData, oldSearchData) {
            clearTimeout(this.searchTimer);
            this.searchTimer = setTimeout(async () => {
                this.set_search_data(newSearchData);
                await this.get_all_expense_categories();
            }, 500);
        },
    },
};
</script>

<style></style>
