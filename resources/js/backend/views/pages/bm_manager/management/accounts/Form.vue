<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>আয়ের মাধ্যম তৈরি করুন</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `${role}AllPaymentMethod` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-12"
                                    v-for="(form_field, index) in form_fields"
                                    :key="index"
                                >
                                    <div class="admin_form form_1">
                                        <common-input
                                            :label="form_field.label"
                                            :type="form_field.type"
                                            :name="form_field.name"
                                            :multiple="form_field.multiple"
                                            :value="form_field.value"
                                            :data_list="form_field.data_list"
                                        />
                                    </div>
                                </div>
                                <div v-if="similor_accounts.length > 1">
                                    <p class="border w-25 text-center py-1">
                                        Similar account numbers
                                    </p>
                                    <ul>
                                        <li
                                            v-for="(
                                                account, index
                                            ) in similor_accounts"
                                            :key="index"
                                        >
                                            {{ account.value }}
                                        </li>
                                    </ul>
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
import { account_setup_store } from "./setup/store";
export default {
    data: () => ({
        role: window.role.bm,
        form_fields,
        param_id: null,
        similor_accounts: [],
    }),

    created: async function () {
        let id = this.$route.query.id;
        await this.get_all_account_groups();
        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((item) => {
                        if (field.name == item[0]) {
                            this.form_fields[index].value = item[1];
                        }
                        if (field.name == "value") {
                            if (item[0] == "account_number") {
                                this.form_fields[index].value =
                                    item[1][item[1].length - 1]?.value;
                                this.similor_accounts = item[1];
                            }
                        }
                    });
                });
            }
        } else {
            form_fields.forEach((item) => {
                item.value = "";
            });
        }
    },

    methods: {
        ...mapActions(account_setup_store, {
            user_update: "update",
            user_get: "get",
            account_store: "store",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.user_update(
                    $event.target,
                    this.param_id
                );
                if (response.data.status === "success") {
                    window.s_alert("Data successcully Updated");
                    this.$router.push({ name: `${this.role}AllPaymentMethod` });
                }
            } else {
                let response = await this.account_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${this.role}AllPaymentMethod` });
                }
            }
        },
        get_all_account_groups: async function () {
            let response = await axios.get("account-groups?get_all=1");
            if (response.data.status === "success") {
                let dataList = [];
                response.data.data.forEach((item) => {
                    dataList.push({
                        label: item.name,
                        value: item.id,
                    });
                });
                this.form_fields[0].data_list = dataList;
            }
        },
    },
    computed: {
        ...mapState(account_setup_store, {
            single_user: "single_data",
        }),
    },
};
</script>

<style></style>
