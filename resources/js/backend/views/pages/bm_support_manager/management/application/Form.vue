<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }}
                                Application
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}ApplicationAll` }"
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
                                            <select v-model="applicant_id" name="applicant_id" id="applicant_id"
                                                class="form-control">
                                                <option value="">
                                                    Select applicant
                                                </option>
                                                <template v-for="item in applications_data" :key="item.id">
                                                    <option :value="item.id">
                                                        {{ item.full_name }}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2">Application subject</label>
                                            <input v-model="subject" type="text" id="subject" class="form-control"
                                                name="subject" />
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check form-switch mt-2"><input v-model="is_moukuf"
                                                    class="form-check-input" type="checkbox" name="is_moukuf"
                                                    :value="is_moukuf ? 1 : 0" id="flexSwitchCheck_1"><label
                                                    class="form-check-label" for="flexSwitchCheckDefault">For moukuf
                                                    ?</label></div>
                                        </div>

                                        <div class="form-group" v-if="is_moukuf">
                                            <label for="" class="my-2">Select BM Income
                                                category</label>
                                            <select name="income_category_id" id="income_category_id"
                                                class="form-control" v-model="income_category_id">
                                                <option value="">
                                                    Select bm income category
                                                </option>
                                                <template v-for="item in income_categories" :key="item.id">
                                                    <option :value="item.id">
                                                        {{ item.title }}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="form-group" v-if="is_moukuf">
                                            <label for="" class="my-2">Moukuf amount</label>
                                            <input v-model="moukuf_amount" type="number" id="moukuf_amount"
                                                class="form-control" name="moukuf_amount" />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2">Select application
                                                category</label>
                                            <select name="cp_application_category_id" id="cp_application_category_id"
                                                class="form-control" v-model="cp_application_category_id">
                                                <option value="">
                                                    Select application category
                                                </option>
                                                <template v-for="item in application_categories_data" :key="item.id">
                                                    <option :value="item.id">
                                                        {{ item.title }}
                                                    </option>
                                                </template>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">Pdf submission file</label>
                                            <input type="file" class="form-control" name="pdf_submission_file" id="" />
                                        </div>

                                        <template v-for="(item, index) in extrafield" :key="item.id">
                                            <div class="form-group my-2">
                                                <label class="my-2">{{ item.name }}</label>
                                                <template v-if="item.type !== 'textarea'">
                                                    <input :type="item.type"
                                                        :name="`extrafields[${index}][${item.name}]`"
                                                        class="form-control" :value="item.value" />
                                                </template>

                                                <template v-else>
                                                    <textarea :name="`extrafields[${index}][${item.name}]`"
                                                        :value="item.value" class="form-control" rows="5"></textarea>
                                                </template>
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
import { application_setup_store } from "./setup/store";

export default {
    data: () => ({
        role: window.role.bmSupport,
        param_id: null,
        applicant_id: "",
        subject: "",
        is_moukuf: false,
        moukuf_amount: "",
        income_category_id: "",
        cp_application_category_id: "",

        extrafield: [],
        editData: []
    }),

    created: async function () {
        let id = this.$route.query.id;

        await this.get_all_applications();
        await this.get_all_application_categories();
        await this.get_all_income_categories();

        if (id) {
            this.param_id = id;
            await this.application_singledata_get(id);
            if (this.single_data) {

                Object.entries(this.single_data).forEach((value) => {


                    if (value[0] == "cp_application_category_id") {
                        this.cp_application_category_id = value[1];
                    }

                    if (value[0] == "applicant_id") {
                        this.applicant_id = value[1];
                    }
                    if (value[0] == "income_category_id") {
                        this.income_category_id = value[1];
                    }
                    if (value[0] == "moukuf_amount") {
                        this.moukuf_amount = value[1];
                    }

                    if (value[0] == "subject") {
                        this.subject = value[1];
                    }
                    if (value[0] == "application_values") {
                        this.editData = value[1];
                    }
                    if (value[0] == "is_moukuf" && value[1] == 1) {
                        this.is_moukuf = true
                    }
                });

            }
        }
    },

    methods: {
        ...mapActions(application_setup_store, {
            application_format_update: "update",
            application_singledata_get: "get",
            application_store: "store",
            get_all_application_categories: "get_all_application_categories",
            get_all_application_format_by_category:
                "get_all_application_format_by_category",
            get_all_applications: "get_all_applications",
            get_all_income_categories: "get_all_income_categories",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.application_format_update($event.target, this.param_id);
                this.$router.push({ name: `${this.role}ApplicationAll` });
            } else {
                let response = await this.application_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successfully created");
                    this.$router.push({ name: `${this.role}ApplicationAll` });
                }
            }
        },
    },

    computed: {
        ...mapState(application_setup_store, {
            single_data: "single_data",
            application_categories_data: "application_categories_data",
            application_format_by_category_data:
                "application_format_by_category_data",
            applications_data: "applications_data",
            income_categories: "income_categories",
        }),
    },

    watch: {
        async cp_application_category_id(id) {

            let additinalField = await this.get_all_application_format_by_category(id);
            this.extrafield = []
            additinalField.forEach((item) => {
                let addData = {}
                addData.name = item.field_name
                addData.type = item.field_type
                addData.value = ''
                this.extrafield.push(addData)
            })
            if (this.editData) {
                this.extrafield.forEach((item, index) => {
                    item.value = this.editData[index].value
                })
            }
            console.log("ed", this.editData);
        },
    },
};
</script>

<style></style>
