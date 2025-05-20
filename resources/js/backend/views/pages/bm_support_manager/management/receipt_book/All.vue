<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-3">
                        <h5 class="m-0">Receipt Book Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button
                            class="btn btn-info"
                            @click="get_all_receipt_books()"
                        >
                            All
                            <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${
                                    all_receipt_books?.totalApproved +
                                    all_receipt_books?.totalNotApproved
                                })`
                            }}</span>
                        </button>
                        <button
                            class="btn btn-primary mx-3"
                            @click="getReceiptBookByStatus('approved')"
                        >
                            Approved
                            <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${all_receipt_books?.totalApproved})`
                            }}</span>
                        </button>
                        <button
                            class="btn btn-danger"
                            @click="getReceiptBookByStatus('not-approved')"
                        >
                            Not approved
                            <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${all_receipt_books?.totalNotApproved})`
                            }}</span>
                        </button>
                    </div>
                    <div class="col-lg-3 text-end">
                        <span>
                            <router-link
                                :to="{ name: `${role}ReceiptBookCreate` }"
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
                        <h6>All Receipt Books</h6>
                        <div class="search">
                            <!-- <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
                            </form> -->
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
                                                receiptBookExport(
                                                    all_receipt_books.data?.data
                                                )
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
                                        <input type="checkbox" class="form-check-input" @click="toggleParentItem" />
                                    </th> -->
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt Book No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt Start Serial No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt End Serial No
                                    </th>
                                    <th class="cursor_n_resize">
                                        is approved ?
                                    </th>
                                    <th class="cursor_n_resize">Status</th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr
                                    v-for="(item, index) in all_receipt_books
                                        .data?.data"
                                    :key="item.id"
                                >
                                    <!-- <td>
                                        <input type="checkbox" class="form-check-input"
                                            :checked="child_item.includes(item.id)" @click="toggleChildItem(item.id)" />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.receipt_book_no }}
                                    </td>
                                    <td>
                                        {{ item.receipt_start_serial_no }}
                                    </td>
                                    <td>{{ item.receipt_end_serial_no }}</td>
                                    <td>
                                        {{
                                            item.is_approvel == 1 ? "yes" : "no"
                                        }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-label-success me-1"
                                            >{{ item.status }}</span
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
                                                        <router-link
                                                            :to="{
                                                                name: `${role}ReceiptBookCreate`,
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
                        class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1"
                    >
                        <pagination
                            :data="all_receipt_books.data"
                            :method="get_all_receipt_books"
                            v-if="loaded"
                        />
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
                                <span>{{ all_receipt_books.total }}</span>
                            </div>
                        </div> -->
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
import { receipt_book_store } from "./setup/store";
import { CsvBuilder } from "filefy";
import roleSetup from "../../partials/role_setup";

export default {
    data: () => ({
        role: roleSetup.role,
        offset: "5",
        search_data: "",
        loaded: false,
        child_item: [],
        parent_item: false,
    }),
    created: async function () {
        await this.get_all_receipt_books();
        this.loaded = true;
    },
    methods: {
        ...mapActions(receipt_book_store, {
            get_all_receipt_books: "all",
            user_delete: "delete",
        }),

        toggleParentItem() {
            this.child_item = event.target.checked
                ? this.all_receipt_books.data.map((item) => item.id)
                : [];
        },

        toggleChildItem(id) {
            let isChecked = event.target.checked;
            if (isChecked) {
                this.child_item.push(id);
            } else {
                this.child_item = this.child_item.filter((item) => item != id);
            }
        },
        async bulkActions() {
            let response = await axios.delete(
                `account-receipt-books/${null}?items=${this.child_item}`
            );
            if (response.data.status == "success") {
                window.s_alert(response.data?.message);
                this.get_all_receipt_books();
                this.parent_item = false;
                this.child_item = [];
            }
        },
        getReceiptBookByStatus(status) {
            this.get_receipt_book_by_status(status);
        },
        receiptBookExport(data = [], prefix_name = "receipt_book") {
            let dataArray = [];
            data.forEach((item) => {
                let temp = {};
                temp.receipt_book_no = item.receipt_book_no;
                temp.receipt_start_serial_no = item.receipt_start_serial_no;
                temp.receipt_end_serial_no = item.receipt_end_serial_no;
                temp.is_approvel = item.is_approvel;
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
    },
    computed: {
        ...mapState(receipt_book_store, {
            all_receipt_books: "all_data",
            get_receipt_book_by_status: "get_receipt_book_by_status",
        }),
    },
};
</script>

<style></style>
