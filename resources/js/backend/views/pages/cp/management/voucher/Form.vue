<template>
    <div class="page-body">
        <div class="py-2">
            <div class="row">
                <div :class="param_id ? 'col-8' : 'col-12'">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>
                                        {{ param_id ? "Update" : "Create new" }}
                                        voucher
                                    </h6>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <div class="btns">
                                        <button
                                            class="btn rounded-pill btn-outline-warning"
                                            @click="$router.go(-1)"
                                        >
                                            <i
                                                class="fa fa-arrow-left me-5px"
                                            ></i>
                                            Back
                                        </button>
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
                                            <div
                                                class="admin_form col_2"
                                                v-if="loded"
                                            >
                                                <template
                                                    v-for="(
                                                        form_field, index
                                                    ) in form_fields"
                                                    :key="index"
                                                >
                                                    <common-input
                                                        :label="
                                                            form_field.label
                                                        "
                                                        :type="form_field.type"
                                                        :onchange="amountInText"
                                                        :name="form_field.name"
                                                        :multiple="
                                                            form_field.multiple
                                                        "
                                                        :value="
                                                            form_field.value
                                                        "
                                                        :disabled="
                                                            form_field.disabled
                                                        "
                                                        :data_list="
                                                            form_field.data_list
                                                        "
                                                    />
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card-footer text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-outline-info"
                                    >
                                        <i class="fa fa-upload"></i>
                                        Submit
                                    </button>
                                </div> -->
                            </form>
                            <!-- <div class="image-container d-none" id="imageContainer">
                                <button class=" btn-sm btn-info" @click="removeImage">X</button>
                                <img id="zoomImage" src="" alt="" class="relative rounded" @click="zoomIn()">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-4" v-if="param_id">
                    <div class="card mt-2">
                        <div class="card-header p-0 m-0">
                            <h6 class="mt-2 px-1 text-bold">
                                Approval Voucher
                            </h6>
                        </div>
                        <div class="card-body m-0 p-2">
                            <form @submit.prevent="ApprovalSubmitHandler">
                                <input
                                    type="hidden"
                                    name="id"
                                    :value="param_id"
                                />
                                <input
                                    type="hidden"
                                    name="approved_by_admin"
                                    value="1"
                                />
                                <div class="mb-3">
                                    <label>Voucher Status</label>
                                    <select
                                        v-model="voucher_status"
                                        name="voucher_status"
                                        id=""
                                        class="form-select mt-2"
                                    >
                                        <option value="">Pending</option>
                                        <option value="approved">
                                            Approve
                                        </option>
                                        <option value="canceled">Cancel</option>
                                    </select>
                                </div>
                                <div
                                    class="mb-3"
                                    v-if="voucher_status == 'canceled'"
                                >
                                    <label for="" class="mb-2"
                                        >Cancel Description</label
                                    >
                                    <textarea
                                        v-model="cancel_comment"
                                        name="cancel_comment"
                                        class="form-control"
                                    ></textarea>
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        class="btn btn-sm px-2 text-sm btn-primary"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
        form_fields,
        param_id: null,
        loded: false,
        voucher_status: "",
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
                            field.value = value[1]?.url;
                        }
                    });
                });

                if (this.single_user.is_canceled) {
                    this.voucher_status = "canceled";
                    this.cancel_comment = this.single_user.cancel_comment;
                }
                if (this.single_user.approved_by_cp) {
                    this.voucher_status = "approved";
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
        convertAmount,
        ...mapActions(voucher_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            getAllAccountExpenseCategories: "getAllAccountExpenseCategories",
            SupportVoucherDeleted: "SupportVoucherDeleted",
            SupportVoucherApprovedByAdmin: "SupportVoucherApprovedByAdmin",
            VoucherCancelComment: "VoucherCancelComment",
        }),

        amountInText(v) {
            document.querySelector('[name="amount_in_text"]').value =
                this.convertAmount(v.target.value);
        },

        submitHandler: async function ($event) {
            return false;
            if (this.param_id) {
                let response = await this.user_update(
                    $event.target,
                    this.param_id
                );
                console.log(response);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully Updated");
                }
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                }
            }
        },

        ApprovalSubmitHandler: async function () {
            let response = await this.SupportVoucherApprovedByAdmin(
                event.target
            );
            if (response.data.status === "success") {
                window.s_alert("Data successcully Updated");
            }
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
