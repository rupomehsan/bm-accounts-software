<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? 'Update' : 'Create' }} new {{ route_prefix }}
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
                                <div class="col-lg-12" >
                                    <div class="admin_form form_1">
                                        <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :onchange="changeAction" :onchangeAction="form_field.onchangeAction"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list
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
import { mapActions, mapState } from 'pinia'
import { loan_setup_store } from './setup/store';
import { account_setup_store } from '../accounts/setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        role: window.role.bmSupport,
        route_prefix: '',
        form_fields,
        param_id: null,
        loaded: false
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_data()
        await this.get_all_users()
        await this.get_all_account_categories()
        await this.get_accounts_info()

        // console.log(this.account_info_data);


        this.form_fields.forEach((field) => {
            if (field.name == 'user_id') {
                field.data_list = []
                this.all_users_data.forEach((item) => {
                    let dataList = {}
                    dataList.label = item.full_name
                    dataList.value = item.id
                    field.data_list.push(dataList)
                })
            }
            if (field.name == 'category_id') {
                field.data_list = []
                this.all_account_categories_data.forEach((item) => {
                    let dataList = {}
                    dataList.label = item.title
                    dataList.value = item.id
                    field.data_list.push(dataList)
                })
            }
            if (field.name == 'account_id') {
                field.data_list = []
                this.account_info_data.forEach((item) => {
                    let dataList = {}
                    dataList.label = item.name
                    dataList.value = item.id
                    field.data_list.push(dataList)
                })
            }
        })


        if (id) {
            this.param_id = id;
            await this.get_single_data(id);
            if (this.single_data) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {
                        if (field.name !== 'category_id' || field.name !== 'user_id') {
                            if (field.name == value[0]) {
                                this.form_fields[index].value = value[1];
                            }
                        }
                    });
                });


                if (this.single_data.account_log?.account_id) {
                    this.form_fields[2].value = this.single_data.account_log?.account_id
                    let selectedValue = this.single_data.account_log?.account_id
                    let selectedAccount = this.account_info_data.find(item => item.id == selectedValue)
                    let item = this.form_fields.find(item => item.name == "account_number_id")
                    let data_list = []
                    selectedAccount.account_number.forEach((item) => {
                        let dataList = {}
                        dataList.label = item.value
                        dataList.value = item.id
                        data_list.push(dataList)
                    })
                    item.data_list = data_list
                    this.form_fields[3].value = this.single_data.account_log?.account_number_id
                }
            }
        } else {
            this.form_fields.forEach((item) => {
                if (item.name !== "taken_date" && item.name !== "given_date") {
                    item.value = "";
                }
            });

        }

        this.loaded = true
    },
    methods: {
        ...mapActions(loan_setup_store, {
            get_all_data: 'all',
            get_single_data: 'get',
            store_data: 'store',
            update_data: 'update',
            get_all_users: 'get_all_users',
            get_all_account_categories: 'get_all_account_categories',

        }),
        ...mapActions(account_setup_store, {
            get_accounts_info: 'get_accounts_info',
            set_selected_account_numbers: 'set_selected_account_numbers',
        }),


        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.update_data($event.target, this.param_id);
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


        getSelectedAccount: function (actionTitle, event, ref) {
            let selectedValue = event.target.value
            let selectedAccount = this.account_info_data.find(item => item.id == selectedValue)
            let item = this.form_fields.find(item => item.name == "account_number_id")
            let data_list = []
            selectedAccount.account_number.forEach((item) => {
                let dataList = {}
                dataList.label = item.value
                dataList.value = item.id
                data_list.push(dataList)
            })
            item.data_list = data_list
            console.log(item, selectedAccount);
        },

        changeAction: function (actionTitle, event, ref) {
            console.log("ac", actionTitle);
            this[actionTitle](actionTitle, event, ref);
        }


    },

    computed: {
        ...mapState(loan_setup_store, {
            single_data: "single_data",
            all_data: 'all_data',
            all_users_data: 'all_users_data',
            all_account_categories_data: 'all_account_categories_data',
        }),
        ...mapState(account_setup_store, {
            account_info_data: 'account_info_data',
            selected_account_numbers: 'selected_account_numbers'
        }),
    },

    mounted() {

        const amount = document.getElementById('amount');

        if (amount) {
            amount.addEventListener('keyup', this.amountHandleKeyup);
        }
    }
}
</script>
