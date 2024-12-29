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
                                <router-link :to="{ name: `${role}AllIncome` }"
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
                                                :onchange="getRespose" :onchangeAction="form_field.onchangeAction"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :is_visible="form_field.is_visible"
                                                :data_list="form_field.data_list
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
                            <!-- <button type="button" class="btn btn-outline-info mx-2" @click="showDetails">
                                Show history
                            </button> -->
                        </div>
                    </form>
                </div>
                <div v-if="branch_target_data.data?.length" class="mx-5">
                    <h6 class="text-center border py-2">History</h6>
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="t-head text-center">
                                <td>Session</td>
                                <td>Target amount</td>
                                <td>Total payable</td>
                                <td>Total paid</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in branch_target_data.data" :key="item" class="text-white text-center">
                                <td>{{ item.session }}</td>
                                <td>{{ item.target_amount ?? 0 }}</td>
                                <td>{{ item.total_payable ?? 0 }}</td>
                                <td>{{ item.total_paid ?? 0 }}</td>
                            </tr>
                            <tr class="text-white text-center">
                                <td class="fw-bold text-primary">
                                    Summery : ->
                                </td>
                                <td class="fw-bold text-primary">
                                    Total paid :
                                    {{ branch_target_data.totalPaid }}
                                </td>
                                <td class="fw-bold text-primary">
                                    Total payable :
                                    {{ branch_target_data.totalPayable }}
                                </td>
                                <td class="fw-bold text-primary">
                                    Total due : {{ branch_target_data.due }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="branch_target_data.application?.length" class="mx-5">
                    <h6 class="text-center border py-2 my-2">Target moukuf</h6>
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="t-head text-center">
                                <td></td>
                                <td>Date</td>
                                <td>Subject</td>
                                <td>Amount</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in branch_target_data.application" :key="item"
                                class="text-white text-center">
                                <td v-if="!item.applied">
                                    <input name="application_id" :value="item.id" v-model="application_id"
                                        type="radio" />
                                </td>
                                <td v-if="!item.applied">
                                    {{
                                        new Date(
                                            item.created_at
                                        ).toLocaleDateString()
                                    }}
                                </td>
                                <td v-if="!item.applied">{{ item.subject }}</td>
                                <td v-if="!item.applied">
                                    {{ item.moukuf_amount }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { income_setup_store } from "./setup/store";
import roleSetup from "../../partials/role_setup";
import axios from 'axios';

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
        amount: 0,
        branch_target_data: [],
        application_id: null,
    }),

    created: async function () {
        await this.get_all_account_receipt_book();
        await this.get_all_account_categories();
        await this.get_all_central_division();
        await this.get_all_branch();
        await this.get_all_accounts();

        this.form_fields.forEach((field) => {
            if (field.name == "account_receipt_book_id") {
                field.data_list = [];
                this.all_account_receipt_book_data?.data.forEach((item) => {
                    let fielData = {};
                    fielData.label = item.receipt_book_no;
                    fielData.value = item.id;
                    field.data_list.push(fielData);
                });
            }

            if (field.name == "account_category_id") {
                field.data_list = [];
                this.all_account_categories.forEach((item) => {
                    let formData = {};
                    formData.label = item.title;
                    formData.value = item.id;
                    formData.serial_number = item.serial_number;
                    field.data_list.push(formData);
                });
            }

            if (field.name == "central_division_id") {
                field.data_list = [];
                this.all_central_division.forEach((item) => {
                    let formData = {};
                    formData.label = item.full_name;
                    formData.value = item.id;
                    field.data_list.push(formData);
                });
            }

            if (field.name == "branch_id") {
                field.data_list = [];
                this.all_branch.forEach((item) => {
                    let formData = {};
                    formData.label = item.full_name;
                    formData.value = item.id;
                    field.data_list.push(formData);
                });
            }

            if (field.name == "account_id") {
                field.data_list = [];
                this.all_accounts.forEach((item) => {
                    let formData = {};
                    formData.label = item.name;
                    formData.value = item.id;
                    field.data_list.push(formData);
                });
            }
        });

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

                        if (field.name == "account_id") {
                            if (value[0] == "account_logs") {
                                // console.log("value", value[1].account.id)
                                this.form_fields[index].value =
                                    value[1].account_id;
                                this.getRespose();
                            }
                        }
                        if (field.name == "account_number_id") {
                            if (value[0] == "account_logs") {
                                // console.log("value", value[1].account.id)
                                // this.get_account_numbers_by_account_id(value[1].account_number_id)
                                this.form_fields[index].value =
                                    value[1].account_number_id;
                            }
                        }
                    });
                });

                await this.get_account_numbers_by_account_id(
                    this.single_data.account_logs?.account_id
                );
                let account_number = this.account_number_data?.account_number;
                this.form_fields.forEach((item) => {
                    if (item.name == "account_number_id") {
                        item.data_list = [];
                        account_number.forEach((number) => {
                            let dataList = {};
                            dataList.label = number.value;
                            dataList.value = number.id;
                            item.data_list.push(dataList);
                        });
                    }
                });
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
            get_branch_target_by_brach_id: "get_branch_target_by_brach_id",
            get_account_numbers_by_account_id:
                "get_account_numbers_by_account_id",
            get_receipt_book_remaining_pages:
                "get_receipt_book_remaining_pages",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.income_update($event.target, this.param_id);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully Update");
                    this.$router.push({ name: `${role}AllIncome` });
                }
            } else {
                let response = await this.store(
                    $event.target,
                    this.application_id
                );
                if (response.data.status === "success") {
                    window.s_alert("Data successfully created");
                    this.$router.push({ name: `${role}AllIncome` });
                }
            }
        },

        async amountHandleKeyup(event) {
            const inputValue = event.target.value;
            let amountInBangla = window.convertAmount(inputValue);
            let toText = document.getElementById("amount_in_text");
            toText.value = amountInBangla + " টাকা মাত্র";
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
            let account_category_id = document.getElementById(
                "account_category_id"
            ).value;
            let branch_id = document.getElementById("branch_id").value;
            if (account_category_id && branch_id) {
                let response = await this.get_branch_target_by_brach_id(
                    account_category_id,
                    branch_id
                );
                this.branch_target_data = response;
            }
        },

        getRespose: async function (event, actionTitle = null, ref = null) {

            if (actionTitle && event && ref) {
                this[actionTitle](actionTitle, event, ref)
            }

            if (event.target.name == "account_id") {

                await this.get_account_numbers_by_account_id(
                    event.target.value
                );
                let account_number = this.account_number_data?.account_number;
                this.form_fields.forEach((item) => {
                    if (item.name == "account_number_id") {
                        item.data_list = [];
                        account_number.forEach((number) => {
                            let dataList = {};
                            dataList.label = number.value;
                            dataList.value = number.id;
                            item.data_list.push(dataList);
                        });
                    }
                });

            }

            if (event.target.name == "account_receipt_book_id") {
                let receipt_book_id = event.target.value;
                if (receipt_book_id) {
                    let response = await this.get_receipt_book_remaining_pages(
                        event.target.value
                    );

                    if (response.data.length) {
                        response.data.forEach((item) => {
                            let selectData = {}
                            selectData.label = item.number
                            selectData.value = item.number
                            selectData.is_disabled = item.is_disabled
                            this.form_fields.find(item => item.name == "account_receipt_no").data_list.push(selectData)
                        })
                    }

                }
            }

            if (event.target.name == "amount") {
                this.amountHandleKeyup(event);
            }



        },
        getSelectedField: function (actionTitle, event, ref) {
            let value = event.target.value
            if (value == "শাখা") {
                let branch = this.form_fields.find(item => item.name == "branch_id")
                branch.is_visible = true

                let division = this.form_fields.find(item => item.name == "central_division_id")
                division.is_visible = false

                let random = this.form_fields.find(item => item.name == "random_user")
                random.is_visible = false

            } else if (value == "বিভাগ") {
                let division = this.form_fields.find(item => item.name == "central_division_id")
                division.is_visible = true

                let branch = this.form_fields.find(item => item.name == "branch_id")
                branch.is_visible = false

                let random = this.form_fields.find(item => item.name == "random_user")
                random.is_visible = false


            } else if (value == "ব্যাক্তি/প্রতিষ্ঠান") {
                let random = this.form_fields.find(item => item.name == "random_user")
                random.is_visible = true

                let division = this.form_fields.find(item => item.name == "central_division_id")
                division.is_visible = false

                let branch = this.form_fields.find(item => item.name == "branch_id")
                branch.is_visible = false

            }


        },



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
        const amount = document.getElementById("amount");
        if (amount) {
            amount.addEventListener("keyup", this.amountHandleKeyup);
        }
        // const accountId = document.getElementById('account_id');
        // if (accountId) {
        //     accountId.addEventListener('change', this.accountHandler);
        // }
    },
};
</script>

<style></style>
