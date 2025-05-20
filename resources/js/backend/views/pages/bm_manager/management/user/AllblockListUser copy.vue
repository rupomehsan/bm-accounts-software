<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Block list Users</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link
                                :to="{ name: `CreateUser` }"
                                class="btn rounded-pill btn-outline-info"
                            >
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
                                    <th class="cursor_n_resize">Photo</th>
                                    <th class="cursor_n_resize">Name</th>
                                    <th class="cursor_n_resize">User Role</th>
                                    <th class="cursor_n_resize">Email</th>
                                    <th class="cursor_n_resize">
                                        Mobile NO
                                        <span
                                            ><i
                                                class="fa-solid fa-arrow-up-z-a text-warning"
                                            ></i
                                        ></span>
                                    </th>
                                    <th class="cursor_n_resize">Status</th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr
                                    v-for="(item, index) in all_users.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>
                                    <td>
                                        <img
                                            :src="item.image"
                                            alt="Avatar"
                                            class="rounded-circle"
                                            style="height: 30px; width: 30px"
                                        />
                                    </td>
                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.full_name }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.roles?.[0].name }}
                                        </span>
                                    </td>
                                    <td>{{ item.email }}</td>
                                    <td>{{ item.phone ?? "N/A" }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-success me-1"
                                            >{{ item.status }}</span
                                        >
                                    </td>
                                    <td>
                                        <a
                                            @click.prevent="
                                                unblockUser(item.id)
                                            "
                                            class="btn btn-sm btn-outline-secondary"
                                            >Unblock</a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1"
                    >
                        <pagination :data="all_users" :method="user_get_all" />
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
import { user_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
        loaded: false,
    }),
    created: async function () {
        await this.block_list_user_get_all();
        this.loaded = true;
    },
    methods: {
        ...mapActions(user_setup_store, {
            block_list_user_get_all: "block_list_user_get_all",
            user_delete: "delete",
            unblock_user: "unblock_user",
        }),
        unblockUser(userId) {
            this.unblock_user(userId);
        },
    },
    computed: {
        ...mapState(user_setup_store, {
            all_users: "all_data",
        }),
    },
};
</script>

<style></style>
