<template>

    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? 'Update' : 'Create' }} new <span class="text-lowercase">{{ route_prefix
                                    }}</span>
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}All${route_prefix}` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <template v-for="(
                                            form_field, index
                                        ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list
                                    " />
                                        </template>
                                    </div>

                                    <div class="row justify-content-center " v-if="loaded">
                                        <div class="d-flex justify-content-between mb-3">
                                            <h6 class=" py-2 ">Product details</h6>
                                            <button type="button" class="btn btn-outline-info btn-sm"
                                                @click="addProduct">
                                                <i class="fa fa-plus "></i>
                                            </button>
                                        </div>
                                        <div class="col-lg-12 card pt-1" v-for="(product, index) in prductData"
                                            :key="index">
                                            <div class="d-flex align-items-center gap-5 justify-content-between">
                                                <div class="form-group w-50"><label for=""> Product name</label>
                                                    <div class="mt-1 mb-3">
                                                        <input class="form-control" type="hidden"
                                                            :name="`product[${index}][product_id]`"
                                                            v-model="product.id">
                                                        <input class="form-control" type="text"
                                                            :name="`product[${index}][product_name]`"
                                                            v-model="product.product_name">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success float-end mt-2"
                                                    style="height: 30px;" @click="addProductDetails(index)">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger float-end mt-2"
                                                    style="height: 30px;"
                                                    @click="removeProduct({ id: product.id, index: index })">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                            <template v-for="(productDetails, detailsIndex) in product.details"
                                                :key="detailsIndex">
                                                <div class="d-flex  justify-content-between align-items-center gap-2">
                                                    <div class="admin_form form_1 card p-2">
                                                        <input type="hidden"
                                                            :name="`product[${index}][details][${detailsIndex}][id]`"
                                                            v-model="productDetails.id">

                                                        <div class="form-group"><label for=""> shope name</label>
                                                            <div class="mt-1 mb-3 position-relative">
                                                                <input class="form-control" type="text"
                                                                    :name="`product[${index}][details][${detailsIndex}][shope_name]`"
                                                                    v-model="productDetails.shope_name"
                                                                    @keyup="getShopName(index, detailsIndex)">
                                                                <ul class="border bg-dark position-absolute"
                                                                    v-show="productDetails.preview"
                                                                    :id="`ShopList-${index}`">
                                                                    <li v-for="shop in shopList" :key="shop.id"
                                                                        @click="productDetails.shope_name = shop.shop_name, prductData[index].details[detailsIndex].preview = false"
                                                                        class="border p-1" style="width: 270px;">
                                                                        {{ shop.shop_name }}
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label for=""> address</label>
                                                            <div class="mt-1 mb-3"><input class="form-control"
                                                                    type="text"
                                                                    :name="`product[${index}][details][${detailsIndex}][address]`"
                                                                    id="address" v-model="productDetails.address">
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label for=""> shop
                                                                contact</label>
                                                            <div class="mt-1 mb-3"><input class="form-control"
                                                                    type="text"
                                                                    :name="`product[${index}][details][${detailsIndex}][shop_contact]`"
                                                                    id="shop_contact"
                                                                    v-model="productDetails.shop_contact">
                                                            </div>

                                                        </div>
                                                        <div class="form-group"><label for=""> price</label>
                                                            <div class="mt-1 mb-3"><input class="form-control"
                                                                    type="number"
                                                                    :name="`product[${index}][details][${detailsIndex}][price]`"
                                                                    id="price" v-model="productDetails.price">
                                                            </div>

                                                        </div>
                                                        <div class="form-group"><label for=""> qty</label>
                                                            <div class="mt-1 mb-3"><input class="form-control"
                                                                    type="number"
                                                                    :name="`product[${index}][details][${detailsIndex}][qty]`"
                                                                    id="qty" v-model="productDetails.qty">
                                                            </div>

                                                        </div>

                                                        <div class="form-group"><label for=""> brand</label>
                                                            <div class="mt-1 mb-3"><input class="form-control"
                                                                    type="text"
                                                                    :name="`product[${index}][details][${detailsIndex}][brand]`"
                                                                    id="brand" v-model="productDetails.brand">
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label for=""> quotation
                                                                image</label>
                                                            <img height="20" width="40" class="mx-3"
                                                                :src="productDetails.quotation_image != '' ? productDetails.quotation_image : '/backend/assets/images/avatar.png'"
                                                                alt="">
                                                            <div class="mt-1 mb-3">
                                                                <div disabled="false">
                                                                    <!-- {{ component_images }} --><input
                                                                        class="form-control form-control" type="file"
                                                                        accept=".jpg,.jpeg,.png"
                                                                        :name="`product[${index}][details][${detailsIndex}][quotation_image]`"
                                                                        multiple=""><!--v-if-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger" type="button"
                                                        @click="removeProductDetailsItem({ id: productDetails.id, index: index, detailsIndex: detailsIndex })">X</button>
                                                </div>
                                            </template>
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
import { mapActions, mapState } from 'pinia'
import { quotation_setup_store } from './setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";
import debounce from 'debounce';

export default {
    data: () => ({
        role: window.role.bmSupport,
        route_prefix: '',
        form_fields,
        param_id: null,
        loaded: false,
        prductData: [
            {
                product_name: '',
                id: '',
                details: [
                    {
                        preview: false,
                        id: '',
                        shope_name: '',
                        address: "",
                        shop_contact: "",
                        price: "",
                        brand: "",
                        qty: "",
                        quotation_image: ''
                    }
                ]
            }
        ],
        shopList: []
    }),
    watch: {
        prductData: {
            handler: function (value) {
                if (!this.param_id) {
                    localStorage.setItem("prductData", JSON.stringify(value));
                }
            },
            deep: true
        }
    },
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;


        if (!id && localStorage.getItem("prductData")) {
            this.prductData = JSON.parse(localStorage.getItem("prductData"))
        }


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

                if (this.single_data.quotation_product) {
                    this.form_fields[1].value = this.single_data.quotation_product.title
                }
                if (this.single_data.quotation_product_price && this.single_data.quotation_product_price.length > 0) {
                    this.prductData = []
                    this.single_data?.quotation_product_price?.forEach((item, index) => {
                        const { product_id, id, shope_name, qty, address, shop_contact, price, brand, quotation_image } = item;
                        const { title: product_name } = item.product || {};
                        const existingProductIndex = this.prductData.findIndex(product => product.id === product_id);

                        if (existingProductIndex !== -1) {
                            this.prductData[existingProductIndex].details.push({
                                id,
                                shope_name,
                                address,
                                shop_contact,
                                price,
                                brand,
                                qty,
                                quotation_image
                            });
                        } else {
                            this.prductData.push({
                                product_name,
                                id: product_id,
                                details: [{
                                    id,
                                    shope_name,
                                    address,
                                    shop_contact,
                                    price,
                                    qty,
                                    brand,
                                    quotation_image
                                }]
                            });
                        }
                    })
                }
            }
        } else {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        }

        this.loaded = true


    },
    methods: {
        ...mapActions(quotation_setup_store, {
            get_all_data: 'all',
            get_single_data: 'get',
            store_data: 'store',
            update_data: 'update',

            get_shop_list_by_shop_name: 'get_shop_list_by_shop_name',

        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update_data($event.target, this.param_id);
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

        addProduct: function () {
            this.prductData.push({
                product_name: '',
                details: [
                    {
                        id: '',
                        shope_name: '',
                        address: "",
                        shop_contact: "",
                        price: "",
                        qty: "",
                        brand: "",
                        quotation_image: ''
                    }
                ]

            })
        },
        addProductDetails: function (index) {
            this.prductData[index].details.push({
                id: '',
                shope_name: '',
                address: "",
                shop_contact: "",
                price: "",
                qty: "",
                brand: "",
                quotation_image: ''
            })
        },
        removeProduct: async function (data) {
            console.log(data)
            if (this.param_id) {
                var alert = await window.s_confirm();
                if (alert) {
                    let response = await axios.delete(`product-prices/${data.id}`);
                    this.prductData.splice(data.index, 1)
                    this.get_single_data(this.param_id)
                }
            } else {
                this.prductData.splice(data.index, 1)
            }
        },
        removeProductDetailsItem: async function (data) {
            console.log(data)
            if (this.param_id) {
                var alert = await window.s_confirm();
                if (alert) {
                    let response = await axios.delete(`product-prices/${data.id}`);
                    this.prductData.splice(data.index, 1)
                    this.get_single_data(this.param_id)
                }
            } else {
                this.prductData[data.index].details.splice(data.detailsIndex, 1)
            }
        },
        getShopName: debounce(async function (proIndex, detailsIndex) {
            this.shopList = []
            let shopName = this.prductData[proIndex].details[detailsIndex].shope_name
            if (shopName !== "") {
                let response = await this.get_shop_list_by_shop_name(shopName)
                if (response.data?.status == 'success') {
                    if (response.data?.data?.length) {
                        this.shopList = response.data.data
                        this.prductData[proIndex].details[detailsIndex].preview = true
                    }
                }
            }
        }, 500),
    },



    computed: {
        ...mapState(quotation_setup_store, {
            single_data: "single_data",
            all_data: 'all_data',
        }),
    },
}
</script>
