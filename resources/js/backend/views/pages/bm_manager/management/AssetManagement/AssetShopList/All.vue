<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2 justify-content-between">
                    <div class="col-lg-4">
                        <h5 class="m-0 text-capitalize"> {{ page_title }}</h5>
                    </div>
                    <div v-if="child_items.length" class="btn-group m-1 col-lg-4"
                        onclick="document.getElementById('table-actions').classList.toggle('show')">
                        <button type="button" class="btn btn-light waves-effect waves-light">Actions</button>
                        <button type="button"
                            class="btn btn-light split-btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                            data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu" style="" id="table-actions">
                            <a href="javaScript:void();" class="dropdown-item" @click="bulkActions('delete')">Delete</a>
                            <a href="javaScript:void();" class="dropdown-item" @click="bulkActions('active')">Active</a>
                            <a href="javaScript:void();" class="dropdown-item"
                                @click="bulkActions('inactive')">Inactive</a>

                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <span>
                            <router-link :to="{ name: `${role}Create${route_prefix}` }"
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
                                        shop name

                                    </th>
                                    <th class="cursor_n_resize">
                                        owner name

                                    </th>

                                    <th class="cursor_n_resize">
                                        status

                                    </th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr v-for="(item, index) in all_data.data" :key="item.id">
                                    <!-- <td>
                                            <input type="checkbox" class="form-check-input" />
                                        </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.shop_name }}
                                    </td>
                                    <td>
                                        {{ item.owner_name }}
                                    </td>

                                    <td>
                                        {{ item.status }}
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
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                            name: `${role}Create${route_prefix}`,
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
                            delete_data(
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
                        <pagination :data="all_data" :method="get_all_data" />
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
                                <span>{{ all_data.total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import { mapActions, mapState } from 'pinia'
import { asset_shop_list_setup_store } from './setup/store';
import setup from "./setup";
export default {
    data: () => ({
        role: window.role.bm,
        route_prefix: '',
        page_title: '',
        parent_item: false,
        offset: 5,
        loaded: false,
        search_data: '',
        child_items: []
    }),
    created: async function () {
        this.route_prefix = setup.route_prefix;
        this.page_title = setup.page_title;
        await this.get_all_data()
        this.loaded = true
    },
    methods: {
        ...mapActions(asset_shop_list_setup_store, {
            get_all_data: 'all',
            delete_data: 'delete',
            bulk_action: 'bulk_action',
        }),
        toggleParentCheckbox() {
            this.child_items = event.target.checked ? this.all_data.data.map(item => item.id) : []
        },

        toggleChildCheckbox(id) {
            let isChecked = event.target.checked
            if (isChecked) {
                this.child_items.push(id)
            } else {
                this.child_items = this.child_items.filter(item => item != id)
            }

        },
        bulkActions(action) {
            this.bulk_action(action, this.child_items)
            this.parent_item = false
            this.child_items = []
        }

    },
    computed: {
        ...mapState(asset_shop_list_setup_store, {
            all_data: 'all_data',
        })
    }
}
</script>

<style></style>
