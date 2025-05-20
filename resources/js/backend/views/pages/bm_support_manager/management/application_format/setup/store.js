import { defineStore } from "pinia";

export const application_format_setup_store = defineStore("application_format_setup_store", {

    state: () => ({
        all_data: {},
        single_data: {},
        application_categories_data: {},
    }),

    getters: {
        doubleCount: (state) => state.count * 2,
    },

    actions: {
        all: async function (url) {
            let response;
            if (url) {
                response = await axios.get(url);
            } else {
                response = await axios.get("cp-application-formats");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("cp-application-formats/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        get_all_application_categories: async function (id) {
            let response = await axios.get("cp-application-categories?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.application_categories_data = response;
        },
        store: async function (form, extra_fields) {
            let formData = new FormData(form);
            formData.append('extra_fields', JSON.stringify(extra_fields))
            let response = await axios.post("cp-application-formats", formData);
            return response;
        },

        update: async function (form, id, extra_fields) {
            let formData = new FormData(form);
            formData.append('extra_fields', JSON.stringify(extra_fields))
            let response = await axios.post(`cp-application-formats/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },

        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("cp-application-formats/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
