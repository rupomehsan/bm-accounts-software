<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div
                    class="row align-items-center justify-content-between rounded-2"
                >
                    <div class="col-lg-4">
                        <h5 class="m-0">Department at a glance</h5>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>At a glance</h6>
                        <div class="search">
                            <!-- <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
                            </form> -->
                        </div>
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
                                                ExportData(
                                                    all_income_expense.data
                                                )
                                            "
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
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
                                        No
                                    </th>
                                    <th class="cursor_n_resize">
                                        Department Name
                                    </th>
                                    <th class="cursor_n_resize">Income</th>
                                    <th class="cursor_n_resize">Expense</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr
                                    v-for="(
                                        item, index
                                    ) in all_income_expense.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>

                                    <td>
                                        {{ item.full_name }}
                                    </td>
                                    <td>
                                        {{ item.income }}
                                    </td>

                                    <td>
                                        {{ item.expense }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="canvas_backdrop"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { division_at_a_glance_setup_store } from "./setup/store";
import { CsvBuilder } from "filefy";
export default {
    data: () => ({
        loaded: false,
    }),
    created: async function () {
        await this.division_at_a_glance();
        this.loaded = true;
    },
    methods: {
        ...mapActions(division_at_a_glance_setup_store, {
            division_at_a_glance: "all",
        }),
        ExportData(data = [], prefix_name = "department_at_a_glance") {
            let dataArray = [];
            data.forEach((item) => {
                let temp = {};
                temp.Department_Name = item.full_name;
                temp.income = item.income;
                temp.expense = item.expense;
                dataArray.push(temp);
            });
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
        ...mapState(division_at_a_glance_setup_store, {
            all_income_expense: "all_data",
        }),
    },
};
</script>

<style></style>
