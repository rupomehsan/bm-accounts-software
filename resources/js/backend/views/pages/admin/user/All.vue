<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">User Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link :to="{ name: `Create` }" class="btn rounded-pill btn-outline-info">
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
                            All Users
                            <!---->
                        </h6>
                        <div class="search">
                            <form action="#"><input placeholder="search..." type="search"
                                    class="form-control border border-info" /></form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a href="#" class="btn px-3 btn-outline-secondary"><i class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>
                                    <!---->
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
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th><input type="checkbox" class="form-check-input" /></th>
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Photo
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Name
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Email
                                        <!---->
                                    </th>
                                    <th class="cursor_n_resize">
                                        Mobile NO
                                        <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Status
                                        <!---->
                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr v-for="(user, index) in this.all_users" :key="user.id">
                                    <td><input type="checkbox" class="form-check-input" /></td>
                                    <td>{{ index + 1 }}</td>
                                    <td><img :src="user.image" alt="Avatar" class="rounded-circle" style="height: 30px;" />
                                    </td>
                                    <td>
                                        <span class="text-warning cursor_pointer">
                                            {{ user.full_name }}
                                        </span>
                                    </td>
                                    <td>zack.sauer@example.org</td>
                                    <td>
                                        (345) 290-6222
                                    </td>
                                    <td>
                                        <span class="badge bg-label-success me-1">active</span>
                                        <!---->
                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>
                                                <li>
                                                    <a href="">
                                                        <i class="fa text-info fa-eye"></i>
                                                        Quick View
                                                    </a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a href="#/user/details/43" class="">
                                                            <i class="fa text-secondary fa-eye"></i>
                                                            Details
                                                        </a>
                                                        <!---->
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a href="#/user/edit/43" class="">
                                                            <i class="fa text-warning fa-pencil"></i>
                                                            Edit
                                                        </a>
                                                        <!---->
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <!---->
                                                        <!---->
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
                        <div class="d-inline-block">
                            <ul class="pagination pagination-sm">
                                <li class="page-item pagination-prev-nav">
                                    <a href="#" aria-label="Previous" class="page-link">
                                        <span><i class="fa fa-angle-left"></i> Previous</span>
                                    </a>
                                </li>
                                <li class="page-item pagination-page-nav">
                                    <a href="#" class="page-link">
                                        1
                                    </a>
                                </li>
                                <li class="page-item pagination-page-nav">
                                    <a href="#" class="page-link">
                                        2
                                    </a>
                                </li>

                                <li class="page-item pagination-next-nav ">
                                    <a href="#" aria-label="Next" class="page-link" tabindex="-1">
                                        <span>Next <i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="">
                                    <option value="10"> 10 </option>
                                    <option value="5"> 5 </option>
                                    <option value="25"> 25</option>
                                    <option value="50">50 </option>
                                    <option value="100"> 100 </option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block"><span>Total:</span> <span>104</span></div>
                        </div>

                    </div>
                </div>
                <div class="canvas_backdrop">
                    <!---->
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
import { mapActions, mapState } from 'pinia';
import { user_setup_store } from "./setup/store"

export default {
    created: async function () {
        await this.user_get_all()

        console.log("dataa", this.all_users)
    },
    methods: {
        ...mapActions(user_setup_store, {
            user_get_all: 'all',
        }),
    },
    computed: {
        ...mapState(user_setup_store, {
            all_users: 'all_data',
        }),
    }


};
</script>

<style></style>
