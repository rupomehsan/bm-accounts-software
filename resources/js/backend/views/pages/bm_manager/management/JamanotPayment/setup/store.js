import { defineStore } from "pinia";

export const jamanot_payment_setup_store = defineStore("jamanot_payment_setup_store", {
    state: () => ({
        all_data: {},
        all_users_data: {},
        user_loan_register_data: {},
        all_account_categories_data: {},
        single_data: {},
        role_data: {},
        api: "jamanot-payments",
        offset: 10
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {

        all: async function (url) {
            let response;
            if (url) {
                response = await axios.get(url + `&offset=${this.offset}`);
            } else {
                response = await axios.get(this.api + `?offset=${this.offset}`);
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
                let response = await axios.delete(this.api + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        bulk_action: async function (action, data) {
            let response = await axios.post(`${this.api}bulk-action`, { action, data })
            if (response.data.status === "success") {
                window.s_alert(response.data.message);
                this.all();
            }
        },

        // additional function
        // additional function
        get_all_users: async function () {
            let response = await axios.get('users?get_all=1');
            response = response.data.data;
            this.all_users_data = response;
        },
        get_all_account_categories: async function () {
            let response = await axios.get('account-categories?get_all=1&type=income');
            response = response.data.data;
            this.all_account_categories_data = response;
        },
        get_user_loan_register: async function (id) {
            let response = await axios.get(`jamanot-providers/${id}?multiple=true`);
            response = response.data;
            this.user_loan_register_data = response;
        },
        get_data_by_search: async function (formData) {
            let form = new FormData(formData);
            let response = await axios.post(`${this.api}/search`, form);
            response = response.data.data;
            this.all_data = response;

        },

        set_limit: async function (limit) {
            this.offset = limit;
        },

    },
});
