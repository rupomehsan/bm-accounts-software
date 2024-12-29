import { defineStore } from "pinia";

export const asset_request_setup_store = defineStore(
    "asset_request_setup_store",
    {
        state: () => ({
            all_data: {},
            asset_quotation_data: {},
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
                    response = await axios.get("asset-request-to-cps");
                }
                this.all_data = response.data.data;
            },
            all_approval_request_to_cp: async function (status) {
                let response;
                // let page = `?page=${pageLimit}`;
                response = await axios.get(
                    `asset-request-to-cps?is_approved=${status}`
                );
                this.all_data = response.data.data;
            },
            all_not_approved_vucher_by_cp: async function (url) {
                let response;
                // let page = `?page=${pageLimit}`;
                if (url) {
                    response = await axios.get(url);
                } else {
                    response = await axios.get(
                        "account-expenses?cp=true&approved=false"
                    );
                }
                this.all_data = response.data.data;
            },

            get_asset_quotation_details: async function (id) {
                let response = await axios.get(
                    "asset-quotation-detatils/" + id
                );
                response = response.data.data;
                this.asset_quotation_data = response;
            },
            asset_quotation_approval: async function (id, status) {
                var data = await window.s_approved();
                if (data) {
                    let response = await axios.post(
                        `asset-quotation-approval?id=${id}&is_approved=${status}`
                    );
                    window.s_alert("Status update successfully");
                    this.all();
                    console.log(response.data);
                }
            },
            get_data_by_search: async function (formData) {
                let form = new FormData(formData);
                let response = await axios.post(`asset-request-to-cps/search`, form);
                response = response.data.data;
                this.all_data = response;

            },
        },
    }
);
