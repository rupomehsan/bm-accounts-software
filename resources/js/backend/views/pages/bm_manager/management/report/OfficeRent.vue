<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div
                    class="row align-items-center justify-content-between rounded-2"
                >
                    <div class="col-lg-3">
                        <h5 class="m-0">অফিস ভাড়া</h5>
                    </div>
                    <div class="col-lg-6">
                        <form
                            @submit.prevent="SubmitHandler($event)"
                            ref="myForm"
                        >
                            <div class="d-flex gap-2 align-items-center">
                                <div>
                                    <label for="">Start date</label>
                                    <input
                                        type="month"
                                        class="form-control"
                                        name="start_date"
                                        v-model="start_date"
                                    />
                                </div>
                                <div>
                                    <label for="">End date</label>
                                    <input
                                        type="month"
                                        class="form-control"
                                        name="end_date"
                                        v-model="end_date"
                                    />
                                </div>

                                <div class="">
                                    <button
                                        type="submit"
                                        class="btn btn-primary mt-4"
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-end">
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a
                                    @click.prevent=""
                                    href="#"
                                    class="btn px-3 btn-outline-secondary"
                                    ><i class="fa fa-list"></i
                                ></a>
                                <ul>
                                    <li>
                                        <a
                                            href=""
                                            @click.prevent="
                                                ExportData(all_office_rent_data)
                                            "
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Export All
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div
                        v-if="loaded"
                        class="table-responsive card-body text-nowrap"
                    >
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th aria-label="id" class="cursor_n_resize">
                                        ক্রম
                                    </th>
                                    <th class="cursor_n_resize">অফিসের নাম</th>

                                    <th
                                        v-for="(
                                            month, index
                                        ) in all_office_rent_data.month"
                                        class="cursor_n_resize"
                                        :key="index"
                                    >
                                        {{ month }}
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="(
                                        item, index
                                    ) in all_office_rent_data.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>
                                    <td
                                        v-for="(data, index2) in item"
                                        :key="index2"
                                    >
                                        {{ data }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { report_setup_store } from "./setup/store";
import { CsvBuilder } from "filefy";
export default {
    data: () => ({
        offset: "5",
        search_data: "",
        page: "",
        from_date: "",
        to_date: "",
        loaded: false,
        start_date: "",
        end_date: "",
    }),
    created: async function () {
        this.start_date = moment().subtract(356, "d").format("YYYY-MM");
        this.end_date = moment().format("YYYY-MM");
        let that = this;
        setTimeout(function () {
            that.SubmitHandler();
        }, 2000);
        this.loaded = true;
    },
    methods: {
        ...mapActions(report_setup_store, {
            get_all_office_rent: "get_all_office_rent",
        }),
        SubmitHandler() {
            this.get_all_office_rent(this.$refs.myForm);
        },

        ExportData(data = [], prefix_name = "office_rent_report") {
            let col = ["Office Name"];
            col.push(data.month);
            let values = data.data.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
    },
    computed: {
        ...mapState(report_setup_store, {
            all_office_rent_data: "all_office_rent_data",
        }),
    },
};
</script>

<style></style>
