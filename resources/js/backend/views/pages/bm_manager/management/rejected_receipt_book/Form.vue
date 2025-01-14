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
                                    :to="{
                                        name: `${role}AllRejectedReceiptBook`,
                                    }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div
                                class="row justify-content-center"
                                v-if="loaded"
                            >
                                <div
                                    class="col-lg-12"
                                    v-for="(form_field, index) in form_fields"
                                    :key="index"
                                >
                                    <div class="admin_form form_1">
                                        <common-input
                                            :label="form_field.label"
                                            :type="form_field.type"
                                            :name="form_field.name"
                                            :multiple="form_field.multiple"
                                            :value="form_field.value"
                                            :data_list="form_field.data_list"
                                            :onchange="getResponse"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { rejected_receipt_book_store } from "./setup/store";
import roleSetup from "../../partials/role_setup";

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
        loaded: false,
    }),

    created: async function () {
        let id = this.$route.query.id;
        await this.get_all_account_receipt_book();

        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                        if (
                            field.name == "account_receipt_book_id" &&
                            value[0] == "account_receipt_book_id"
                        ) {
                            this.get_account_recept_no_by_receipt_book_id(
                                value[1]
                            );
                        }
                    });
                });
            }
        }

        if (this.all_account_receipt_book_data) {
            form_fields[0].data_list = [];
            this.all_account_receipt_book_data?.data.forEach((item) => {
                let fielData = {};
                fielData.label = item.receipt_book_no;
                fielData.value = item.id;
                form_fields[0].data_list.push(fielData);
            });
        }

        this.loaded = true;
    },

    methods: {
        ...mapActions(rejected_receipt_book_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            get_all_account_receipt_book: "get_all_account_receipt_book",
            get_receipt_book_remaining_pages:
                "get_receipt_book_remaining_pages",
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
        getResponse: async function (event, actionTitle = null, ref = null) {
            if (event.target.name == "account_receipt_book_id") {
                let account_receipt_book_id = event.target.value;
                if (account_receipt_book_id) {
                    this.get_account_recept_no_by_receipt_book_id(
                        account_receipt_book_id
                    );
                }
            }
        },
        get_account_recept_no_by_receipt_book_id: async function (
            account_receipt_book_id
        ) {
            let response = await this.get_receipt_book_remaining_pages(
                account_receipt_book_id
            );

            if (response.data.length) {
                response.data.forEach((item) => {
                    let selectData = {};
                    selectData.label = item.number;
                    selectData.value = item.number;
                    selectData.is_disabled = item.is_disabled;
                    this.form_fields
                        .find((item) => item.name == "account_receipt_no")
                        .data_list.push(selectData);
                });
            }
        },
    },
    computed: {
        ...mapState(rejected_receipt_book_store, {
            single_user: "single_data",
            all_account_receipt_book_data: "all_account_receipt_book_data",
        }),
    },
};
</script>

<style></style>
