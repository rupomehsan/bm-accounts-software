<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} user
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `AllBranchTarget` }"
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
                                <div class="col-lg-12" v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                    <div class="admin_form form_1">

                                        <common-input :label="form_field.label" :type="form_field.type"
                                            :name="form_field.name" :multiple="form_field.multiple"
                                            :value="form_field.value" :data_list="form_field.data_list
                                                " />

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
export default {
    data: () => ({
        form_fields,
        param_id: null,
        loded: false,
    }),

    created: async function () {

        await this.get_all_account_category();
        await this.get_all_branch();

        this.form_fields.forEach((item) => { 
            if (item.name == "account_category_id") {
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
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        console.log(field.name);
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
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
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `All` });
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
