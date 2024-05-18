<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} Department Income
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllCentralDivisionIncome` }"
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
                                        <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :onchange="getRespose" :name="form_field.name"
                                                :multiple="form_field.multiple" :value="form_field.value" :data_list="form_field.data_list
                                    " />
                                        </template>
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
import { central_division_income_setup_store } from "./setup/store";
import roleSetup from '../../partials/role_setup';

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
        amount: 0
    }),

    created: async function () {

        await this.get_all_account_receipt_book()
        await this.get_all_account_categories()
        await this.get_all_central_division()
        await this.get_all_branch()
        await this.get_all_accounts()


        this.form_fields.forEach((field) => {

            if (field.name == 'account_receipt_book_id') {
                field.data_list = []
                this.all_account_receipt_book_data?.data.forEach((item) => {

                    let fielData = {}
                    fielData.label = item.receipt_book_no
                    fielData.value = item.id
                    field.data_list.push(fielData)
                })
            }

            if (field.name == 'account_category_id') {
                field.data_list = []
                this.all_account_categories.forEach((item) => {
                    let formData = {}
                    formData.label = item.title
                    formData.value = item.id
                    field.data_list.push(formData)
                })
            }

            if (field.name == 'central_division_id') {
                field.data_list = []
                this.all_central_division.forEach((item) => {
                    let formData = {}
                    formData.label = item.full_name
                    formData.value = item.id
                    field.data_list.push(formData)
                })
            }

            if (field.name == 'branch_id') {

                field.data_list = []
                this.all_branch.forEach((item) => {
                    let formData = {}
                    formData.label = item.full_name
                    formData.value = item.id
                    field.data_list.push(formData)
                })
            }

            if (field.name == 'account_id') {
                field.data_list = []
                this.all_accounts.forEach((item) => {
                    let formData = {}
                    formData.label = item.name
                    formData.value = item.id
                    field.data_list.push(formData)
                })
            }


        })


        let id = this.$route.query.id;
        if (id) {
            this.param_id = id;
            await this.get_single_branch_income(id);
            if (this.single_data) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                        if (field.name == 'account_id') {
                            if (value[0] == 'account_logs') {
                                // console.log("value", value[1].account.id)
                                this.form_fields[index].value = value[1].account_id;
                            }
                        }
                        if (field.name == 'account_number_id') {
                            if (value[0] == 'account_logs') {
                                // console.log("value", value[1].account.id)
                                this.form_fields[index].value = value[1].account_number_id;
                            }
                        }
                    });
                });
            }
        }
    },

    methods: {
        ...mapActions(central_division_income_setup_store, {
            get_all_account_receipt_book: "get_all_account_receipt_book",
            get_all_account_categories: "get_all_account_categories",
            get_all_central_division: "get_all_central_division",
            get_all_branch: "get_all_branch",
            get_all_accounts: "get_all_accounts",
            store: "store",
            get_single_branch_income: "get",
            income_update: "update",
            get_account_numbers_by_account_id: 'get_account_numbers_by_account_id'
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.income_update($event.target, this.param_id);
                this.$router.push({ name: `${this.role}AllCentralDivisionIncome` });

            } else {
                let response = await this.store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${this.role}AllCentralDivisionIncome` });
                }
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
        },

        async amountHandleKeyup(event) {
            const inputValue = event.target.value;
            let amountInBangla = window.convertAmount(inputValue)
            let toText = document.getElementById('amount_in_text')
            toText.value = amountInBangla
            // Do something with the input value
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
        //     // Do something with the input value
        // },

    },

    computed: {
        ...mapState(central_division_income_setup_store, {
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
        const accountId = document.getElementById('account_id');
        if (amount) {
            amount.addEventListener('keyup', this.amountHandleKeyup);
        }
        // if (accountId) {
        //     accountId.addEventListener('change', this.accountHandler);
        // }
    },


};
</script>

<style></style>
