import { defineStore } from "pinia";

export const sohid_family_fund_setup_store = defineStore("sohid_family_fund_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_account_receipt_book_data: {},
        all_account_categories: {},
        all_central_division: {},
        all_branch: {},
        all_accounts: {},
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
                response = await axios.get("account-incomes?branch_id=true");
            }
            this.all_data = response.data.data;
        },

        get: async function (id) {
            let response = await axios.get("account-incomes/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },

        get_all_account_receipt_book: async function () {
            let response = await axios.get("account-receipt-books?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.all_account_receipt_book_data = response;
        },

        get_all_account_categories: async function () {
            let response = await axios.get("account-categories?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.all_account_categories = response;
        },

        get_all_central_division: async function () {
            let response = await axios.get("users?get_all=1&division=division");
            response = response.data.data;
            // console.log("data", response);
            this.all_central_division = response;
        },

        get_all_branch: async function () {
            let response = await axios.get("users?get_all=1&branch_user=branch_user");
            response = response.data.data;
            // console.log("data", response);
            this.all_branch = response;
        },
        get_all_accounts: async function () {
            let response = await axios.get("accounts?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.all_accounts = response;
        },

        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("account-incomes", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`account-incomes/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("account-receipt-books/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
