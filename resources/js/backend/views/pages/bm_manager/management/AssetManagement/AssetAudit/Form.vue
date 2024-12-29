<template>

    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? 'Update' : 'Create' }} new <span class="text-lowercase">{{ route_prefix
                                    }}</span>
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
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <template v-for="(
                                            form_field, index
                                        ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :onchange="getRespose"
                                                :type="form_field.type" :name="form_field.name"
                                                :multiple="form_field.multiple" :value="form_field.value" :data_list="form_field.data_list
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
import { asset_audit_setup_store } from './setup/store';
import setup from "./setup";
import form_fields from "./setup/form_fields";

export default {
    data: () => ({
        role: window.role.bm,
        route_prefix: '',
        form_fields,
        param_id: null,
    }),
    created: async function () {
        let id = this.$route.query.id;
        this.route_prefix = setup.route_prefix;
        await this.get_all_data()
        if (id) {
            this.param_id = id;
            await this.get_single_data(id);
            if (this.single_data) {
                this.form_fields.forEach((field, index) => {
                    Object.entries(this.single_data).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }
                    });
                });
            }
        } else {
            this.form_fields.forEach((item) => {
                if (item.name !== 'start_date' && item.name !== 'end_date') item.value = "";
            });
        }
    },
    methods: {
        ...mapActions(asset_audit_setup_store, {
            get_all_data: 'all',
            get_single_data: 'get',
            store_data: 'store',
            update_data: 'update',
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


    },

    computed: {
        ...mapState(asset_audit_setup_store, {
            single_data: "single_data",
            all_data: 'all_data',
        }),
    },


}
</script>
