<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Asset Details</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `${role}All${route_prefix}` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <div class="">
                        <div>
                            <img
                                class="my-2 bg-light rounded shadow"
                                :src="single_data.asset_image"
                                alt=""
                                width="100"
                            />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <b>General Information</b>
                                    </div>
                                    <div class="card-body p-2">
                                        <table
                                            class="table table-hover table-striped"
                                        >
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Title
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{ single_data.title }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Price
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{ single_data.price }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Memo no
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.memo_no
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Memo date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.memo_date
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Code
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{ single_data.code }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Asset location
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.asset_location
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Asset owner
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.asset_owner
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Owner phone number
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.owner_phone_number
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Depreciation type
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.depreciation_type
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Buying date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.buying_date
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Hand over date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.hand_over_date
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        comments
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.comments
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Description
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data.description
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <b>Audit Information</b>
                                    </div>
                                    <div
                                        class="card-body p-2"
                                        v-if="single_data.asset_audit_list"
                                    >
                                        <table
                                            class="table table-hover table-striped"
                                        >
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Audit Name
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_audit_list
                                                                ?.asset_audit
                                                                ?.title
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Is ok ?
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_audit_list
                                                                ?.is_ok
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Comment
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_audit_list
                                                                ?.comment
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2">
                                        <b>Asset Items Information</b>
                                    </div>
                                    <div
                                        class="card-body p-2"
                                        v-if="single_data.asset_items?.length"
                                    >
                                        <table
                                            class="table table-hover table-striped"
                                        >
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Item Name
                                                    </th>
                                                    <th style="width: 200px">
                                                        Price
                                                    </th>
                                                    <th style="width: 200px">
                                                        Quantity
                                                    </th>
                                                </tr>
                                                <template
                                                    v-if="
                                                        single_data.asset_items
                                                            ?.length
                                                    "
                                                >
                                                    <tr
                                                        v-for="(
                                                            item, index
                                                        ) in single_data.asset_items"
                                                        :key="index"
                                                    >
                                                        <td>
                                                            {{ item.title }}
                                                        </td>
                                                        <td>
                                                            {{ item.price }}
                                                        </td>
                                                        <td>{{ item.qty }}</td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2">
                                        <b>Asset Transfer Information</b>
                                    </div>
                                    <div
                                        class="card-body p-2"
                                        v-if="single_data.asset_transfer"
                                    >
                                        <table
                                            class="table table-hover table-striped"
                                        >
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Sender
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_transfer
                                                                ?.sender
                                                                ?.full_name
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Recieiver
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_transfer
                                                                ?.receiver
                                                                ?.full_name
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Request date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_transfer
                                                                ?.request_date
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Accepted date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_transfer
                                                                ?.accepted_date ??
                                                            "Pending"
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header p-2">
                                        <b>Lost Information</b>
                                    </div>
                                    <div
                                        class="card-body p-2"
                                        v-if="single_data.asset_lost"
                                    >
                                        <table
                                            class="table table-hover table-striped"
                                        >
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Lost Date
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_lost
                                                                ?.lost_date
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Lost from user
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_lost
                                                                ?.lost_from_user
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Lost user contact
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_lost
                                                                ?.lost_from_user_contact
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px">
                                                        Lost reason
                                                    </th>
                                                    <td style="width: 3px">
                                                        :
                                                    </td>
                                                    <td>
                                                        {{
                                                            single_data
                                                                .asset_lost
                                                                ?.lost_reason
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { asset_setup_store } from "./setup/store";
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        role: window.role.bmSupport,
        route_prefix: "",
        form_fields,
        param_id: null,
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_data();
        await this.get_all_asset_quotation();
        if (id) {
            this.param_id = id;
            await this.get_single_data(id);
            if (this.single_data) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        } else {
            this.form_fields.forEach((item) => {
                if (
                    item.name !== "memo_date" &&
                    item.name !== "hand_over_date" &&
                    item.name !== "buying_date"
                ) {
                    item.value = "";
                }
            });
        }

        if (this.asset_quotation_data) {
            this.form_fields.forEach((field, index) => {
                if (field.name == "cs_quotation_id") {
                    field.data_list = [];
                    this.asset_quotation_data.forEach((value) => {
                        let dataList = {};
                        dataList.value = value.id;
                        dataList.label = value.title;
                        field.data_list.push(dataList);
                    });
                }
            });
        }
    },
    methods: {
        ...mapActions(asset_setup_store, {
            get_all_data: "all",
            get_single_data: "get_details",
            store_data: "store",
            update_data: "update",

            get_all_asset_quotation: "get_all_asset_quotation",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update_data(
                    $event.target,
                    this.param_id
                );
                if (response.data.status === "success") {
                    window.s_alert(response.data.message);
                    this.$router.push({ name: `${this.role}All${this.route_prefix}` });
                }
            } else {
                let response = await this.store_data($event.target);
                if (response.data.status === "success") {
                    window.s_alert(response.data.message);
                    this.$router.push({ name: `${this.role}All${this.route_prefix}` });
                }
            }
        },
    },

    computed: {
        ...mapState(asset_setup_store, {
            single_data: "single_data",
            all_data: "all_data",
            asset_quotation_data: "asset_quotation_data",
        }),
    },
};
</script>
