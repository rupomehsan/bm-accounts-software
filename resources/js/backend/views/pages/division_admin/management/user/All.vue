<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">User Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <!-- <span>
                            <router-link :to="{ name: `CreateAdminSupportUser` }"
                                class="btn rounded-pill btn-outline-info">
                                <i class="fa fa-pencil me-5px"></i>
                                Create
                            </router-link>
                        </span> -->
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>All Users</h6>
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
                                    <!-- <th>
                                        <input type="checkbox" class="form-check-input" />
                                    </th> -->
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
                                    <!-- <th aria-label="actions">Actions</th> -->
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr
                                    v-for="(item, index) in all_users.data"
                                    :key="item.id"
                                >
                                    <!-- <td>
                                        <input type="checkbox" class="form-check-input" />
                                    </td> -->
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
                                    <!-- <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
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

                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                                    name: 'CreateAdminSupportUser',
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
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
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
        await this.user_get_all();
        this.loaded = true;
    },
    methods: {
        ...mapActions(user_setup_store, {
            user_get_all: "all",
            user_delete: "delete",
        }),
    },
    computed: {
        ...mapState(user_setup_store, {
            all_users: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.user_get_all("users");
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
