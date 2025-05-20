<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Receipt Book Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button
                            class="btn btn-info"
                            @click="get_all_receipt_books()"
                        >
                            All
                            <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${all_receipt_books?.totalApproved + all_receipt_books?.totalNotApproved})`
                            }}</span>
                        </button>
                        <button
                            class="btn btn-primary mx-3"
                            @click="getReceiptBookByStatus('approved')"
                        >
                            Approved <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${all_receipt_books?.totalApproved})`
                            }}</span>
                        </button>
                        <button
                            class="btn btn-danger"
                            @click="getReceiptBookByStatus('not-approved')"
                        >
                            Not approved <span v-if="all_receipt_books" class="fw-bold">{{
                                `(${all_receipt_books?.totalNotApproved})`
                            }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            All Receipt Books

                        </h6>
                        <div class="search">
                            <!-- <form action="#">
                                <input
                                    v-model.debounce:1000ms="search_data"
                                    placeholder="search..."
                                    type="search"
                                    class="form-control border border-info"
                                />
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
                                    <th class="cursor_n_resize">
                                        Receipt Book No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt Start Serial No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Receipt End Serial No
                                    </th>
                                    <th class="cursor_n_resize">Date</th>
                                    <th class="cursor_n_resize">Status</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="item in all_receipt_books.data?.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>

                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.receipt_book_no }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ item.receipt_start_serial_no }}
                                    </td>

                                    <td>
                                        {{ item.receipt_end_serial_no }}
                                    </td>
                                    <td>
                                        {{
                                            new Date(item.created_at).toLocaleString()
                                        }}
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                :id="
                                                    'flexSwitchCheck_' + item.id
                                                "
                                                :checked="
                                                    item.is_approvel === 1
                                                "
                                                @change="
                                                    updateStatus(
                                                        item.is_approvel,
                                                        item.id
                                                    )
                                                "
                                            />
                                            <label
                                                class="form-check-label"
                                                for="flexSwitchCheckDefault"
                                                >{{
                                                    item.is_approvel == 1
                                                        ? "Approved"
                                                        : "Not approved"
                                                }}</label
                                            >
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
                            :data="all_receipt_books"
                            :method="get_all_receipt_books"
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
                                <span>{{ all_receipt_books.total }}</span>
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
import { receipt_book_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        await this.get_all_receipt_books();
    },
    methods: {
        ...mapActions(receipt_book_setup_store, {
            get_all_receipt_books: "all",
        }),

        getReceiptBookByStatus(status) {
            this.get_receipt_book_by_status(status);
        },

        async updateStatus(status, id) {
            var data = await window.s_confirm();
            if (data) {
                let approval = status ? 0 : 1;
                this.update_receipt_book_by_status(approval, id);
            } else {
                const checkboxRef = document.getElementById(
                    `flexSwitchCheck_${id}`
                );
                if (checkboxRef) {
                    checkboxRef.checked = !checkboxRef.checked;
                }
            }
        },
    },
    computed: {
        ...mapState(receipt_book_setup_store, {
            all_receipt_books: "all_data",
            get_receipt_book_by_status: "get_receipt_book_by_status",
            update_receipt_book_by_status: "update_receipt_book_by_status",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_receipt_books();
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
