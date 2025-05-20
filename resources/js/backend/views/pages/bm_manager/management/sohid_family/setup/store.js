import { defineStore } from "pinia";

export const sohid_family_setup_store = defineStore("sohid_family_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        role_data: {},
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
                response = await axios.get("sohid-families");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("sohid-families/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },

        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("sohid-families", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`sohid-families/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("sohid-families/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
    },
});
