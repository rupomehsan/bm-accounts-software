import { defineStore } from "pinia";

export const application_setup_store = defineStore("application_setup_store", {

    state: () => ({
        all_data: {},
        single_data: {},
        application_categories_data: {},
        application_format_by_category_data: {},
        applications_data: {},
        income_categories: {},
        api_url: new URL(location.origin + '/api/v1/cp-applications')

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
                response = await axios.get(url);
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("cp-applications/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        get_apllication_by_status: async function (status) {
            let response = await axios.get(`cp-applications?is_approve=${status}`);
            response = response.data.data;
            // console.log("data", response);
            this.all_data = response;
        },
        get_all_application_categories: async function (id) {
            let response = await axios.get("cp-application-categories?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.application_categories_data = response;
        },
        get_all_application_format_by_category: async function (id) {
            let response = await axios.get("cp-application-formats-by-application-category/" + id);
            response = response.data.data;
            return response;
        },
        get_all_applications: async function (id) {
            let response = await axios.get("users?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.applications_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("cp-applications", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`cp-applications/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("cp-applications/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        get_all_income_categories: async function () {
            let response = await axios.get("account-categories?get_all=1&type=income");
            response = response.data.data;
            // console.log("data", response);
            this.income_categories = response;
        },
    },
});
