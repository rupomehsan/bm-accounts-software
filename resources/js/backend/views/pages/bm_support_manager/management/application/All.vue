<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-3">
                        <h5 class="m-0">Application Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-info" @click="get_all_applications()">
                            All
                            <span v-if="all_applications" class="fw-bold">{{
                            `(${all_applications?.totalApproved + all_applications?.totalNotApproved})`
                        }}</span>
                        </button>
                        <button class="btn btn-primary mx-3" @click="getApllicationByStatus('approved')">
                            Approved <span v-if="all_applications" class="fw-bold">{{
                            `(${all_applications?.totalApproved})`
                        }}</span>
                        </button>
                        <button class="btn btn-danger" @click="getApllicationByStatus('not-approved')">
                            Not approved <span v-if="all_applications" class="fw-bold">{{
                            `(${all_applications?.totalNotApproved})`
                        }}</span>
                        </button>
                    </div>
                    <div class="col-lg-3 text-end">
                        <span>
                            <router-link :to="{ name: `${role}ApplicationCreate` }"
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
                        <h6>
                            All Applications

                        </h6>
                        <div class="search">
                            <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
                            </form>
                        </div>
                        <!-- <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
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
                            </div>
                        </div> -->
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
                                        Applicant

                                    </th>
                                    <th class="cursor_n_resize">
                                        Application Category

                                    </th>
                                    <th class="cursor_n_resize">
                                        Subject

                                    </th>
                                    <th class="cursor_n_resize">
                                        Approval

                                    </th>
                                    <th class="cursor_n_resize">
                                        Status

                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr v-for="item in all_applications.data?.data" :key="item.id">
                                    <!-- <td>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.user?.full_name }}</td>
                                    <td>
                                        {{
                            item.application_category?.title ??
                            "N/A"
                        }}
                                    </td>
                                    <td>
                                        <span>
                                            {{ item.subject ?? "N/A" }}
                                        </span>
                                    </td>
                                    <td>
                                        <span :class="item.is_approve == 0 ||
                            item.is_approve == null
                            ? 'text-warning'
                            : 'text-success'
                            " class="cursor_pointer">
                                            {{
                            item.is_approve == 1
                                ? "Approved"
                                : "Not approved"
                        }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-label-success me-1">{{ item.status }}</span>

                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                            name: `${role}ApplicationCreate`,
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
                            application_delete(
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
                        <pagination :data="all_applications.data" :method="get_all_applications" v-if="loaded" />
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
                                <span>{{ all_applications.total }}</span>
                            </div>
                        </div> -->
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
        role: window.role.bmSupport,
        offset: "5",
        search_data: "",
        loaded: false,
    }),
    created: async function () {
        await this.get_all_applications(this.api_url.href);
        this.loaded = true;
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_all_applications: "all",
            application_delete: "delete",
            get_apllication_by_status: 'get_apllication_by_status'
        }),
        getApllicationByStatus(status) {
            this.get_apllication_by_status(status)
        }
    },
    computed: {
        ...mapState(application_setup_store, {
            all_applications: "all_data",
            api_url: "api_url",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_applications();
        },
        search_data: function (newSearchData, oldSearchData) {
            clearTimeout(this.searchTimer);
            this.searchTimer = setTimeout(async () => {
                this.api_url.searchParams.set('search', this.search_data);
                await this.get_all_applications(this.api_url.href);
            }, 500);
        },
    },

};
</script>

<style></style>
