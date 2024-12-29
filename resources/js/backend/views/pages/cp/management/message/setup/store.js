import { defineStore } from "pinia";

export const message_setup_store = defineStore(
    "message_setup_store",
    {
        state: () => ({
            all_data: {},
            single_data: {},
            users: {},
            departmentUsers: {},
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
            get: async function (id) {
                let response = await axios.get("user-notifications/" + id);
                response = response.data.data;
                // console.log("data", response);
                this.single_data = response;
            },
            get_all_users: async function () {
                let response = await axios.get("users?get_all=1");
                response = response.data.data;
                this.users = response;
                return this.users;
                console.log("data users", this.users);
            },
            get_all_department_users: async function () {
                let response = await axios.get("users?get_all=1&division=1");
                response = response.data.data;
                return response;
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
