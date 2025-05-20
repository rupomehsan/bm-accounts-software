import { defineStore } from "pinia";

export const asset_transfer_setup_store = defineStore("asset_transfer_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        role_data: {},
        all_asset_data: {},
        all_branch_user_data: {},
        api: "asset-transfers",
        api_url: new URL(location.origin + '/api/v1/asset-transfers')
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

        update_approval_asset: async function (form, id) {
            let formData = new FormData(form);
            formData.append('id', id);
            let response = await axios.post(`${this.api}/branch-approval`, formData);
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

        get_all_asset: async function () {
            let response = await axios.get(`assets?get_all=1`);
            response = response.data.data;
            this.all_asset_data = response;
        },
        get_all_branch_user: async function () {
            let response = await axios.get(`users?get_all=1&branch_user=true`);
            response = response.data.data;
            this.all_branch_user_data = response;
        },
    },
});
