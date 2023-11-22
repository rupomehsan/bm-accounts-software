import { defineStore } from "pinia";

export const income_setup_store = defineStore("income_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_applications_by_category: {},
        all_account_categories: {},
        single_applications_data: {},
        all_income_by_category_id_data: {},
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
                response = await axios.get("account-logs");
            }
            this.all_data = response.data.data;

        },
        get: async function (id) {
            let response = await axios.get("cp-application-categories/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        get_applications_by_category: async function (id, is_approve) {
            let response = await axios.get("cp-application-categories/" + id + `?is_approve=${is_approve}`);
            response = response.data.data;

            this.all_applications_by_category = response;
        },
        get_all_account_categories: async function () {
            let response = await axios.get("account-categories?get_all=1");
            response = response.data.data;
            this.all_account_categories = response;
        },
        get_single_application: async function (id) {
            let response = await axios.get("cp-applications/" + id);
            response = response.data.data;
            this.single_applications_data = response;
        },
        get_all_income_by_category_id: async function (id) {
            let response = await axios.get("get-all-income-by-category-id/" + id);
            response = response.data.data;
            // console.log("ttt",response);
            this.all_data = response;
        },
        get_all_income_by_category_id: async function (id) {
            let response = await axios.get("get-all-income-by-category-id/" + id);
            response = response.data.data;
            // console.log("ttt",response);
            this.all_data = response;
        },
        get_all_income_by_datewise: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("get-all-income-by-datewise", formData);
            this.all_data = response.data.data;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("cp-application-categories", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`cp-application-categories/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("cp-application-categories/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
