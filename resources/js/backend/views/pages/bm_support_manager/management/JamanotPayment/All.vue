<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0 text-lowercase"> {{ page_title }}</h5>
                    </div>
                    <div class="col-lg-6 text-end">
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
                        <div class="col-md-6" v-if="this.loaded">
                            <form @submit.prevent="SearchHandler($event)" ref="myForm">
                                <div class="d-flex gap-2">
                                    <div>
                                        <label for="">Start date</label>
                                        <date-field :label="`Start Date`" :name="`start_date`" :value="from_date" />
                                    </div>
                                    <div>
                                        <label for="">End date</label>
                                        <date-field :label="`End Date`" :name="`end_date`" :value="end_date" />
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="" @click.prevent="ExportData(all_data.data)">
                                            <i class="fa-regular fa-hand-point-right"></i>
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
                                    <th class="cursor_n_resize">
                                        User

                                    </th>

                                    <th class="cursor_n_resize">
                                        Given date

                                    </th>

                                    <th class="cursor_n_resize">
                                        Amount

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
                                        {{ item.user?.full_name }}
                                    </td>

                                    <td>
                                        {{ item.given_date }}
                                    </td>
                                    <td>
                                        {{ item.amount }}
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
                            name: `${role}CreateJamanotPayment`,
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
                                <span>{{ all_data.total }}</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'pinia'
import { jamanot_payment_setup_store } from './setup/store';
import setup from "./setup";
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        role: window.role.bmSupport,
        route_prefix: '',
        search_data: '',
        loaded: false,
        offset: 5,
        page_title: '',
        parent_item: false,
        child_items: []
    }),
    created: async function () {
        this.route_prefix = setup.route_prefix;
        this.page_title = setup.page_title;
        await this.get_all_data()
        // console.log(this.all_data.data);
        this.loaded = true
    },
    methods: {
        ...mapActions(jamanot_payment_setup_store, {
            get_all_data: 'all',
            delete_data: 'delete',
            bulk_action: 'bulk_action',
            get_data_by_search: 'get_data_by_search',
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
        },
        ExportData(data = [], prefix_name = 'jamanot_payment') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.user = item.user?.full_name
                temp.given_date = item.given_date
                temp.amount = item.amount
                dataArray.push(temp)
            })
            let col = Object.keys(dataArray[0]);
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
        SearchHandler() {
            this.get_data_by_search(this.$refs.myForm)
        },


    },
    computed: {
        ...mapState(jamanot_payment_setup_store, {
            all_data: 'all_data',
        })
    }
}
</script>

<style></style>
