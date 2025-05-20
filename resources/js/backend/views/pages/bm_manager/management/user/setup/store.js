import { defineStore } from "pinia";

export const user_setup_store = defineStore("user_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        role_data: {},
        user_type: '',
        api_url: new URL(location.origin + '/api/v1/users')
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response;
            // let page = `?page=${pageLimit}`;
            if (url) {
                response = await axios.get(url + `&user_type=${this.user_type}`);
            } else {
                response = await axios.get(`users?user_type=${this.user_type}`);
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("users/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        get_all_roles: async function (id) {
            let response = await axios.get("user-roles?get_all=1");
            response = response.data.data;
            // console.log("data", response);
            this.role_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("users", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`users/${id}?_method=PATCH`, formData);
            window.s_alert("Data successcully updated");
            console.log("res", response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("users/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        unblock_user: async function (id) {
            var data = await window.s_confirm('Are you sure you want to unblock this user?');
            if (data) {
                let response = await axios.post("user-unblock/" + id);
                window.s_alert("Successfully unblock user");
                this.block_list_user_get_all();
                console.log(response.data);
            }
        },
        block_list_user_get_all: async function (url) {
            let response;

            if (url) {
                response = await axios.get(url);
            } else {
                response = await axios.get(url);
            }
            this.all_data = response.data.data;
        },

        set_income_source_type: async function () {
            console.log(event.target.value);

            this.user_type = event.target.value
            this.all();
        },
    },
});
