import { defineStore } from "pinia";

export const report_setup_store = defineStore("report_setup_store", {
    state: () => ({
        all_data: {},
        main_ledger_data: {},
        statement_data: {},
        closing_data: {},
        loan_register_data: {},
        all_jamanot_register_data: {},
        all_ekkalin_prodan_data: {},
        all_niyomito_prodan_data: {},
        all_kendriosuvakanghi_income_data: {},
        all_office_rent_data: {},
        all_house_rent_data: {},
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
                response = await axios.get("users");
            }
            this.all_data = response.data.data;
        },
        main_ledger: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("main-ledger-shit", formData);
            response = response.data.data;
            this.main_ledger_data = response;
        },
        get_statements: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("statements", formData);
            response = response.data;
            this.statement_data = response;

        },
        fetch_income_expense_closing_in_range: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("fetch-income-expense-closing-in-range", formData);
            response = response.data;
            this.closing_data = response;

        },
        get_all_loan_register: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-loan-register", formData);
            response = response.data.data;
            this.loan_register_data = response;

        },
        get_all_jamanot_register: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-jamanot-register", formData);
            response = response.data.data;
            this.all_jamanot_register_data = response;

        },
        get_all_ekkalin_prodan: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-ekkalin-prodan", formData);
            response = response.data.data;
            this.all_ekkalin_prodan_data = response;

        },
        get_all_niyomito_prodan: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-niyomito_prodan", formData);
            response = response.data.data;
            this.all_niyomito_prodan_data = response;

        },
        get_all_kendriosuvakanghi_income: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-kendriosuvakanghi-income", formData);
            response = response.data.data;
            this.all_kendriosuvakanghi_income_data = response;

        },

        get_all_office_rent: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-office-rent", formData);
            response = response.data.data;
            this.all_office_rent_data = response;
        },

        get_all_house_rent: async function (form) {
            let formData = new FormData(form)
            let response = await axios.post("get-all-house-rent", formData);
            response = response.data.data;
            this.all_house_rent_data = response;
        },

    },
});
