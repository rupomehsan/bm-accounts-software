<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Top shit</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `CpAllVouchers` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-1">
                    <div
                        class="card my-2"
                        v-for="(item, index) in top_shit_data.supportVoucher"
                        :key="index"
                    >
                        <div class="card-body">
                            <table class="table text-light table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="3" class="fw-bold">
                                            ভাউচার
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            নাম :
                                            {{
                                                top_shit_data.voucher.department
                                                    ?.full_name
                                            }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-end">
                                            প্রস্তুতকারী :
                                            {{
                                                top_shit_data.voucher.creator
                                                    ? top_shit_data.voucher
                                                          .creator?.full_name
                                                    : top_shit_data.voucher
                                                          .department?.full_name
                                            }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            খাত :
                                            {{
                                                top_shit_data.voucher
                                                    .account_category?.title
                                            }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-end">
                                            তারিখ :
                                            {{ top_shit_data.voucher.date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>বিবরণ</td>
                                        <td class="text-center">স্ট্যাটাস</td>
                                        <td class="text-center">অনুমোদন</td>
                                        <td class="text-end">পরিমান</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="sVoucher in item"
                                        :key="sVoucher.id"
                                    >
                                        <td>
                                            <div>
                                                <div
                                                    class="table_actions"
                                                    v-if="
                                                        !sVoucher.approved_by_upperadmin
                                                    "
                                                >
                                                    <a
                                                        @click.prevent=""
                                                        href="#"
                                                        class="btn btn-sm btn-outline-secondary"
                                                        ><i
                                                            class="fa fa-gears"
                                                        ></i
                                                    ></a>
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <router-link
                                                                    :to="{
                                                                        name: `CpCreateVoucher`,
                                                                        query: {
                                                                            id: sVoucher.id,
                                                                        },
                                                                    }"
                                                                    class=""
                                                                >
                                                                    <i
                                                                        class="fa text-info fa-pencil"
                                                                    ></i>
                                                                    Edit
                                                                </router-link>
                                                            </span>
                                                            <span class="">
                                                                <a
                                                                    @click.prevent="
                                                                        support_voucher_delete(
                                                                            sVoucher.id
                                                                        )
                                                                    "
                                                                    href="#"
                                                                    class=""
                                                                >
                                                                    <i
                                                                        class="fa text-danger fa-trash"
                                                                    ></i>
                                                                    Delete
                                                                </a>
                                                            </span>
                                                            <span class="">
                                                                <a
                                                                    @click.prevent="
                                                                        SupportVoucherApprovedByAdmin(
                                                                            sVoucher.id
                                                                        )
                                                                    "
                                                                    href="#"
                                                                    class=""
                                                                >
                                                                    <i
                                                                        class="fa text-success fa-check"
                                                                    ></i>
                                                                    Accept
                                                                </a>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <span>
                                                    <a
                                                        :href="
                                                            sVoucher?.image_url
                                                                ?.url ??
                                                            '/backend/assets/images/avatar.png'
                                                        "
                                                        data-lightbox="image-1"
                                                    >
                                                        <img
                                                            height="30"
                                                            width="50"
                                                            class="mx-1 border p-1"
                                                            style="
                                                                object-fit: cover;
                                                            "
                                                            :src="
                                                                sVoucher
                                                                    ?.image_url
                                                                    ?.url ??
                                                                '/backend/assets/images/avatar.png'
                                                            "
                                                            alt=""
                                                        />
                                                    </a>
                                                </span>

                                                <span class="ps-2">
                                                    {{
                                                        (
                                                            sVoucher.description ??
                                                            ""
                                                        ).substring(0, 15) +
                                                        "..."
                                                    }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="ps-2">
                                                <span
                                                    class="ps-2 text-danger"
                                                    v-if="
                                                        sVoucher.is_cancel == 1
                                                    "
                                                    >Cancelled</span
                                                >
                                                <span
                                                    class="ps-2 text-success"
                                                    v-else-if="
                                                        sVoucher.approved_by_cp ==
                                                        1
                                                    "
                                                    >Approved</span
                                                >
                                                <span
                                                    class="ps-2 text-warning"
                                                    v-else
                                                    >Pending</span
                                                >
                                            </span>
                                        </td>
                                        <td>
                                            <table
                                                class="table text-center m-0"
                                            >
                                                <tr>
                                                    <td>
                                                        Sompadok
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                sVoucher.approved_by_admin
                                                                    ? 'fa-check-circle-o text-success'
                                                                    : 'fa-times-circle text-danger'
                                                            "
                                                        ></i>
                                                    </td>
                                                    <td>
                                                        BM Support
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                sVoucher.approved_by_sp_bm
                                                                    ? 'fa-check-circle-o text-success'
                                                                    : 'fa-times-circle text-danger'
                                                            "
                                                        ></i>
                                                    </td>
                                                    <td>
                                                        BM Admin
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                sVoucher.approved_by_bm
                                                                    ? 'fa-check-circle-o text-success'
                                                                    : 'fa-times-circle text-danger'
                                                            "
                                                        ></i>
                                                    </td>
                                                    <td>
                                                        CP<i
                                                            class="fa"
                                                            :class="
                                                                sVoucher.approved_by_cp
                                                                    ? 'fa-check-circle-o text-success'
                                                                    : 'fa-times-circle text-danger'
                                                            "
                                                        ></i>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="text-end">
                                            {{ sVoucher.amount }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            কথায় :
                                            {{
                                                convertAmount(
                                                    item?.reduce(
                                                        (t, i) =>
                                                            (t += i.amount),
                                                        0
                                                    )
                                                )
                                            }}
                                            টাকা মাত্র
                                        </td>

                                        <td
                                            class="d-flex justify-content-between"
                                        >
                                            <span>Total :</span>
                                            <span v-if="Array.isArray(item)">
                                                {{
                                                    item?.reduce(
                                                        (t, i) =>
                                                            (t += i.amount),
                                                        0
                                                    )
                                                }}
                                            </span>
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
        text: "",
    }),

    created: async function () {
        this.param_id = this.$route.params.id;
        await this.get_single_voucher_with_top_shit(this.param_id);
        console.log(this.top_shit_data);
        this.loded = true;
    },

    methods: {
        convertAmount,
        ...mapActions(voucher_setup_store, {
            get_single_voucher_with_top_shit:
                "get_single_voucher_with_top_shit",
            support_voucher_delete: "delete",
        }),

        convertIntoText: async function (value) {
            const result = await axios.get(`get-amount-to-number/${value}`);
            this.text = result.data;
        },
        SupportVoucherApprovedByAdmin: async function (id) {
            let response = await axios.post(
                "support-voucher-approval-by-admin",
                {
                    id: id,
                    voucher_status: "approved",
                }
            );
            if (response.data.status === "success") {
                window.s_alert("Data successcully Updated");
                await this.get_single_voucher_with_top_shit(this.param_id);
            }
        },
    },
    computed: {
        ...mapState(voucher_setup_store, {
            top_shit_data: "top_shit_data",
        }),
    },
};
</script>

<style></style>
