import { defineStore } from "pinia";

export const banch_target_store = defineStore("banch_target_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_account_category_data: {},
        all_branch_data: {},
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
                response = await axios.get("account-branch-targets");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("account-branch-targets/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("account-branch-targets", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`account-branch-targets/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("account-branch-targets/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        get_all_account_category: async function (id) {
            let response = await axios.get("account-categories?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.all_account_category_data = response;
        },

        get_all_branch: async function () {
            let response = await axios.get("users?get_all=1&branch_user=1");
            response = response.data.data;
            // console.log("data", response);
            this.all_branch_data = response;
        },
        get_session_wise_data: async function (data) {
            let response = await axios.get(`account-branch-targets?session=${data}`);
            this.all_data = response.data.data

        },
        get_date_wise_data: async function (startDate, endDate) {
            let response = await axios.get(`account-branch-targets?startDate=${startDate}&endDate=${endDate}`);
            this.all_data = response.data.data
        },

    },
});
