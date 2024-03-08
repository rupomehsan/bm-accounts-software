<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }}
                                Notification
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link
                                    :to="{ name: `Notifications` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"
                                    ><i class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1" v-if="loaded">
                    <form
                        @submit.prevent="submitHandler"
                        class="user_create_form card"
                    >
                        <div class="card-body">
                            <div class="row justify-content-start">
                                <div
                                    class="col-lg-12"
                                    v-for="(form_field, index) in form_fields"
                                    :key="index"
                                >
                                    <div class="admin_form form_1">
                                        <common-input
                                            :label="form_field.label"
                                            :type="form_field.type"
                                            :name="form_field.name"
                                            :multiple="form_field.multiple"
                                            :value="form_field.value"
                                            :data_list="form_field.data_list"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="my-2"
                                        >Select users</label
                                    >
                                    <div class="admin_form form_1">
                                        <dynamicSelect
                                            :selectType="'checkbox'"
                                            :sourceData="users"
                                            :data="tags"
                                            :setValue="setTags"
                                        ></dynamicSelect>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="" class="my-2"
                                        >Select Department</label
                                    >
                                    <div class="admin_form form_1">
                                        <dynamicSelect
                                            :selectType="'checkbox'"
                                            :sourceData="users2"
                                            :data="tags2"
                                            :setValue="setTags2"
                                        ></dynamicSelect>
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
import { message_setup_store } from "./setup/store";
export default {
    data: () => ({
        tags: [],
        tags2: [],
        form_fields,
        param_id: null,
        users: [],
        users2: [],
        loaded: false,
    }),

    created: async function () {
        this.users = await this.get_all_users();
        this.users2 = await this.get_all_department_users();

        // form_fields.forEach((item) => {
        //     if (item.name == "user_id") {
        //         console.log(item);
        //         this.users.forEach((user) => {
        //             let dataList = {};
        //             dataList.label = user.full_name;
        //             dataList.value = user.id;
        //             item.data_list.push(dataList);
        //         });
        //     }
        // });

        this.loaded = true;
        // console.log("dddddddd", this.form_fields);
    },

    methods: {
        ...mapActions(message_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            get_all_users: "get_all_users",
            get_all_department_users: "get_all_department_users",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.user_update($event.target, this.param_id);
            } else {
                let formateUser = this.tags.map((i) => i.id);
                let formateUser2 = this.tags2.map((i) => i.id);
                let form_data = new FormData($event.target);
                form_data.append("user_id", JSON.stringify(formateUser));
                form_data.append("department", JSON.stringify(formateUser2));
                let response = await this.user_store(form_data);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `All` });
                }
            }
        },
        setTags: function (v) {
            this.tags = v;
        },
        setTags2: function (v) {
            this.tags2 = v;
        },
    },
    computed: {
        ...mapState(message_setup_store, {
            single_user: "single_data",
        }),
    },
};
</script>

<style></style>
