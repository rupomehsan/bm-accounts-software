<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>Create new user</h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns"><router-link :to="{ name: `All` }"
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
                                        <template v-for="(form_field, index) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :data_list="form_field.data_list" />
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info"><i class="fa fa-upload"></i>
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
import { mapActions } from 'pinia';
import form_fields from "./setup/form_fields.js";
import { user_setup_store } from "./setup/store"
export default {
    data: () => ({
        form_fields,
        param_id: null
    }),

    created: function () {
        let id = this.$route.query.id
        if (id) {
            this.param_id = id
            this.user_get(id)
        }
    },

    methods: {
        ...mapActions(user_setup_store, {
            user_update: 'update',
            user_get: 'get',
            user_store: 'store',
        }),
        submitHandler: function ($event) {
            if (this.param_id) {
                this.user_update(this.param_id)
            } else {
                this.user_store($event.target)
            }
        }
    }

}
</script>

<style></style>
