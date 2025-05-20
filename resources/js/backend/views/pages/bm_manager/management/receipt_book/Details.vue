<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} receipt
                                book
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `${role}AllReceiptBook` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-7">
                        <table
                            class="table table-bordered table-striped text-white"
                        >
                            <thead>
                                <tr>
                                    <th class="w-25">id</th>
                                    <th class="text-center">:</th>
                                    <th>{{ single_user.id }}</th>
                                </tr>
                                <tr>
                                    <th>Receipt book no</th>
                                    <th class="text-center">:</th>
                                    <th>{{ single_user.receipt_book_no }}</th>
                                </tr>
                                <tr>
                                    <th>Start Page</th>
                                    <th class="text-center">:</th>
                                    <th>
                                        {{
                                            single_user.receipt_start_serial_no
                                        }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>End Page</th>
                                    <th class="text-center">:</th>
                                    <th>
                                        {{ single_user.receipt_end_serial_no }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>Approval</th>
                                    <th class="text-center">:</th>
                                    <th>
                                        {{
                                            single_user.is_approval
                                                ? "Approved"
                                                : "Rejected"
                                        }}
                                    </th>
                                </tr>
                                <tr>
                                    <th>Comment</th>
                                    <th class="text-center">:</th>
                                    <th>{{ single_user.comment }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { receipt_book_store } from "./setup/store.js";
import roleSetup from "../../partials/role_setup.js";

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
    }),

    created: async function () {
        let id = this.$route.query.id;

        if (id) {
            this.param_id = id;
            await this.user_get(id);
        } else {
            form_fields.forEach((item) => {
                item.value = "";
            });

            await this.latest_account_receipt_book();
            if (this.latest_account_receipt_book_data) {
                this.form_fields[0].value =
                    this.latest_account_receipt_book_data.receipt_book_no + 1;
                this.form_fields[1].value =
                    this.latest_account_receipt_book_data
                        .receipt_end_serial_no + 1;
                this.form_fields[2].value =
                    this.latest_account_receipt_book_data
                        .receipt_end_serial_no + 40;
            } else {
                this.form_fields[0].value = 1;
                this.form_fields[1].value = 1;
                this.form_fields[2].value = 40;
            }
        }
    },

    methods: {
        ...mapActions(receipt_book_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            latest_account_receipt_book: "latest_account_receipt_book",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
                // this.$router.push({ name: `AllReceiptBook` });
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `AllReceiptBook` });
                }
            }
        },
    },
    computed: {
        ...mapState(receipt_book_store, {
            single_user: "single_data",
            latest_account_receipt_book_data:
                "latest_account_receipt_book_data",
        }),
    },
};
</script>

<style></style>
