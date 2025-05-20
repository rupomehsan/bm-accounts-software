import { defineStore } from "pinia";

export const receipt_book_setup_store = defineStore(
    "receipt_book_setup_store",
    {
        state: () => ({
            all_data: {},
            single_data: {},
            api_route: "account-receipt-books",
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
                    response = await axios.get(this.api_route);
                }
                this.all_data = response.data.data;
            },
            get: async function (id) {
                let response = await axios.get(this.api_route + "/" + id);
                response = response.data.data;
                // console.log("data", response);
                this.single_data = response;
            },

            get_receipt_book_by_status: async function (status) {
                let response = await axios.get(
                    this.api_route + "?is_approvel=" + status
                );
                // console.log("data", response);
                this.all_data = response.data.data;
            },

            store: async function (form) {
                let formData = new FormData(form);
                let response = await axios.post(this.api_route, formData);
                return response;
            },
            update: async function (form, id) {
                let formData = new FormData(form);
                let response = await axios.post(
                    this.api_route + `/${id}?_method=PATCH`,
                    formData
                );
                window.s_alert("Data successcully updated");
                console.log("res", response.data);
            },
            update_receipt_book_by_status: async function (status, id) {
                let formData = new FormData();
                formData.append("is_approvel", status);
                let response = await axios.post(
                    this.api_route + `/${id}?_method=PATCH`,
                    formData
                );
                window.s_alert("Data successcully updated");
                this.all();
            },
            delete: async function (id) {
                var data = await window.s_confirm();
                if (data) {
                    let response = await axios.delete(
                        this.api_route + "/" + id
                    );
                    window.s_alert("Data deleted");
                    this.all();
                    console.log(response.data);
                }
            },
        },
    }
);
