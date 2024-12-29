<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} receipt book
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllReceiptBook` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12" v-for="(form_field, index) in form_fields" :key="index">
                                    <div class="admin_form form_1">
                                        <common-input :label="form_field.label" :type="form_field.type"
                                            :name="form_field.name" :multiple="form_field.multiple"
                                            :value="form_field.value" :data_list="form_field.data_list" />
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
import { receipt_book_store } from "./setup/store";
import roleSetup from '../../partials/role_setup';

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
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        } else {
            form_fields.forEach((item) => {
                item.value = "";
            });

            await this.latest_account_receipt_book()
            if (this.latest_account_receipt_book_data) {
                this.form_fields[0].value = this.latest_account_receipt_book_data.receipt_book_no + 1;
                this.form_fields[1].value = this.latest_account_receipt_book_data.receipt_end_serial_no + 1;
                this.form_fields[2].value = this.latest_account_receipt_book_data.receipt_end_serial_no + 40;
            }else{
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
            latest_account_receipt_book_data: "latest_account_receipt_book_data",
        }),
    },
};
</script>

<style></style>
