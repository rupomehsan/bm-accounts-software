<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} Application Format
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}ApplicationFormatAll` }"
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
                                <div class="col-lg-7">
                                    <div class="admin_form" v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                        <common-input :label="form_field.label" :type="form_field.type"
                                            :name="form_field.name" :multiple="form_field.multiple"
                                            :value="form_field.value" :data_list="form_field.data_list
                                    " />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-betwen my-2">
                                            <label for="">Extra field</label>
                                            <div>
                                                <i class="fa fa-plus" role="button" @click="addExtraField"></i>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <template v-for="(field, index) in extra_fields" :key="index">
                                        <div class="row my-2 align-items-center">
                                            <div class="col-md-5">
                                                <input type="text" v-model="field.field_name" placeholder="field name"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-5">
                                                <select name="" class="form-control" v-model="field.field_type">
                                                    <option value="text">Text</option>
                                                    <option value="file">File</option>
                                                    <option value="checkbox">Checkbox</option>
                                                    <option value="radio">Radio</option>
                                                    <option value="textarea">Textarea</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <i class="fa fa-minus" role="button"
                                                    @click="deleteExtraField(index)"></i>
                                            </div>
                                        </div>
                                    </template>
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
import { application_format_setup_store } from "./setup/store";

export default {
    data: () => ({
        role: window.role.bm,
        form_fields,
        param_id: null,
        extra_fields: []
    }),

    created: async function () {
        let id = this.$route.query.id;

        await this.get_all_application_categories()

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
            if (this.single_data && this.single_data.length > 0) {
                if (this.single_data[0].cp_application_category_id) {

                    this.form_fields[0].value = this.single_data[0].cp_application_category_id;
                }

                this.single_data.forEach(element => {
                    let dataFiled = {}
                    dataFiled.field_name = element.field_name
                    dataFiled.field_type = element.field_type
                    this.extra_fields.push(dataFiled)
                });
            }
        } else {
            this.form_fields.forEach((item) => {
                item.value = "";
            });
        }
    },

    methods: {
        ...mapActions(application_format_setup_store, {
            application_format_update: "update",
            application_format_get: "get",
            application_format_store: "store",
            get_all_application_categories: "get_all_application_categories",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.application_format_update($event.target, this.param_id, this.extra_fields);
                this.$router.push({ name: `${this.role}ApplicationFormatAll` });
            } else {
                let response = await this.application_format_store($event.target, this.extra_fields);
                if (response.data.status === "success") {
                    window.s_alert("Data successfully created");
                    this.$router.push({ name: `${this.role}ApplicationFormatAll` });
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
        ...mapState(application_format_setup_store, {
            single_data: "single_data",
            application_categories_data: "application_categories_data",
        }),
    },
};
</script>

<style></style>
