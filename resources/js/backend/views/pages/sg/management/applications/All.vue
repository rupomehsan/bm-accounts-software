<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Application Management</h5>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            All Applications

                        </h6>
                        <div class="search">
                            <form action="#">
                                <input
                                    v-model.debounce:1000ms="search_data"
                                    placeholder="search..."
                                    type="search"
                                    class="form-control border border-info"
                                />
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a
                                    @click.prevent=""
                                    href="#"
                                    class="btn px-3 btn-outline-secondary"
                                    ><i class="fa fa-list"></i
                                ></a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Export All
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#/user/import" class="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Import
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            title="display data that has been deactivated"
                                            class="d-flex"
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Deactivated data
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                    </th>
                                    <th class="cursor_n_resize">Title</th>
                                    <th class="cursor_n_resize">Approved</th>
                                    <th class="cursor_n_resize">Disapproved</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="item in all_users.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>

                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.title }}
                                        </span>
                                    </td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'ApplicationsCategory',
                                                params: {
                                                    type: 'approved',
                                                    id: item.id,
                                                },
                                            }"
                                            title="approved"
                                            ><span class="fw-bold">
                                                {{
                                                    item.cp_application_approved_count ??
                                                    0
                                                }}
                                                <div
                                                    class="text-center action_btns_inline"
                                                >
                                                    <router-link
                                                        :to="{
                                                            name: 'ApplicationsCategory',
                                                            params: {
                                                                type: 'approved',
                                                                id: item.id,
                                                            },
                                                        }"
                                                        class="d-inline-block text-info text-capitalize"
                                                    >
                                                        details
                                                    </router-link>
                                                </div>
                                            </span>
                                        </router-link>
                                    </td>

                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'ApplicationsCategory',
                                                params: {
                                                    type: 'disapproved',
                                                    id: item.id,
                                                },
                                            }"
                                            title="disapproved"
                                        >
                                            <span class="fw-bold">
                                                {{
                                                    item.cp_application_dis_approved_count ??
                                                    0
                                                }}
                                                <div
                                                    class="text-center action_btns_inline"
                                                >
                                                    <router-link
                                                        :to="{
                                                            name: 'ApplicationsCategory',
                                                            params: {
                                                                type: 'disapproved',
                                                                id: item.id,
                                                            },
                                                        }"
                                                        class="d-inline-block text-info text-capitalize"
                                                    >
                                                        details
                                                    </router-link>
                                                </div>
                                            </span>
                                        </router-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1"
                    >
                        <pagination
                            :data="all_users"
                            :method="get_all_applications"
                        />
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
import { application_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.get_all_applications();
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_all_applications: "all",
            user_delete: "delete",
        }),
    },
    computed: {
        ...mapState(application_setup_store, {
            all_users: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_applications();
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
