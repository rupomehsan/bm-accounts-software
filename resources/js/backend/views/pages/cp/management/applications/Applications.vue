<template>
    <div class="page-body">
        <div class="pt-2">
            <!-- <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">
                            All {{ applicationType }} Applications
                        </h5>
                    </div>
                </div>
            </div> -->
            <div class="conatiner mt-2">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <div class="search">
                            <h5 class="m-0">
                                All {{ applicationType }} Applications
                            </h5>
                            <!-- <form @submit.prevent="SearchHandler($event)" ref="myForm">
                                <input type="hidden" name="id" value="{{ $route.params.id }}">
                                <div class="d-flex gap-2">
                                    <div>
                                        <label for="">Start date</label>
                                        <date-field :label="`Start Date`" :name="`start_date`" :value="from_date" />
                                    </div>
                                    <div>
                                        <label for="">End date</label>
                                        <date-field :label="`End Date`" :name="`end_date`" :value="end_date" />
                                    </div>

                                    <div class="pt-2">
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href=""
                                            @click.prevent="ExportData(all_applications_by_category.applications)">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>

                                    <!-- <li>
                                        <a href="#/user/import" class="">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Import
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="display data that has been deactivated" class="d-flex">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Deactivated data
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                    </th>
                                    <th>Name</th>
                                    <th class="cursor_n_resize">Category</th>
                                    <th class="cursor_n_resize">Subject</th>
                                    <th class="cursor_n_resize">Created At</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(
                                        item, index
                                    ) in all_applications_by_category.applications" :key="item.id">
                                    <td>{{ index + 1 }}</td>

                                    <td>
                                        <span class="text-warning cursor_pointer">
                                            {{ item.user.full_name }}
                                        </span>
                                        <div class="text-start action_btns_inline">
                                            <router-link :to="{
                                name: 'ApplicationsDetails',
                                params: { id: item.id },
                            }" class="d-inline-block text-info text-capitalize">
                                                details
                                            </router-link>
                                        </div>
                                    </td>

                                    <td>
                                        {{ all_applications_by_category.title }}
                                    </td>

                                    <td>
                                        {{ item.subject }}
                                    </td>

                                    <td>
                                        {{ new Date(item.created_at).toDateString() }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1">
                        <pagination :data="all_applications_by_category" :method="get_applications_by_category" />
                        <div class="float-right">
                            <!-- <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block">
                                <span>Total:</span>
                                <span>{{ 12 }}</span>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="canvas_backdrop">

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
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        applicationType: "",
    }),
    created: async function () {
        let id = this.$route.params.id;
        let type = this.$route.params.type;
        this.applicationType = type;
        let is_approve = type == "approved" ? 1 : 0;
        console.log(is_approve);

        await this.get_applications_by_category(id, is_approve);
        // console.log("myRes",this.all_applications_by_category)
    },
    methods: {
        ...mapActions(application_setup_store, {
            get_applications_by_category: "get_applications_by_category",
            get_data_by_search: "get_data_by_search",
        }),
        SearchHandler() {
            this.get_data_by_search(this.$refs.myForm)
        },
        ExportData(data = [], prefix_name = 'cp_not_approved_application') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.applicant_name = item.user?.full_name
                temp.category = this.all_applications_by_category.title
                temp.subject = item.subject
                dataArray.push(temp)
            })
            let col = Object.keys(dataArray[0]);
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },

    },
    computed: {
        ...mapState(application_setup_store, {
            all_applications_by_category: "all_applications_by_category",
        }),
    },
};
</script>

<style></style>
