<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Messages</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link
                                :to="{ name: `NotificationCreate` }"
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
                        <h6>
                            All Messages

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
                                    <!-- <th>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </th> -->
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID

                                    </th>
                                    <th class="cursor_n_resize">
                                        Photo

                                    </th>
                                    <th class="cursor_n_resize">
                                        Name

                                    </th>
                                    <th class="cursor_n_resize">
                                        Email

                                    </th>
                                    <th class="cursor_n_resize">
                                        Mobile NO
                                        <span
                                            ><i
                                                class="fa-solid fa-arrow-up-z-a text-warning"
                                            ></i
                                        ></span>
                                    </th>
                                    <th class="cursor_n_resize">
                                        Topic

                                    </th>
                                    <th class="cursor_n_resize">
                                        Status


                                    </th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="item in all_notifications.data"
                                    :key="item.id"
                                >
                                    <!-- <td>
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                        />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        <img
                                            :src="item.user?.image"
                                            alt="Avatar"
                                            class="rounded-circle"
                                            style="height: 30px"
                                        />
                                    </td>
                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.user?.full_name }}
                                        </span>
                                    </td>
                                    <td>{{ item.user?.email }}</td>
                                    <td>{{ item.user?.phone ?? "N/A" }}</td>
                                    <td>{{ item.topic ?? "N/A" }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-success me-1"
                                            >{{ item.status }}</span
                                        >

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1"
                    >
                        <pagination
                            :data="all_notifications"
                            :method="notification_get_all"
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
                                <span>{{ all_notifications.total }}</span>
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
import { message_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
        loaded: false,
    }),
    created: async function () {
        await this.notification_get_all();
        this.loaded = true;
    },
    methods: {
        ...mapActions(message_setup_store, {
            notification_get_all: "all",
            nitificatin_delete: "delete",
        }),
    },
    computed: {
        ...mapState(message_setup_store, {
            all_notifications: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.notification_get_all();
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
