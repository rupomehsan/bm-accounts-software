<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} Sohid Family
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllSohidFamily` }"
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
import { sohid_family_setup_store } from "./setup/store";
export default {
    data: () => ({
        role: window.role.bmSupport,
        form_fields,
        param_id: null,
    }),

    created: async function () {


        let id = this.$route.query.id;
        if (id) {
            this.form_fields = this.form_fields.filter(i => i.name !== 'password')
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                    });
                });
            }
        } else {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        }
    },

    methods: {
        ...mapActions(sohid_family_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            get_all_roles: "get_all_roles",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
                this.$router.push({ name: `${this.role}AllSohidFamily` });
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successfully created");
                    this.$router.push({ name: `${this.role}AllSohidFamily` });
                }
            }
        },
    },
    computed: {
        ...mapState(sohid_family_setup_store, {
            single_user: "single_data",
            role_data: "role_data",
        }),
    },
};
</script>

<style></style>
