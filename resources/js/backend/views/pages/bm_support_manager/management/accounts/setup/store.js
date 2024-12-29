import { defineStore } from "pinia";

export const account_setup_store = defineStore("account_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        account_info_data: {},
        selected_account_numbers: {},
        api_url: new URL(location.origin + '/api/v1/accounts')
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response;
            // let page = `?page=${pageLimit}`;
            if (url) {
                response = await axios.get(url);
            } else {
                response = await axios.get("accounts");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("accounts/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("accounts", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`accounts/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("accounts/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },

        get_accounts_info: async function (id) {
            let response = await axios.get("accounts-info");
            this.account_info_data = response.data;
        },

        set_selected_account_numbers: function (data) {
            this.selected_account_numbers = data;
        },
    },
});
