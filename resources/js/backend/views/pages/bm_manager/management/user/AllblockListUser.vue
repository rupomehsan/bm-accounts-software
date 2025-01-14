<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Block User Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link
                                :to="{ name: `${role}CreateUser` }"
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
                        <h6>All Blocked Users</h6>
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
                                        <a
                                            href=""
                                            @click.prevent="
                                                ExportData(all_users.data)
                                            "
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Export All
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
                                    <th aria-label="actions">Actions</th>
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
                        <pagination
                            :data="all_users"
                            :method="block_list_user_get_all"
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
import { CsvBuilder } from "filefy";
export default {
    data: () => ({
        role: window.role.bm,
        offset: "10",
        search_data: "",
        loaded: false,
    }),
    created: async function () {
        this.api_url.searchParams.set("is_blocked", 1);
        await this.block_list_user_get_all(this.api_url.href);
        this.loaded = true;
    },
    methods: {
        ...mapActions(user_setup_store, {
            block_list_user_get_all: "block_list_user_get_all",
            user_delete: "delete",
            unblock_user: "unblock_user",
        }),
        ExportData(data = [], prefix_name = "block_user") {
            let dataArray = [];
            data.forEach((item) => {
                let temp = {};
                temp.id = item.id;
                temp.name = item.full_name;
                temp.phone = item.phone;
                temp.role = item.roles[0]?.name;
                temp.email = item.email;
                temp.status = item.is_blocked ? "Blocked" : "Active";
                dataArray.push(temp);
            });
            let col = Object.keys(dataArray[0]);
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
        unblockUser(userId) {
            this.unblock_user(userId);
        },
    },
    computed: {
        ...mapState(user_setup_store, {
            all_users: "all_data",
            api_url: "api_url",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            this.api_url.searchParams.set("offset", newOffset);
            await this.block_list_user_get_all(this.api_url.href);
        },
        search_data: async function (newSearchData, oldSearchData) {
            clearTimeout(this.searchTimer);
            this.searchTimer = setTimeout(async () => {
                this.api_url.searchParams.set("search", this.search_data);
                await this.block_list_user_get_all(this.api_url.href);
            }, 500);
        },
    },
};
</script>

<style></style>
