<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} receipt book assign
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllAssignReceiptBook` }"
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
import { receipt_book_assign_store } from "./setup/store";
import roleSetup from '../../partials/role_setup';

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
    }),

    created: async function () {
        let id = this.$route.query.id;
        await this.get_all_user();
        await this.get_all_receipt_books();
        if (this.all_users) {
            this.form_fields.forEach((fields) => {
                if (fields.name == 'division_id') {
                    fields.data_list = []
                    this.all_users.data.forEach((item) => {
                        let dataList = {}
                        dataList.label = item.full_name
                        dataList.value = item.id
                        fields.data_list.push(dataList)
                    })
                }
            })
        }

        if (this.all_receipt_books) {
            this.form_fields.forEach((fields) => {
                if (fields.name == 'account_receipt_book_id') {
                    fields.data_list = []
                    this.all_receipt_books.data.forEach((item) => {
                        let dataList = {}
                        dataList.label = item.receipt_book_no
                        dataList.value = item.id
                        fields.data_list.push(dataList)
                    })
                }
            })
        }



        if (id) {
            this.param_id = id;
            await this.receipt_book_assign_get(id);
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
        }
    },

    methods: {

        ...mapActions(receipt_book_assign_store, {
            receipt_book_assign_update: "update",
            receipt_book_assign_get: "get",
            receipt_book_assign_store: "store",
            get_all_user: "get_all_user",
            get_all_receipt_books: "get_all_receipt_books",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.receipt_book_assign_update($event.target, this.param_id);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${role}AllAssignReceiptBook` });
                }
            } else {
                let response = await this.receipt_book_assign_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${role}AllAssignReceiptBook` });
                }
            }
        },

    },
    computed: {
        ...mapState(receipt_book_assign_store, {
            single_user: "single_data",
            all_users: "all_users",
            all_receipt_books: "all_receipt_books",
        }),
    },
};
</script>

<style></style>
