import { defineStore } from "pinia";

export const income_expense_setup_store = defineStore(
    "income_expense_setup_store",
    {
        state: () => ({
            income_expense: {},
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
                    response = await axios.get("user-notifications");
                }
                this.all_data = response.data.data;
            },
            get_all_income_expense_report: async function (from, to) {
                let response = await axios.get(
                    `get-all-income-expense-report?from=${from}&to=${to}`
                );
                response = response.data.data;
                this.income_expense = response;
                // console.log("income_expense", this.income_expense);
            },
            get_all_users: async function () {
                let response = await axios.get("users?get_all=1");
                response = response.data.data;
                this.users = response;
                return this.users;
                console.log("data users", this.users);
            },
            store: async function (form) {
                let response = await axios.post("user-notifications", form);
                return response;
            },
            update: async function (form, id) {
                let formData = new FormData(form);
                let response = await axios.post(
                    `user-notifications/${id}?_method=PATCH`,
                    formData
                );
                window.s_alert("Data successcully updated");
                console.log("res", response.data);
            },
            delete: async function (id) {
                var data = await window.s_confirm();
                if (data) {
                    let response = await axios.delete(
                        "user-notifications/" + id
                    );
                    window.s_alert("Data deleted");
                    this.all();
                    console.log(response.data);
                }
            },
        },
    }
);
