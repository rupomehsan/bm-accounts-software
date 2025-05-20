<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Receipt Book Approval</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `ReceiptBookAll` }"
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
                        @submit.prevent="updateStatus"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row d-grid">
                                <div class="col-lg-6">
                                    <div class="mt-1 mb-3">
                                        <label for="" class="my-2"
                                            >Receipt book approval</label
                                        >
                                        <select
                                            name=""
                                            class="form-select"
                                            v-model="approval"
                                        >
                                            <option value="approved">
                                                Approved
                                            </option>
                                            <option value="reject">
                                                <!---->
                                                Reject
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="col-md-6"
                                    v-if="approval == 'reject'"
                                >
                                    <label for="" class="my-2"
                                        >Comment for rejection</label
                                    >
                                    <textarea
                                        class="form-control"
                                        name=""
                                        v-model="comment"
                                    ></textarea>
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
import { receipt_book_setup_store } from "./setup/store";
export default {
    data: () => ({
        form_fields,
        param_id: null,
        approval: "approved",
        comment: "",
    }),

    created: async function () {
        let id = this.$route.query.id;
        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                if (this.single_user.is_approvel) {
                    this.approval = "approved";
                } else {
                    (this.approval = "reject"),
                        (this.comment = this.single_user.comment);
                }
            }
        } else {
            form_fields.forEach((item) => {
                item.value = "";
            });
        }
    },

    methods: {
        ...mapActions(receipt_book_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            update_receipt_book_by_status: "update_receipt_book_by_status",
        }),

        async updateStatus() {
            let status = this.approval;
            await this.update_receipt_book_by_status(
                status,
                this.param_id,
                this.comment
            );
            this.$router.push({ name: `ReceiptBookAll` });
        },
    },
    computed: {
        ...mapState(receipt_book_setup_store, {
            single_user: "single_data",
        }),
    },
};
</script>

<style></style>
