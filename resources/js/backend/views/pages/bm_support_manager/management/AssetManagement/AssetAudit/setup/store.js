import { defineStore } from "pinia";

export const asset_audit_setup_store = defineStore("asset_audit_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        role_data: {},
        all_asset_data: {},
        single_audit_data: {},
        api: "asset-audits",
        api_url: new URL(location.origin + '/api/v1/asset-audits')
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

        get_all_assets: async function (asset_audit_id) {
            let response = await axios.get(`assets?withoutaudit=1&asset_audit_id=${asset_audit_id}`);
            response = response.data.data;
            this.all_asset_data = response;
        },
        get_all_audited_assets: async function (asset_audit_id) {
            let response = await axios.get(`assets?withaudit=1&asset_audit_id=${asset_audit_id}`);
            response = response.data.data;
            this.all_asset_data = response;
        },
        get_single_audit: async function (id) {
            let response = await axios.get(`${this.api}/${id}`);
            response = response.data.data;
            this.single_audit_data = response;
        },
        asset_audit_update_status: async function (data) {
            let formData = new FormData(data)
            let response = await axios.post(`asset-audits-status-update`, formData);
            return response
        },
        get_data_by_search: async function (formData) {
            let form = new FormData(formData);
            let response = await axios.post(`${this.api}/search`, form);
            response = response.data.data;
            this.all_data = response;

        },
    },
});
