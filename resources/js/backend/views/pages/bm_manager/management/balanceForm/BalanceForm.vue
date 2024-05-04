<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} Income
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `AllIncome` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">

                                        <div class="form-group"><label for="">Enter amount</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="number"
                                                    name="amount" id="amount"></div>

                                        </div>
                                        <div class="form-group"><label for="">Enter amount in text</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="text"
                                                    name="amount_in_text" id="amount_in_text"></div>

                                        </div>
                                        <div class="form-group"><label for="">Enter
                                                comment</label>
                                            <div class="mt-1 mb-3"><textarea class="form-control" type="text"
                                                    name="description"></textarea>
                                                <div id="description"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { income_setup_store } from "./setup/store";
import axios from 'axios';
export default {
    data: () => ({
        form_fields,
        param_id: null,
        amount: 0,
        branch_target_data: [],
        application_id: null
    }),
    created: async function () {
        let id = this.$route.query.id;
        if (id) {
            this.param_id = id;
            await this.get_single_branch_income(id);
            if (this.single_data) {

            }
        }
    },

    methods: {
        ...mapActions(income_setup_store, {
            get_all_account_receipt_book: "get_all_account_receipt_book",
            get_all_account_categories: "get_all_account_categories",
            get_all_central_division: "get_all_central_division",
            get_all_branch: "get_all_branch",
            get_all_accounts: "get_all_accounts",
            store: "store",
            get_single_branch_income: "get",
            income_update: "update",
            get_branch_target_by_brach_id: 'get_branch_target_by_brach_id',
            get_account_numbers_by_account_id: 'get_account_numbers_by_account_id'
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.income_update($event.target, this.param_id);
                this.$router.push({ name: `AllIncome` });
            } else {

                let response = await this.store($event.target, this.application_id);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `AllIncome` });
                }
            }
        },

        async amountHandleKeyup(event) {
            const inputValue = event.target.value;
            try {
                const result = await axios.get(`get-amount-to-number/${inputValue}`);
                if (result.data) {
                    let toText = document.getElementById('amount_in_text');
                    toText.value = result.data.toString(); // Use toString() method
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },

        // async accountHandler(event) {

        //     const inputValue = event.target.value;

        //     try {
        //         const result = await axios.get(`account-numbers/${inputValue}?account_id=true`);
        //         if (result.data) {
        //             let toText = document.getElementById('account_number_id');
        //             toText.value = result.data?.data?.value; // Use toString() method
        //         }
        //     } catch (error) {
        //         console.error('Error fetching data:', error);
        //     }

        // },

        async showDetails() {
            let account_category_id = document.getElementById('account_category_id').value;
            let branch_id = document.getElementById('branch_id').value;
            if (account_category_id && branch_id) {
                let response = await this.get_branch_target_by_brach_id(account_category_id, branch_id)
                this.branch_target_data = response
            }
        },

        getRespose: async function () {
            if (event.target.name == 'account_id') {
                await this.get_account_numbers_by_account_id(event.target.value)
                let account_number = this.account_number_data?.account_number
                this.form_fields.forEach((item) => {
                    if (item.name == 'account_number_id') {
                        item.data_list = []
                        account_number.forEach((number) => {
                            let dataList = {}
                            dataList.label = number.value
                            dataList.value = number.id
                            item.data_list.push(dataList)
                        })

                    }
                })
            }
        }

    },

    computed: {
        ...mapState(income_setup_store, {
            single_data: "single_data",
            all_account_receipt_book_data: "all_account_receipt_book_data",
            all_account_categories: "all_account_categories",
            all_central_division: "all_central_division",
            all_branch: "all_branch",
            all_accounts: "all_accounts",
            account_number_data: "account_number_data",

        }),
    },

    mounted() {

        const amount = document.getElementById('amount');

        if (amount) {
            amount.addEventListener('keyup', this.amountHandleKeyup);
        }

        // const accountId = document.getElementById('account_id');
        // if (accountId) {
        //     accountId.addEventListener('change', this.accountHandler);
        // }


    },


};
</script>

<style></style>
