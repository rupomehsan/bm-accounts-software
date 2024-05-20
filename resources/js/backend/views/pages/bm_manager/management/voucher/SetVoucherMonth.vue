<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Set month for voucher</h6>
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
                                <div class="col-lg-6">
                                    <p class="text-center">
                                        Current active month is (
                                        <span class="fw-bold text-info">{{
                                            act_month
                                        }}</span>
                                        )
                                    </p>
                                    <div class="form-group">
                                        <label for="" class="my-3"
                                            >Select month</label
                                        >
                                        <input
                                            type="month"
                                            v-model="month"
                                            name="month"
                                            id="month"
                                            class="form-control"
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
import { voucher_setup_store } from "./setup/store";
import { Logger } from "sass";
export default {
    data: () => ({
        role: window.role.bm,
        month: "",
        act_month: "",
    }),
    created: async function () {
        this.month = moment().format("YYYY-MM");
        await this.get_active_month_for_voucher();
        if (this.active_month) {
            this.act_month = moment(this.active_month.month, "YYYY-MM").format(
                "MMMM YYYY"
            );
            this.month = moment(this.active_month.month, "YYYY-MM").format(
                "YYYY-MM"
            );
        }
    },
    methods: {
        ...mapActions(voucher_setup_store, {
            set_month_for_voucher: "set_month_for_voucher",
            get_active_month_for_voucher: "get_active_month_for_voucher",
        }),
        submitHandler: async function ($event) {
            let response = await this.set_month_for_voucher($event.target);
            if (response.data.status === "success") {
                await this.get_active_month_for_voucher();
                window.s_alert("Data successcully Updated");
            }
        },
    },
    computed: {
        ...mapState(voucher_setup_store, {
            active_month: "active_month",
        }),
    },
};
</script>

<style></style>
