import { defineStore } from "pinia";

export const division_at_a_glance_setup_store = defineStore("division_at_a_glance_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_applications_by_category: {},
        all_account_categories: {},
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
                response = await axios.get("department-at-a-glance");
            }
            this.all_data = response.data;
        },
        get: async function (id) {
            let response = await axios.get("cp-application-categories/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
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
