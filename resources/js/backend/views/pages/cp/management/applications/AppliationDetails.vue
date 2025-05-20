<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Application Details</h5>
                    </div>
                </div>
            </div>
            <div
                class="conatiner"

            >
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <div class="search"></div>
                        <div class="btns d-flex gap-2 align-items-center"></div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row gx-5">
                            <div class="col-md-8">
                                <div>
                                    <table class="table d-inline-block">
                                        <tbody>
                                            <tr
                                                v-for="item in single_applications_data.application_values?.filter(
                                                    (i) =>
                                                        i.title != 'description'
                                                )"
                                                :key="item.id"
                                            >
                                                <td>
                                                    {{ item.title || "N/A" }}
                                                </td>
                                                <td style="width: 2px">:</td>
                                                <td>
                                                    {{ item.value || "N/A" }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    <h5>Details</h5>
                                    <hr>
                                    <div
                                        class="text-justify"
                                        v-html="
                                            single_applications_data.application_values?.find(
                                                (i) => i.title == 'description'
                                            )?.value
                                        "
                                    ></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <form @submit.prevent="submitHandler">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Remarks</label>
                                                <div class="mt-1 mb-3">
                                                    <textarea
                                                        class="form-control"
                                                        name="remarks"
                                                        id=""
                                                        cols="30"
                                                        rows="5"
                                                        :value="
                                                            single_applications_data.remarks
                                                        "
                                                    ></textarea>
                                                </div>
                                            </div>
                                            <select
                                                name="is_approve"
                                                class="form-select"
                                                id=""
                                            >
                                                <option
                                                    :selected="
                                                        single_applications_data.is_approve ==
                                                        '1'
                                                            ? true
                                                            : false
                                                    "
                                                    value="1"
                                                >
                                                    Approved
                                                </option>
                                                <option
                                                    :selected="
                                                        single_applications_data.is_approve ==
                                                        '0'
                                                            ? true
                                                            : false
                                                    "
                                                    value="0"
                                                >
                                                    Disapproved
                                                </option>
                                            </select>
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-3"
                                        >
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex align-items-center border border-1"
                    ></div>
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
        param_id: "",
    }),
    created: async function () {
        this.param_id = this.$route.params.id;
        await this.get_single_application(this.param_id);

        // console.log("single_applications_data", this.single_applications_data);
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_single_application: "get_single_application",
            application_approval: "cp_application_approval",
        }),
        submitHandler: async function ($event) {
            this.application_approval(this.param_id, $event.target);
        },
    },
    computed: {
        ...mapState(application_setup_store, {
            single_applications_data: "single_applications_data",
        }),
    },
};
</script>

<style></style>
