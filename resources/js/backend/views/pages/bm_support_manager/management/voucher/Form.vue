<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} voucher
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `${role}AllVouchers` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-1 relative">
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form col_2" v-if="loded">
                                        <template
                                            v-for="(
                                                form_field, index
                                            ) in form_fields"
                                            :key="index"
                                        >
                                            <common-input
                                                :label="form_field.label"
                                                :type="form_field.type"
                                                :onchange="amountInText"
                                                :name="form_field.name"
                                                :multiple="form_field.multiple"
                                                :value="form_field.value"
                                                :data_list="
                                                    form_field.data_list
                                                "
                                            />
                                        </template>
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
                    <div class="image-container d-none" id="imageContainer">
                        <button class="btn-sm btn-info" @click="removeImage">
                            X
                        </button>
                        <img
                            id="zoomImage"
                            src=""
                            alt=""
                            class="relative rounded"
                            @click="zoomIn()"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div :class="modalShow ? 'show d-block' : ''" class="modal fade">
            <div class="modal-dialog">
                <form @submit.prevent="cancelCommentForm">
                    <input type="hidden" id="voucher_id" name="voucher_id" />
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Cancel voucher
                            </h5>
                            <button
                                @click="modalShow = !modalShow"
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="my-3"
                                    >Comment for cancelling approval :</label
                                >
                                <textarea
                                    class="form-control"
                                    name="cancel_comment"
                                    id="cancel_comment"
                                    cols="30"
                                    rows="5"
                                ></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                @click="modalShow = !modalShow"
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { voucher_setup_store } from "./setup/store";
import convertAmount from "../../../../../plugins/number_to_text_bangla.js";
export default {
    data: () => ({
        role: window.role.bmSupport,
        form_fields,
        param_id: null,
        loded: false,
        voucher_status: "approved",
        cancel_comment: "",
    }),

    created: async function () {
        await this.getAllAccountExpenseCategories();
        let id = this.$route.query.id;

        if (
            this.AllAccountExpenseCategories &&
            this.AllAccountExpenseCategories.length
        ) {
            form_fields.forEach((item) => {
                if (item.name == "account_expense_category_id") {
                    this.AllAccountExpenseCategories.forEach((data) => {
                        // console.log(data);
                        let dataList = {};
                        dataList.label = data.title;
                        dataList.value = data.id;
                        item.data_list.push(dataList);
                    });
                }
            });
        }

        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                        if (field.name == "image" && value[0] == "image_url") {
                            field.value = value[1].url;
                        }
                    });
                });
                if (this.single_user.is_canceled) {
                    this.voucher_status = "canceled";
                    this.cancel_comment = this.single_user.cancel_comment;
                }
            }
        } else {
            form_fields.forEach((item) => {
                if (item.name !== "date") item.value = "";
            });
        }

        this.loded = true;
    },

    methods: {
        ...mapActions(voucher_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            getAllAccountExpenseCategories: "getAllAccountExpenseCategories",
            SupportVoucherDeleted: "SupportVoucherDeleted",
            SupportVoucherApprovedByAdmin: "SupportVoucherApprovedByAdmin",
            VoucherCancelComment: "VoucherCancelComment",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.user_update(
                    $event.target,
                    this.param_id
                );
                console.log(response);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully Updated");
                    this.$router.push({ name: `${this.role}AllBmAllVouchers` });
                }
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `AllBmAllVouchers` });
                }
            }
        },

        convertAmount,
        amountInText(v) {
            if (v.target.name == "amount") {
                document.querySelector('[name="amount_in_text"]').value =
                    this.convertAmount(v.target.value);
            }
        },

        ApprovedByAdmin(id) {
            this.SupportVoucherApprovedByAdmin(id);
            this.$router.push({ name: `BmNotApprovedByBmVoucher` });
        },
    },
    computed: {
        ...mapState(voucher_setup_store, {
            single_user: "single_data",
            AllAccountExpenseCategories: "AllAccountExpenseCategories",
        }),
    },
};
</script>

<style></style>
