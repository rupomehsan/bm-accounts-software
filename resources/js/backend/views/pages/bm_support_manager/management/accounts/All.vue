<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Account Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link :to="{ name: `${role}CreatePaymentMethod` }"
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
                    <!-- <div class="card-header align-items-center">
                        <h6>
                            All Accounts

                        </h6>
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
                                        <a href="" @click.prevent="exportData(all_users.data)">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th class="w-10">
                                        <!-- <input type="checkbox" class="form-check-input" /> -->
                                    </th>
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID

                                    </th>
                                    <th class="cursor_n_resize">
                                        Name

                                    </th>
                                    <th class="cursor_n_resize">
                                        Account Number

                                    </th>

                                    <th class="cursor_n_resize">
                                        Status

                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(item, index) in all_users.data" :key="item.id">
                                    <td>
                                        <!-- <input type="checkbox" class="form-check-input" /> -->
                                    </td>
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.name }}
                                    </td>
                                    <td>
                                        {{
                                item.account_number?.value ?? "N/A"
                            }}
                                    </td>

                                    <td>
                                        <span class="badge bg-label-success me-1">{{
                                    item.status == 1
                                        ? "active"
                                        : "inactive"
                                }}</span>

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
                                                <li v-if="item.name !== 'cash'">
                                                    <span>
                                                        <router-link :to="{
                                name: `${role}CreatePaymentMethod`,
                                query: {
                                    id: item.id,
                                },
                            }" class="">
                                                            <i class="fa text-warning fa-pencil"></i>
                                                            Edit
                                                        </router-link>
                                                    </span>
                                                </li>
                                                <li v-if="item.name !==
                                'bank_account' &&
                                item.name !== 'cash'
                                ">
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
                        <pagination :data="all_users" :method="get_all_accounts" />
                        <div class="float-right">
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
import { account_setup_store } from "./setup/store";
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        role: window.role.bmSupport,
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.get_all_accounts(this.api_url.href);
    },
    methods: {
        ...mapActions(account_setup_store, {
            get_all_accounts: "all",
            user_delete: "delete",
        }),
        exportData(data = [], prefix_name = 'accounts') {
            let col = Object.keys(data[0]);
            let values = data.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                .addRows(values)
                .exportFile();
        },
    },
    computed: {
        ...mapState(account_setup_store, {
            all_users: "all_data",
            api_url: "api_url",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_accounts("users");
        },
        search_data: async function (newSearchData, oldSearchData) {
            clearTimeout(this.searchTimer);
            this.searchTimer = setTimeout(async () => {
                this.api_url.searchParams.set('search', this.search_data);
                await this.get_all_accounts(this.api_url.href);
            }, 500);
        },
    },
};
</script>

<style></style>
