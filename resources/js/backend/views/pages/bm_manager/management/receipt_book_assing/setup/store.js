import { defineStore } from "pinia";

export const receipt_book_assign_store = defineStore("receipt_book_assign_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        all_users: {},
        all_receipt_books: {},
        limit: 10,
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response;
            // let page = `?page=${pageLimit}`;
            if (url) {
                response = await axios.get(url+"&offset="+this.limit);
            } else {
                response = await axios.get(`account-receipt-book-assigns?offset=${this.limit}`);
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("account-receipt-book-assigns/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post("account-receipt-book-assigns", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`account-receipt-book-assigns/${id}?_method=PATCH`, formData);
            return response
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("account-receipt-book-assigns/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },
        get_receipt_book_by_status: async function (status) {
            let response = await axios.get(
                "account-receipt-book-assigns" + "?is_approvel=" + status
            );
            // console.log("data", response);
            this.all_data = response.data.data;
        },
        get_all_user: async function () {
            let response = await axios.get("users?division=division");
            this.all_users = response.data.data;
        },
        get_all_receipt_books: async function () {
            let response = await axios.get("account-receipt-books?get_all=1&where=not-exist");
            this.all_receipt_books = response.data.data;
        },
        get_all_select_user_assign_receipt_book: async function (id) {
            let response = await axios.get(`account-receipt-book-assigns?user_id=${id}`);
            this.all_data = response.data.data;
        },


        set_limit: async function (limit) {
            this.limit = limit;
            this.all();
        },
    },
});
