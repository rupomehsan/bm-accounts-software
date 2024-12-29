<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Not Approved By Admin Voucher </h5>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <div class="search">
                            <!-- <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
                            </form> -->
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <!-- <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>

                                    <li>
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
                                    </li>
                                </ul>
                            </div> -->
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
                                                    <router-link :to="{ name: 'DSATopshit', params: { id: item.id } }">
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
                        <pagination :data="all_users" :method="user_get_all" />
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
import { not_approved__by_admin_voucher_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.user_get_all();

    },
    methods: {
        ...mapActions(not_approved__by_admin_voucher_setup_store, {
            user_get_all: "all",
            user_delete: "delete",
        }),
    },
    computed: {
        ...mapState(not_approved__by_admin_voucher_setup_store, {
            all_users: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {

        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
