<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Update password</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `CpDashboard` }"
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
                                <div class="col-lg-6">
                                    <div class="admin_form">
                                        <template
                                            v-for="(
                                                form_field, index
                                            ) in form_fields"
                                            :key="index"
                                        >
                                            <common-input
                                                :label="form_field.label"
                                                :type="form_field.type"
                                                :name="form_field.name"
                                                :multiple="form_field.multiple"
                                                :value="form_field.value"
                                                :data_list="
                                                    form_field.data_list
                                                "
                                            />
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
import { user_setup_store } from "./setup/store";
export default {
    data: () => ({
        form_fields,
        param_id: null,
    }),

    created: async function () {
        console.log(this.form_fields);

        await this.get_all_roles();
    },

    methods: {
        ...mapActions(user_setup_store, {
            update_password: "update_password",
        }),

        submitHandler: async function ($event) {
            let response = await this.update_password($event.target);
            if (response.data.status === "success") {
                window.s_alert("Data successfully created");
                this.$router.push({ name: `bmManagerDashboard` });
            }
        },
    },
};
</script>

<style></style>
