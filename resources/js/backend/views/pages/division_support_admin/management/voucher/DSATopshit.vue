<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                Top shit
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `AllVouchers` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-1 ">

                    <div class="card my-2" v-for="(item, index) in top_shit_data.supportVoucher" :key="index">
                        <div class="card-body">
                            <table class="table text-light">
                                <thead>
                                    <tr>
                                        <td colspan="2">ভাউচার</td>
                                    </tr>
                                    <tr>
                                        <td>নাম : {{ top_shit_data.voucher.department?.full_name }}</td>
                                        <td class="text-end">প্রস্তুতকারী : {{ top_shit_data.voucher.creator ?
                                    top_shit_data.voucher.creator?.full_name :
                                    top_shit_data.voucher.department?.full_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>খাত : {{ top_shit_data.voucher.account_category?.title }}</td>
                                        <td class="text-end">তারিখ : {{ top_shit_data.voucher.date }}</td>
                                    </tr>
                                    <tr>
                                        <td>বিবরণ </td>
                                        <td class="text-end">পরিমান</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <table class="table text-center">
                                                <tr>
                                                    <td style="width: 295px;"></td>
                                                    <td style="width: 100px;">Sompadok</td>
                                                    <td style="width: 100px;">BM Support</td>
                                                    <td style="width: 100px;">BM Admin </td>
                                                    <td style="width: 100px;">CP </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr v-for="sVoucher in item" :key="sVoucher.id">
                                        <td>
                                            <div>
                                                <span v-if="!sVoucher.approved_by_upperadmin">
                                                    <router-link :to="{
                                    name: 'CreateVoucher',
                                    query: {
                                        id: sVoucher.id,
                                    },
                                }" class="">
                                                        <i class="fa text-warning fa-pencil"></i>
                                                        Edit
                                                    </router-link>

                                                </span>
                                                <span class="mx-2" v-if="!sVoucher.approved_by_upperadmin">
                                                    <a @click.prevent="
                                    support_voucher_delete(
                                        sVoucher.id
                                    )
                                    " href="#" class="">
                                                        <i class="fa text-danger fa-trash"></i>
                                                        Delete
                                                    </a>
                                                </span>
                                                <span class="border-start ps-2">
                                                    {{ sVoucher.description ?? "asdfasdf" }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>

                                            <table class="table text-center">
                                                <tr>
                                                    <td style="width: 100px;"> <i class="fa"
                                                            :class="sVoucher.approved_by_admin ? 'fa-check-circle-o text-success' : 'fa-times-circle text-danger'"></i>
                                                    </td>
                                                    <td style="width: 100px;"><i class="fa"
                                                            :class="sVoucher.approved_by_sp_bm ? 'fa-check-circle-o text-success' : 'fa-times-circle text-danger'"></i>
                                                    </td>
                                                    <td style="width: 100px;"><i class="fa"
                                                            :class="sVoucher.approved_by_bm ? 'fa-check-circle-o text-success' : 'fa-times-circle text-danger'"></i>
                                                    </td>
                                                    <td style="width: 100px;"><i class="fa"
                                                            :class="sVoucher.approved_by_cp ? 'fa-check-circle-o text-success' : 'fa-times-circle text-danger'"></i>
                                                    </td>
                                                    <td class="text-end">{{ sVoucher.amount }}</td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            কথায় : {{ convertAmount(item?.reduce((t, i) => (t += i.amount), 0)) }}
                                        </td>
                                        <td class="text-end">
                                            <div v-if="Array.isArray(item)">

                                                {{ item?.reduce((t, i) => (t += i.amount), 0) }}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
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
import form_fields from "./setup/form_fields.js";
import { voucher_setup_store } from "./setup/store";
import convertAmount from "../../../../../plugins/number_to_text_bangla.js";
export default {
    data: () => ({
        form_fields,
        param_id: null,
        loded: false,
        text: ''

    }),

    created: async function () {
        this.param_id = this.$route.params.id;
        await this.get_single_voucher_with_top_shit(this.param_id)
        console.log(this.top_shit_data);
        this.loded = true;
    },

    methods: {
        convertAmount,
        ...mapActions(voucher_setup_store, {
            get_single_voucher_with_top_shit: "get_single_voucher_with_top_shit",
            support_voucher_delete: "delete",
        }),

        convertIntoText: async function (value) {
            const result = await axios.get(`get-amount-to-number/${value}`);
            this.text = result.data
        }

    },
    computed: {
        ...mapState(voucher_setup_store, {
            top_shit_data: "top_shit_data",
        }),
    },
};
</script>

<style></style>
