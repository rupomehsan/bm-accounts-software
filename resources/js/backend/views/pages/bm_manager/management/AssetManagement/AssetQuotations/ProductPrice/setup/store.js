import { defineStore } from "pinia";

export const product_price_setup_store = defineStore("product_price_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        role_data: {},
        products_data: {},
        asset_quotation_data: {},
        api: "product-prices"
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {

        all: async function (url) {
            let response;
            if (url) {
                response = await axios.get(url);
            } else {
                response = await axios.get(this.api);
            }
            this.all_data = response.data.data;
        },

        get: async function (id) {
            let response = await axios.get(`${this.api}/${id}`);
            response = response.data.data;
            this.single_data = response;
        },

        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post(this.api, formData);
            return response;
        },

        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`${this.api}/${id}?_method=PATCH`, formData);
            return response;
        },

        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete(`${this.api}/${id}`);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        bulk_action: async function (action, data) {
            let response = await axios.post(`${this.api}/bulk-action`, { action, data })
            if (response.data.status === "success") {
                window.s_alert(response.data.message);
                this.all();
            }
        },

        // additional function
        // additional function
        get_all_products: async function () {
            let response = await axios.get(`products?get_all=1`);
            response = response.data.data;
            this.products_data = response;
        },
        get_all_asset_quotation: async function () {
            let response = await axios.get(`quotations?get_all=1`);
            response = response.data.data;
            this.asset_quotation_data = response;
        },

    },
});
