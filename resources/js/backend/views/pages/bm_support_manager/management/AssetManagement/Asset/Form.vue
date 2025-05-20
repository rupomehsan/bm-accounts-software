<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create" }} new
                                <span class="text-lowercase">{{
                                    route_prefix
                                }}</span>
                            </h6>
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
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <template
                                            v-for="(
                                                form_field, index
                                            ) in form_fields"
                                            :key="index"
                                        >
                                            <common-input
                                                :label="form_field.label"
                                                :onchange="getRespose"
                                                :type="form_field.type"
                                                :name="form_field.name"
                                                :multiple="form_field.multiple"
                                                :value="form_field.value"
                                                :data_list="
                                                    form_field.data_list
                                                "
                                            />
                                        </template>
                                    </div>
                                    <div v-if="isMulitple">
                                        <div
                                            class="border d-flex justify-content-between align-items-center px-3 my-2"
                                        >
                                            <h5 class="text-center py-2">
                                                Asset Items
                                            </h5>
                                            <button
                                                class="btn btn-info btn-sm"
                                                type="button"
                                                @click="addAssetItem"
                                            >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div
                                            class="admin_form form_1 card p-4 my-2"
                                            v-for="(item, index) in assetItems"
                                            :key="index"
                                        >
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-sm position-absolute end-0 m-1"
                                                @click="
                                                    removeAssetItem({
                                                        index: index,
                                                        id: item.id,
                                                    })
                                                "
                                            >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <div class="form-group">
                                                <label for=""> title</label>
                                                <div class="mt-1 mb-3">
                                                    <input
                                                        class="form-control"
                                                        type="hidden"
                                                        :name="`items[${index}][id]`"
                                                        v-model="item.id"
                                                    />
                                                    <input
                                                        class="form-control"
                                                        type="text"
                                                        :name="`items[${index}][title]`"
                                                        id="title"
                                                        v-model="item.title"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> price</label>
                                                <div class="mt-1 mb-3">
                                                    <input
                                                        class="form-control"
                                                        type="number"
                                                        :name="`items[${index}][price]`"
                                                        id="price"
                                                        v-model="item.price"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for=""> qty</label>
                                                <div class="mt-1 mb-3">
                                                    <input
                                                        class="form-control"
                                                        type="number"
                                                        :name="`items[${index}][qty]`"
                                                        id="qty"
                                                        v-model="item.qty"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    description</label
                                                >
                                                <div class="mt-1 mb-3">
                                                    <textarea
                                                        class="form-control"
                                                        type="text"
                                                        :name="`items[${index}][description]`"
                                                        v-model="
                                                            item.description
                                                        "
                                                    ></textarea>
                                                    <div id="description"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    Is waranty</label
                                                >
                                                <div class="mt-1 mb-3">
                                                    <select
                                                        :name="`items[${index}][is_waranty]`"
                                                        class="form-select"
                                                        id="is_waranty"
                                                        v-model="
                                                            item.is_waranty
                                                        "
                                                    >
                                                        <option value="">
                                                            Select item
                                                        </option>
                                                        <option value="1">
                                                            yes
                                                        </option>
                                                        <option value="0">
                                                            no
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    waranty date</label
                                                >
                                                <date-field
                                                    :label="`Waranty date`"
                                                    :name="`items[${index}][waranty_date]`"
                                                    :value="item.waranty_date"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    waranty image</label
                                                >
                                                <div class="mt-1 mb-3">
                                                    <div disabled="false">
                                                        <img
                                                            v-if="
                                                                item.waranty_image
                                                            "
                                                            :src="
                                                                item.waranty_image
                                                            "
                                                            alt=""
                                                            height="80"
                                                            width="100"
                                                        />
                                                        <input
                                                            class="form-control form-control"
                                                            type="file"
                                                            accept=".jpg,.jpeg,.png"
                                                            :name="`items[${index}][waranty_image]`"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    item image</label
                                                >
                                                <div class="mt-1 mb-3">
                                                    <div disabled="false">
                                                        <img
                                                            v-if="
                                                                item.item_image
                                                            "
                                                            :src="
                                                                item.item_image
                                                            "
                                                            alt=""
                                                            height="80"
                                                            width="100"
                                                        />

                                                        <input
                                                            class="form-control form-control"
                                                            type="file"
                                                            accept=".jpg,.jpeg,.png"
                                                            :name="`items[${index}][item_image]`"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
import { asset_setup_store } from "./setup/store";
import setup from "./setup";
import form_fields from "./setup/form_fields";
import moment from "moment";

export default {
    data: () => ({
        role: window.role.bmSupport,
        route_prefix: "",
        form_fields,
        param_id: null,
        isMulitple: false,
        assetItems: [
            {
                id: "",
                title: "",
                price: "",
                qty: "",
                description: "",
                is_waranty: "",
                waranty_date: moment().format("YYYY-MM-DD"),
                waranty_image: "",
                item_image: "",
            },
        ],
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_asset_categories();
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

                if (this.single_data.asset_item_category?.length) {
                    this.form_fields[2].value =
                        this.single_data.asset_item_category[0].id;
                }
                if (this.single_data.asset_items?.length) {
                    this.assetItems = this.single_data.asset_items;
                    this.isMulitple = true;
                }
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
        if (this.all_asset_categories_data) {
            this.form_fields.forEach((field, index) => {
                if (field.name == "asset_categories_id") {
                    field.data_list = [];
                    this.all_asset_categories_data.forEach((value) => {
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
            get_single_data: "get",
            store_data: "store",
            update_data: "update",

            get_all_asset_categories: "get_all_asset_categories",
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
                    this.$router.push({ name: `All${this.route_prefix}` });
                }
            } else {
                let response = await this.store_data($event.target);
                if (response.data.status === "success") {
                    window.s_alert(response.data.message);
                    this.$router.push({ name: `All${this.route_prefix}` });
                }
            }
        },
        getRespose(event) {
            if (event.target.value == "multiple") {
                this.isMulitple = true;
            } else {
                this.isMulitple = false;
            }
        },
        addAssetItem() {
            this.assetItems.push({
                title: "",
                price: "",
                qty: "",
                description: "",
                is_waranty: "",
                waranty_date: moment().format("YYYY-MM-DD"),
                waranty_image: "",
                item_image: "",
            });
        },
        async removeAssetItem(data) {
            if (this.param_id) {
                var alert = await window.s_confirm();
                if (alert) {
                    let response = await axios.delete(`asset-items/${data.id}`);
                    if (response.data.status === "success") {
                        this.assetItems.splice(
                            this.assetItems.indexOf(data.index),
                            1
                        );
                        this.get_single_data(this.param_id);
                    }
                }
            } else {
                this.assetItems.splice(this.assetItems.indexOf(data.index), 1);
            }
        },
    },

    computed: {
        ...mapState(asset_setup_store, {
            single_data: "single_data",
            all_asset_categories_data: "all_asset_categories_data",
            asset_quotation_data: "asset_quotation_data",
        }),
    },
};
</script>
