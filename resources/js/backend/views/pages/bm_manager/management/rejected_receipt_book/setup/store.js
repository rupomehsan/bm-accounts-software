import { defineStore } from "pinia";

export const rejected_receipt_book_store = defineStore(
    "rejected_receipt_book_store",
    {
        state: () => ({
            all_data: {},
            single_data: {},
            page_limit: 10,
            all_account_receipt_book_data: {},
        }),
        getters: {
            doubleCount: (state) => state.count * 2,
        },
        actions: {
            all: async function (url) {
                let response;
                // let page = `?page=${pageLimit}`;
                if (url) {
                    response = await axios.get(
                        url + "&offset=" + this.page_limit
                    );
                } else {
                    response = await axios.get(
                        "account-receipt-book-reject-pages" +
                            "?offset=" +
                            this.page_limit
                    );
                }
                this.all_data = response.data.data;
            },
            get: async function (id) {
                let response = await axios.get(
                    "account-receipt-book-reject-pages/" + id
                );
                response = response.data.data;
                // console.log("data", response);
                this.single_data = response;
            },
            store: async function (form) {
                let formData = new FormData(form);
                let response = await axios.post(
                    "account-receipt-book-reject-pages",
                    formData
                );
                return response;
            },
            update: async function (form, id) {
                let formData = new FormData(form);
                let response = await axios.post(
                    `account-receipt-book-reject-pages/${id}?_method=PATCH`,
                    formData
                );
                window.s_alert("Data successcully updated");
                console.log("res", response.data);
            },

            delete: async function (id) {
                var data = await window.s_confirm();
                if (data) {
                    let response = await axios.delete(
                        "account-receipt-book-reject-pages/" + id
                    );
                    window.s_alert("Data deleted");
                    this.all();
                    console.log(response.data);
                }
            },

            get_receipt_book_by_status: async function (status) {
                let response = await axios.get(
                    "account-receipt-books" + "?is_approvel=" + status
                );
                // console.log("data", response);
                this.all_data = response.data.data;
            },
            latest_account_receipt_book: async function () {
                let response = await axios.get("latest-account-receipt-book");
                // console.log("data", response);
                this.latest_account_receipt_book_data = response.data.data;
            },

            set_limit: async function (limit) {
                this.page_limit = limit;
                this.all();
            },

            get_all_account_receipt_book: async function () {
                let response = await axios.get(
                    "account-receipt-books?get_all=1&uniq_receipt=true"
                );
                response = response.data.data;
                // console.log("data", response);
                this.all_account_receipt_book_data = response;
            },
            get_receipt_book_remaining_pages: async function (id) {
                let response = await axios.get(
                    "get-receipt-book-remaining-pages/" + id
                );
                response = response.data.data;
                return response;
            },
        },
    }
);
