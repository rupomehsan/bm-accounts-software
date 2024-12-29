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
                                <router-link :to="{ name: `${role}AllAssetList` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <div class="">
                        <div>
                            <img class="my-2 bg-light rounded shadow" :src="single_data.asset?.asset_image" alt=""
                                width="100" />
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header p-2"><b>General Information</b></div>
                                    <div class="card-body p-2">
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 200px;"> Title </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.title }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Price </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.price }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Memo no </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.memo_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Memo date </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.memo_date }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Code </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.code }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Asset location </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.asset_location }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Asset owner </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.asset_owner }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Owner phone number </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.owner_phone_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Depreciation type </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.depreciation_type }}</td>
                                                </tr>

                                                <tr>
                                                    <th style="width: 200px;"> comments </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.comments }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 200px;"> Description </th>
                                                    <td style="width: 3px;"> : </td>
                                                    <td>{{ single_data.asset?.description }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <p>
                                            Asset approval : <span class="text-warning">{{
                                    single_data.is_accepted_by_receiver ? 'Accepted' : 'Rejected' }}</span>
                                        </p>
                                    </div>
                                    <div class="card-body p-2">
                                        <form action="" @submit.prevent="submitHandler">
                                            <select name="is_approved" id="" class="form-select">
                                                <option value="">Select status</option>
                                                <option :selected="single_data.is_accepted_by_receiver" value="0">Reject
                                                </option>
                                                <option :selected="single_data.is_accepted_by_receiver" value="1">
                                                    Approve</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">
                                                Submit
                                            </button>

                                        </form>
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
import { asset_transfer_setup_store } from "./setup/store";
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        role: window.role.branch,
        route_prefix: "",
        form_fields,
        param_id: null,
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_data();

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
        ...mapActions(asset_transfer_setup_store, {
            get_all_data: "all",
            get_single_data: "get",
            store_data: "store",
            update_approval_asset: "update_approval_asset",

            get_all_asset_quotation: "get_all_asset_quotation",
        }),

        submitHandler: async function ($event) {
            let response = await this.update_approval_asset(
                $event.target,
                this.param_id
            );
            if (response.data.status === "success") {
                window.s_alert(response.data.message);
                this.$router.push({ name: `${this.role}All${this.route_prefix}` });
            }
        }
    },

    computed: {
        ...mapState(asset_transfer_setup_store, {
            single_data: "single_data",
            all_data: "all_data",
            asset_quotation_data: "asset_quotation_data",
        }),
    },
};
</script>
