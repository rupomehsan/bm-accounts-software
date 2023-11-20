<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} Notification
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `Notifications` }"
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
                                    <div class="admin_form form_1 row">
                                        <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
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
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { notification_setup_store } from "./setup/store";
export default {
    data: () => ({
        form_fields,
        param_id: null,
        users: []
    }),

    created: async function () {
        this.users = await this.get_all_users()
        form_fields.forEach((item) => {
            if (item.name == 'user_id') {
                this.users.forEach((user) => {
                    let dataList = {}
                    dataList.label = user.full_name,
                        dataList.value = user.id,
                        item.data_list.push(dataList)
                })
            }
        });
        // console.log("dddddddd", this.form_fields);
    },

    methods: {
        ...mapActions(notification_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            get_all_users: "get_all_users",
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
        ...mapState(notification_setup_store, {
            single_user: "single_data",
        }),
    },
};
</script>

<style></style>

