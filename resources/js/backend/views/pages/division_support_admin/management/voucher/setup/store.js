import { defineStore } from "pinia";

export const voucher_setup_store = defineStore("voucher_setup_store", {
    state: () => ({
        all_data: {},
        single_data: {},
        AllAccountExpenseCategories: {},
        top_shit_data: {},
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
                response = await axios.get("account-expenses");
            }
            this.all_data = response.data.data;
        },
        get: async function (id) {
            let response = await axios.get("account-expenses/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.single_data = response;
        },
        getAllAccountExpenseCategories: async function () {
            let response = await axios.get("account-categories?get_all=1&type=expense");
            response = response.data.data;
            // console.log("data", response);
            this.AllAccountExpenseCategories = response;
        },
        store: async function (form, supportVoucher) {
            let formData = new FormData(form);
            let response = await axios.post("account-expenses", formData);
            return response;
        },
        update: async function (form, id) {
            let formData = new FormData(form);
            let response = await axios.post(`account-expenses/${id}?_method=PATCH`, formData);
            return response
        },
        delete: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete("account-expenses/" + id);
                window.s_alert("Data deleted");
                this.all();
                console.log(response.data);
            }
        },

        //additional function
        SupportVoucherDeleted: async function (id) {
            var data = await window.s_confirm();
            if (data) {
                let response = await axios.delete(`delete-support-account-expense/${id}`);
                window.s_alert("Data deleted");
                window.location.reload()
            }
        },
        get_single_voucher_with_top_shit: async function (id) {
            let response = await axios.get("get-single-voucher-with-top-shit/" + id);
            response = response.data.data;
            // console.log("data", response);
            this.top_shit_data = response;
        },
        get_data_by_search: async function (formData) {
            let form = new FormData(formData);
            let response = await axios.post(`account-expenses/search`, form);
            response = response.data.data;
            this.all_data = response;

        },
    },
});
