<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} branch target
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllBranchTarget` }"
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
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <div class="col-lg-12" v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                        <div class="admin_form">

                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list"
                                                :dateFormat="form_field.dateFormat" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6" v-if="param_id">
                                    <h6 class="text-center">Comments</h6>
                                    <div class="border border-primary p-1">
                                        <p v-for="(comment, index) in single_user.comment" :key="index"
                                            class="border border-primary px-3 py-1 my-1">{{ comment }}</p>
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
import { banch_target_store } from "./setup/store";
import roleSetup from '../../partials/role_setup';

export default {
    data: () => ({
        role: roleSetup.role,
        form_fields,
        param_id: null,
        loded: false,

    }),

    created: async function () {

        await this.get_all_account_category();
        await this.get_all_branch();

        this.form_fields.forEach((item) => {
            if (item.name == "account_category_id") {
                item.data_list = []
                this.all_account_category_data.forEach((category) => {
                    let dataList = {}
                    dataList.label = category.title
                    dataList.value = category.id
                    item.data_list.push(dataList)
                })
            }
        })

        this.form_fields.forEach((item) => {
            if (item.name == "branch_id") {
                item.data_list = []
                this.all_branch_data.forEach((category) => {
                    let dataList = {}
                    dataList.label = category.full_name
                    dataList.value = category.id
                    item.data_list.push(dataList)
                })
            }
        })

        let id = this.$route.query.id;
        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {

                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                        if (field.name == "comment") {
                            this.form_fields[index].value = value[1];
                        }

                    });
                });
            }
        }


    },

    methods: {
        ...mapActions(banch_target_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            get_all_account_category: 'get_all_account_category',
            get_all_branch: 'get_all_branch',
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
                this.$router.push({ name: `${this.role}AllBranchTarget` });
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${this.role}AllBranchTarget` });
                }
            }
        },
    },

    computed: {
        ...mapState(banch_target_store, {
            single_user: "single_data",
            all_account_category_data: "all_account_category_data",
            all_branch_data: "all_branch_data"
        }),
    },

};
</script>

<style></style>
