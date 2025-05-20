<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create" }} new
                                <span class="text-lowercase">{{
                                    route_prefix
                                }}</span>
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}All${route_prefix}` }"
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
                                            <common-input :label="form_field.label" :onchange="getRespose"
                                                :type="form_field.type" :name="form_field.name"
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
                <div v-if="loanHistory" class="mx-5">
                    <h6 class="text-center border py-2">Loan History</h6>
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr class="t-head text-center">
                                <td>Amount</td>
                                <td>Purpose</td>
                                <td>Taken date</td>
                                <td>Given date</td>
                                <td>Due amount</td>
                                <td>Payment status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in user_loan_register_data.data" :key="item" class="text-white text-center">
                                <td>{{ item.amount }}</td>
                                <td>{{ item.purpose }}</td>
                                <td>{{ item.taken_date }}</td>
                                <td>{{ item.given_date }}</td>
                                <td>{{ item.due_amount }}</td>
                                <td>{{ item.payment_status ?? "Due" }}</td>
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
import { loan_payment_setup_store } from "./setup/store";
import setup from "./setup";
import form_fields from "./setup/form_fields";
import { account_setup_store } from '../accounts/setup/store';
export default {
    data: () => ({
        role: window.role.bm,
        route_prefix: "",
        form_fields,
        param_id: null,
        loanHistory: false,
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_data();
        await this.get_all_users();
        await this.get_all_account_categories();
        await this.get_accounts_info()

        if (this.all_users_data.length) {
            this.form_fields.forEach((field) => {
                if (field.name == "user_id") {
                    field.data_list = [];
                    this.all_users_data.forEach((item) => {
                        let dataList = {};
                        dataList.label = item.full_name;
                        dataList.value = item.id;
                        field.data_list.push(dataList);
                    });
                }
                if (field.name == "account_id") {
                    field.data_list = [];
                    this.account_info_data.forEach((item) => {
                        let dataList = {};
                        dataList.label = item.name;
                        dataList.value = item.id;
                        field.data_list.push(dataList);
                    });
                }
            });
        }

        if (id) {
            this.param_id = id;
            await this.get_single_data(id);
            if (this.single_data) {
                await this.get_user_loan_register(this.single_data.user_id);
                if (this.user_loan_register_data) {
                    this.loanHistory = true;
                    this.form_fields[1].data_list = [];
                    this.user_loan_register_data.data.forEach((item) => {
                        let dataList = {};
                        dataList.label = item.purpose;
                        dataList.value = item.id;
                        this.form_fields[1].data_list.push(dataList);
                    });
                }
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                        if (field.name == 'account_id') {
                            if (value[0] == 'account_log') {
                                this.form_fields[index].value = value[1].account_id;
                            }
                        }
                        if (field.name == 'account_number_id') {
                            if (value[0] == 'account_log') {
                                this.form_fields[index].value = value[1].account_number_id;
                            }
                        }
                    });
                });



                await this.get_account_numbers_by_account_id(this.single_data.account_log?.account_id)
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
        } else {
            form_fields.forEach((item) => {
                if (item.name !== "given_date") {
                    item.value = "";
                }
            });
        }
    },

    methods: {
        ...mapActions(loan_payment_setup_store, {
            get_all_data: "all",
            get_single_data: "get",
            store_data: "store",
            update_data: "update",
            get_all_users: "get_all_users",
            get_all_account_categories: "get_all_account_categories",
            get_user_loan_register: "get_user_loan_register",
            get_account_numbers_by_account_id: "get_account_numbers_by_account_id",
        }),

        ...mapActions(account_setup_store, {
            get_accounts_info: 'get_accounts_info',
            set_selected_account_numbers: 'set_selected_account_numbers',
        }),

        getRespose: async function () {
            if (event && event.target?.name == "user_id") {
                console.log(event);

                await this.get_user_loan_register(event.target.value);
                if (this.user_loan_register_data) {
                    if (this.user_loan_register_data.data.length) {
                        this.loanHistory = true;
                    } else {
                        this.loanHistory = false;
                    }
                    this.form_fields[1].data_list = [];
                    this.user_loan_register_data.data.forEach((item) => {
                        let dataList = {};
                        dataList.label = item.purpose;
                        dataList.value = item.id;
                        this.form_fields[1].data_list.push(dataList);
                    });
                }
            }
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

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update_data(
                    $event.target,
                    this.param_id
                );
                if (response.data.status === "success") {
                    window.s_alert(response.data.message);
                    this.$router.push({ name: `${this.role}All${this.route_prefix}` });
                }
            } else {
                let response = await this.store_data($event.target);
                if (response.data.status === "success") {
                    window.s_alert(response.data.message);
                    this.$router.push({ name: `${this.role}All${this.route_prefix}` });
                }
            }
        },
        async amountHandleKeyup(event) {
            const inputValue = event.target.value;
            let amountInBangla = window.convertAmount(inputValue)
            let toText = document.getElementById('amount_in_text')
            toText.value = amountInBangla
        },
    },

    computed: {
        ...mapState(loan_payment_setup_store, {
            single_data: "single_data",
            all_data: "all_data",
            all_users_data: "all_users_data",
            all_account_categories_data: "all_account_categories_data",
            user_loan_register_data: "user_loan_register_data",
            account_number_data: "account_number_data",
        }),
        ...mapState(account_setup_store, {
            account_info_data: 'account_info_data',
            selected_account_numbers: 'selected_account_numbers'
        }),
    },

    mounted() {
        const amount = document.getElementById("amount");

        if (amount) {
            amount.addEventListener("keyup", this.amountHandleKeyup);
        }
    },
};
</script>
