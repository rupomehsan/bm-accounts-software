import { defineStore } from "pinia";

export const account_income_category_setup_store = defineStore(
    "account_income_category_setup_store",
    {
        state: () => ({
            all_data: {},
            single_data: {},
            role_data: {},
            search: "",
            api_url: new URL(location.origin + "/api/v1/account-categories"),
            offset: 10,
        }),
        getters: {
            doubleCount: (state) => state.count * 2,
        },
        actions: {
            allIncome: async function (url = null) {
                let response;
                // let page = `?page=${pageLimit}`;
                if (url) {
                    response = await axios.get(
                        url +
                            `&offset=${this.offset}&type=income&search=${this.search}`
                    );
                } else {
                    response = await axios.get(
                        `account-categories?offset=${this.offset}&type=income&search=${this.search}`
                    );
                }
                this.all_data = response.data.data;
            },

            get: async function (id) {
                let response = await axios.get("account-categories/" + id);
                response = response.data.data;
                // console.log("data", response);
                this.single_data = response;
            },

            store: async function (form) {
                let formData = new FormData(form);
                let response = await axios.post("account-categories", formData);
                return response;
            },
            update: async function (form, id) {
                let formData = new FormData(form);
                let response = await axios.post(
                    `account-categories/${id}?_method=PATCH`,
                    formData
                );
                window.s_alert("Data successcully updated");
                console.log("res", response.data);
            },
            delete: async function (id) {
                var data = await window.s_confirm();
                if (data) {
                    let response = await axios.delete(
                        "account-categories/" + id
                    );
                    window.s_alert("Data deleted");
                    this.all();
                    console.log(response.data);
                }
            },

            set_search_data: function (search) {
                this.search = search;
            },
            set_limit: function (limit) {
                this.offset = limit;
                this.allIncome();
            },
        },
    }
);
