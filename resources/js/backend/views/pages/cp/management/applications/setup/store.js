import { defineStore } from "pinia";

export const application_setup_store = defineStore("application_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_applications_by_category: {},
        single_applications_data: {},
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
                response = await axios.get("cp-application-categories");
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
            let response = await axios.get(
                "cp-application-categories/" + id + `?is_approve=${is_approve}`
            );
            response = response.data.data;
            // console.log("myyyydata", response);
            this.all_applications_by_category = response;
        },
        get_single_application: async function (id) {
            let response = await axios.get("cp-applications/" + id);
            response = response.data.data;
            console.log("myyyydata", response);
            this.single_applications_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post(
                "cp-application-categories",
                formData
            );
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(
                `cp-application-categories/${id}?_method=PATCH`,
                formData
            );
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete(
                    "cp-application-categories/" + id
                );
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },

        cp_application_approval: async function (id, form) {
            let formData = new FormData(form);
            formData.append("id", id);
            let response = await axios.post(
                "cp-application-approval",
                formData
            );
            console.log(response.data.message);
            window.s_alert(response.data.message);
        },
        get_data_by_search: async function (formData) {
            let form = new FormData(formData);
            let response = await axios.post(`cp-application-categories/search`, form);
            response = response.data.data;
            this.all_data = response;

        },
    },
});
