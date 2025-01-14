<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3">
                        <h5 class="m-0">রশিদ বই প্রদান তালিকা</h5>
                    </div>
                    <div class="col-lg-3">
                        <select
                            name=""
                            id=""
                            class="form-select"
                            v-model="user_id"
                        >
                            <option value="">Select assign user</option>
                            <template
                                v-for="user in all_users_data.data"
                                :key="user.id"
                            >
                                <option :value="user.id">
                                    {{ user.full_name }}
                                </option>
                            </template>
                        </select>
                    </div>

                    <div class="col-lg-3 text-end">
                        <span>
                            <router-link
                                :to="{ name: `${role}AssingReceiptBookCreate` }"
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
                        <h6>All Receipt Book Assign</h6>
                        <div class="search"></div>
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
                                            receiptBookAssingExport(
                                                all_receipt_books.data
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
                                    <th class="cursor_n_resize">Assign to</th>
                                    <th class="cursor_n_resize">
                                        Receipt Book No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt Start Serial No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt End Serial No
                                    </th>
                                    <th class="cursor_n_resize">Status</th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr
                                    v-for="(
                                        item, index
                                    ) in all_receipt_books.data"
                                    :key="item.id"
                                >
                                    <!-- <td>
                                        <input type="checkbox" class="form-check-input"
                                            :checked="child_item.includes(item.id)" @click="toggleChildItem(item.id)" />
                                    </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>{{ item.user?.full_name }}</td>
                                    <td>
                                        {{
                                            item.account_receipt_book
                                                ?.receipt_book_no
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            item.account_receipt_book
                                                ?.receipt_start_serial_no
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            item.account_receipt_book
                                                ?.receipt_end_serial_no
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
                                                                name: `${role}AssingReceiptBookCreate`,
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
                            :data="all_receipt_books"
                            :method="get_all_receipt_books"
                        />
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select
                                    class=""
                                    v-model="limit"
                                    @change="set_limit($event.target.value)"
                                >
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
import { receipt_book_assign_store } from "./setup/store";
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
        user_id: "",
    }),
    created: async function () {
        await this.get_all_user();
        await this.get_all_receipt_books();
        this.loaded = true;
    },
    methods: {
        ...mapActions(receipt_book_assign_store, {
            get_all_receipt_books: "all",
            user_delete: "delete",
            get_all_user: "get_all_user",
            get_all_select_user_assign_receipt_book:
                "get_all_select_user_assign_receipt_book",
            set_limit: "set_limit",
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
        receiptBookAssingExport(
            data = [],
            prefix_name = "receipt_book_assing"
        ) {
            let dataArray = [];
            data.forEach((item) => {
                let temp = {};
                temp.user = item.user?.full_name;
                temp.receipt_book_no =
                    item.account_receipt_book?.receipt_book_no;
                temp.receipt_start_serial_no =
                    item.account_receipt_book?.receipt_start_serial_no;
                temp.receipt_end_serial_no =
                    item.account_receipt_book?.receipt_end_serial_no;
                dataArray.push(temp);
            });
            let col = [
                "Assign to",
                "Receipt Book No",
                "Receipt Start Serial No",
                "Receipt End Serial No",
            ];
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                .addRows(values)
                .exportFile();
        },
    },
    computed: {
        ...mapState(receipt_book_assign_store, {
            all_receipt_books: "all_data",
            get_receipt_book_by_status: "get_receipt_book_by_status",
            all_users_data: "all_users",
            limit: "limit",
        }),
    },

    watch: {
        user_id(id) {
            this.get_all_select_user_assign_receipt_book(id);
        },
    },
};
</script>

<style></style>
