<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">
                            {{ all_applications_by_category.title }}
                            Applications
                        </h5>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
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
                                    <th style="width: 50px">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </th>
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                    </th>
                                    <th class="cursor_n_resize">Applicant</th>
                                    <th class="cursor_n_resize">Approved</th>

                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="(
                                        item, index
                                    ) in all_applications_by_category.applications"
                                    :key="item.id"
                                >
                                    <td>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </td>
                                    <td>{{ item.id }}</td>

                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.user.full_name }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="" title="approved"
                                            ><span class="fw-bold">
                                                {{
                                                    item.is_approve == 1
                                                        ? "Yes"
                                                        : "No"
                                                }}</span
                                            ></a
                                        >
                                    </td>

                                    <td>
                                        <div class="table_actions">
                                            <a
                                                @click.prevent=""
                                                href="#"
                                                class="btn btn-sm btn-outline-secondary"
                                                ><i class="fa fa-gears"></i
                                            ></a>
                                            <ul>
                                                <!-- <li>
                                                    <a href="">
                                                        <i
                                                            class="fa text-info fa-eye"
                                                        ></i>
                                                        Quick View
                                                    </a>
                                                </li> -->
                                                <li>
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
                                                </li>
                                                <li>
                                                    <span>
                                                        <router-link
                                                            :to="{
                                                                name: 'Create',
                                                                query: {
                                                                    id: item.id,
                                                                },
                                                            }"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-warning fa-pencil"
                                                            ></i>
                                                            Edit
                                                        </router-link>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a
                                                            @click.prevent="
                                                                user_delete(
                                                                    item.id
                                                                )
                                                            "
                                                            href="#"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-danger fa-trash"
                                                            ></i>
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
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1"
                    >
                        <pagination
                            :data="all_applications_by_category"
                            :method="get_applications_by_category"
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
                                <span>{{
                                    all_applications_by_category.total
                                }}</span>
                            </div>
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
import { application_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        let id = this.$route.params.id;
        // alert(id)
        await this.get_applications_by_category(id);
        // console.log("myRes",this.all_applications_by_category)
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_applications_by_category: "get_applications_by_category",
        }),
    },
    computed: {
        ...mapState(application_setup_store, {
            all_applications_by_category: "all_applications_by_category",
        }),
    },
};
</script>

<style></style>
