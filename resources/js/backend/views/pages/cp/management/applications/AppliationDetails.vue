<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Application Management</h5>
                    </div>
                    <div class="col-lg-6 text-end">

                    </div>
                </div>
            </div>
            <div class="conatiner" v-if="single_applications_data.application_values?.length">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            Application Details
                        </h6>
                        <div class="search">

                        </div>
                        <div class="btns d-flex gap-2 align-items-center">

                        </div>
                    </div>
                    <div class="card-body p-4 ">
                        <div>
                            <table class="table d-inline-block">
                                <tbody>
                                    <tr v-for="item in single_applications_data.application_values.filter(i => i.title != 'description')"
                                        :key="item.id">
                                        <td>
                                            {{ item.title }}
                                        </td>
                                        <td style="width: 2px;">:</td>
                                        <td> {{ item.value }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <h5>Details</h5>
                            <div v-html="single_applications_data.application_values.find(i => i.title == 'description').value">
                            </div>
                        </div>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1">

                    </div>
                </div>
                <div class="canvas_backdrop">
                    <!---->
                </div>
                <div class="canvas_backdrop">
                    <div class="content right">
                        <div class="content_header">
                            <h3 class="offcanvas-title">Selected Users</h3>
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="cotent_body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>id</th>
                                        <th>name</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
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
        offset: "5",
        search_data: "",
    }),
    created: async function () {
        let id = this.$route.params.id

        await this.get_single_application(id);

        console.log("single_applications_data", this.single_applications_data);
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_single_application: "get_single_application",
        }),
    },
    computed: {
        ...mapState(application_setup_store, {
            single_applications_data: "single_applications_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_single_application();
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },
    },
};
</script>

<style></style>
