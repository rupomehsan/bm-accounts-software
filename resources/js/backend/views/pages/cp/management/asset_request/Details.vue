<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Asset quotation</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `CpAllAssetRequest` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div class="card-header p-2">
                                <h5>Quotation details</h5>
                            </div>
                            <div class="card-body p-2">
                                <table
                                    class="table table-striped table-responsive"
                                >
                                    <tbody>
                                        <tr>
                                            <th style="width: 200px">Title</th>
                                            <td style="width: 3px">:</td>
                                            <td>
                                                {{
                                                    this.asset_quotation_data
                                                        ?.data?.title
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">
                                                Description
                                            </th>
                                            <td style="width: 3px">:</td>
                                            <td>
                                                {{
                                                    this.asset_quotation_data
                                                        ?.data?.description
                                                }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 200px">
                                                Approval Status
                                            </th>
                                            <td style="width: 3px">:</td>
                                            <td>
                                                {{
                                                    this.asset_quotation_data
                                                        ?.reqeustAssetqQuotation
                                                        ?.is_approved == 1
                                                        ? "Approved"
                                                        : "Not approved"
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header p-2">
                                <h5>Quotation Product details</h5>
                            </div>
                            <div class="card-body p-2">
                                <template
                                    v-for="(item, index) in prductData"
                                    :key="index"
                                >
                                    <h5 class="my-3">
                                        Product name : {{ item.product_name }}
                                    </h5>
                                    <table
                                        class="table table-striped table-responsive"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Shope name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="pItem in item.details"
                                                :key="pItem.id"
                                            >
                                                <th>
                                                    {{
                                                        pItem.shope_name ??
                                                        "N/A"
                                                    }}
                                                </th>
                                                <th>
                                                    {{ pItem.price ?? "N/A" }}
                                                </th>
                                                <th>
                                                    {{ pItem.qty ?? "N/A" }}
                                                </th>
                                                <th>
                                                    {{
                                                        pItem.price * pItem.qty
                                                    }}
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </template>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button
                                @click="ApprovalStatus(1)"
                                class="btn rounded-pill btn-outline-warning router-link-active"
                            >
                                Approved
                            </button>
                            <button
                                @click="ApprovalStatus(0)"
                                class="btn rounded-pill btn-outline-danger router-link-active"
                            >
                                Not Approved
                            </button>
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
import { asset_request_setup_store } from "./setup/store";
import convertAmount from "../../../../../plugins/number_to_text_bangla.js";
export default {
    data: () => ({
        form_fields,
        param_id: null,
        loded: false,
        text: "",
        prductData: [
            {
                product_name: "",
                id: "",
                details: [
                    {
                        id: "",
                        shope_name: "",
                        address: "",
                        shop_contact: "",
                        price: "",
                        brand: "",
                        qty: "",
                        quotation_image: "",
                    },
                ],
            },
        ],
    }),

    created: async function () {
        this.param_id = this.$route.params.id;
        await this.get_asset_quotation_details(this.param_id);

        if (
            this.asset_quotation_data?.data.quotation_product_price &&
            this.asset_quotation_data?.data.quotation_product_price.length > 0
        ) {
            this.prductData = [];
            this.asset_quotation_data?.data?.quotation_product_price?.forEach(
                (item, index) => {
                    const {
                        product_id,
                        id,
                        shope_name,
                        qty,
                        address,
                        shop_contact,
                        price,
                        brand,
                        quotation_image,
                    } = item;
                    const { title: product_name } = item.product || {};
                    const existingProductIndex = this.prductData.findIndex(
                        (product) => product.id === product_id
                    );

                    if (existingProductIndex !== -1) {
                        this.prductData[existingProductIndex].details.push({
                            id,
                            shope_name,
                            address,
                            shop_contact,
                            price,
                            brand,
                            qty,
                            quotation_image,
                        });
                    } else {
                        this.prductData.push({
                            product_name,
                            id: product_id,
                            details: [
                                {
                                    id,
                                    shope_name,
                                    address,
                                    shop_contact,
                                    price,
                                    qty,
                                    brand,
                                    quotation_image,
                                },
                            ],
                        });
                    }
                }
            );
        }

        this.loded = true;

        console.log(this.prductData);
    },

    methods: {
        convertAmount,
        ...mapActions(asset_request_setup_store, {
            get_asset_quotation_details: "get_asset_quotation_details",
            asset_quotation_approval: "asset_quotation_approval",
        }),
        ApprovalStatus(status) {
            this.asset_quotation_approval(this.param_id, status);
        },
    },
    computed: {
        ...mapState(asset_request_setup_store, {
            asset_quotation_data: "asset_quotation_data",
        }),
    },
};
</script>

<style></style>
./setup/store.js
