<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div
                    class="row align-items-center justify-content-between rounded-2"
                >
                    <div class="col-lg-3">
                        <h5 class="m-0">এককালীন প্রদান</h5>
                    </div>
                    <div class="col-lg-6">
                        <form
                            @submit.prevent="SubmitHandler($event)"
                            :ref="'myForm'"
                        >
                            <div class="d-flex gap-2">
                                <div>
                                    <label for="">Start date</label>
                                    <date-field
                                        :label="`Start Date`"
                                        :name="`start_date`"
                                        :value="from_date"
                                    />
                                </div>
                                <div>
                                    <label for="">End date</label>
                                    <date-field
                                        :label="`End Date`"
                                        :name="`end_date`"
                                        :value="to_date"
                                    />
                                </div>

                                <div class="pt-2">
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
                                                ExportData(
                                                    all_ekkalin_prodan_data
                                                )
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
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th aria-label="id" class="cursor_n_resize">
                                        ক্রম
                                    </th>
                                    <th class="cursor_n_resize">
                                        প্রদানের তারিখ
                                    </th>
                                    <th class="cursor_n_resize">
                                        টাকার পরিমান
                                    </th>
                                    <th class="cursor_n_resize">আবাসন</th>

                                    <th class="cursor_n_resize">যানবাহন</th>
                                    <th class="cursor_n_resize">সম্পদ</th>
                                    <th class="cursor_n_resize">চিকিৎসা</th>
                                    <th class="cursor_n_resize">ছাত্রকল্যান</th>
                                    <th class="cursor_n_resize">
                                        শিক্ষা সহায়তা
                                    </th>
                                    <th class="cursor_n_resize">
                                        প্রো.বাস্তবায়ন
                                    </th>
                                    <th class="cursor_n_resize">প্রশিক্ষন</th>
                                    <th class="cursor_n_resize">শহীদ পরিবার</th>
                                    <th class="cursor_n_resize">মামলা</th>
                                    <th class="cursor_n_resize">শিশুকল্যাণ</th>
                                    <th class="cursor_n_resize">
                                        দা.কার্যক্রম
                                    </th>
                                    <th class="cursor_n_resize">বিশেষ</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="(
                                        item, index
                                    ) in all_ekkalin_prodan_data"
                                    :key="index"
                                >
                                    <td>{{ item.id }}</td>

                                    <td v-for="data in item" :key="data">
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
    }),
    created: async function () {
        this.from_date = moment().subtract(30, "d").format("YYYY-MM-DD");
        this.to_date = moment().format("YYYY-MM-DD");
        let that = this;

        setTimeout(function () {
            that.SubmitHandler();
        }, 2000);
    },
    methods: {
        ...mapActions(report_setup_store, {
            get_all_ekkalin_prodan: "get_all_ekkalin_prodan",
            user_delete: "delete",
        }),
        SubmitHandler() {
            this.get_all_ekkalin_prodan(this.$refs.myForm);
        },
        ExportData(data = [], prefix_name = "ekkalin_prodan_report") {
            let col = [
                "ক্রম",
                "প্রদানের তারিখ",
                "টাকার পরিমান",
                "আবাসন",
                "যানবাহন",
                "সম্পদ",
                "চিকিৎসা",
                "ছাত্রকল্যান",
                "শিক্ষা সহায়তা",
                "প্রো.বাস্তবায়ন",
                "প্রশিক্ষন",
                "শহীদ পরিবার",
                "মামলা",
                "শিশুকল্যাণ",
                "দা.কার্যক্রম",
                "বিশেষ",
            ];
            let values = data.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
    },
    computed: {
        ...mapState(report_setup_store, {
            all_ekkalin_prodan_data: "all_ekkalin_prodan_data",
        }),
    },
};
</script>

<style></style>
