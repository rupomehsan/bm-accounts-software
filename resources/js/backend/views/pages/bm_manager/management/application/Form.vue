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
                                <router-link :to="{ name: `ApplicationAll` }"
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
                            <div class="row justify-content-start">
                                <div class="col-lg-6">
                                    <div class="admin_form">
                                        <div class="form-group">
                                            <label for="" class="my-2">Select applicant</label>
                                            <select name="applicant_id" id="applicant_id" class="form-control">
                                                <option value="">Select applicant</option>
                                                <template v-for="item in applications_data" :key="item.id">
                                                    <option :value="item.id">{{ item.full_name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2">Application subject</label>
                                            <input type="text" id="subject" class="form-control" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2">Select application category</label>
                                            <select name="cp_application_category_id" id="cp_application_category_id"
                                                class="form-control" v-model="application_category">
                                                <option value="">Select application category</option>
                                                <template v-for="item in application_categories_data" :key="item.id">
                                                    <option :value="item.id">{{ item.title }}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2">Pdf submission file</label>
                                            <input type="file" class="form-control" name="pdf_submission_file" id="">
                                        </div>
                                        <template v-for="item in application_format_by_category_data" :key="item.id">
                                            <div class="form-group my-2" v-if="item.field_type !== 'textarea'">
                                                <label for="" class="my-2">{{ item.field_name }}</label>
                                                <input :type="item.field_type" v-model="formData[item.field_name]"
                                                    class="form-control">
                                            </div>
                                            <div v-if="item.field_type == 'textarea'">
                                                <label for="" class="my-2 ">{{ item.field_name }}</label>
                                                <textarea v-model="formData[item.field_name]" id="" class="form-control"
                                                    cols="" rows="5"></textarea>
                                            </div>
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
import { application_setup_store } from "./setup/store";


export default {

    data: () => ({
        form_fields,
        param_id: null,
        application_category: '',
        extrafield: {},
        formData: {},
    }),

    created: async function () {

        let id = this.$route.query.id;

        await this.get_all_application_categories()
        await this.get_all_applications()

        this.form_fields.forEach((field) => {

            if (field.name == 'cp_application_category_id') {
                field.data_list = []
                this.application_categories_data.forEach((item) => {
                    let fielData = {}
                    fielData.label = item.title
                    fielData.value = item.id
                    field.data_list.push(fielData)
                })
            }

        })

        if (id) {
            this.param_id = id;
            await this.application_format_get(id);
            if (this.single_data) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {

                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                        if (field.name == 'user_role_id') {
                            if (value[0] == 'roles') {
                                console.log("value", value[1])
                                this.form_fields[index].value = value[1][0].id;
                            }
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

        ...mapActions(application_setup_store, {
            application_format_update: "update",
            application_format_get: "get",
            application_store: "store",
            get_all_application_categories: "get_all_application_categories",
            get_all_application_format_by_category: "get_all_application_format_by_category",
            get_all_applications: "get_all_applications",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.application_format_update($event.target, this.param_id);
            } else {
                let response = await this.application_store($event.target, this.formData);
                if (response.data.status === "success") {
                    window.s_alert("Data successfully created");
                    this.$router.push({ name: `ApplicationAll` });
                }
            }
        },

        addExtraField: function () {
            let dataFiled = {}
            dataFiled.field_name = ''
            dataFiled.field_type = ''
            this.extra_fields.push(dataFiled)
        },

        deleteExtraField: function (index) {
            this.extra_fields.splice(index, 1)
        }


    },

    computed: {

        ...mapState(application_setup_store, {
            single_data: "single_data",
            application_categories_data: "application_categories_data",
            application_format_by_category_data: "application_format_by_category_data",
            applications_data: "applications_data",
        }),

    },

    watch: {

        application_category(id) {
            this.get_all_application_format_by_category(id)
            console.log(this.application_format_by_category_data);
            // this.extrafield = this.application_format_by_category_data
            // this.extrafield.map(item => item.field_name)
        }

    }

};
</script>

<style></style>
