<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center justify-content-between rounded-2">
                    <div class="col-lg-3">
                        <h5 class="m-0"> ঋণ রেজিস্টার</h5>
                    </div>
                    <div class="col-lg-6">
                        <form @submit.prevent="SubmitHandler($event)" ref="myForm">
                            <div class="d-flex gap-2">
                                <div>
                                    <label for="">Start date</label>
                                    <date-field :label="`Start Date`" :name="`start_date`" :value="from_date" />
                                </div>
                                <div>
                                    <label for="">End date</label>
                                    <date-field :label="`End Date`" :name="`end_date`" :value="to_date" />
                                </div>

                                <div class="pt-2">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-end">
                        <div class="btns d-flex gap-2 align-items-center">
                            <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="" @click.prevent="ExportData(loan_register_data)">
                                            <i class="fa-regular fa-hand-point-right"></i>
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
                                        কারন
                                    </th>
                                    <th class="cursor_n_resize">
                                        টাকার পরিমান
                                    </th>
                                    <th class="cursor_n_resize">
                                        চুক্তির তারিখ
                                    </th>
                                    <!-- <th class="cursor_n_resize">
                                        চুক্তির মেয়াদ
                                    </th> -->
                                    <th class="cursor_n_resize">
                                        চুক্তি সত্ত্বায়নকারী
                                    </th>
                                    <th class="cursor_n_resize">
                                        জামানত ফেরত
                                    </th>
                                    <th class="cursor_n_resize">
                                        ফেরত-পরিমান
                                    </th>
                                    <th class="cursor_n_resize">
                                        মন্তব্য
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(item, index) in loan_register_data" :key="item.id">

                                    <td>{{ index + 1 }}</td>

                                    <td>
                                        {{ item.purpose }}
                                    </td>
                                    <td>
                                        {{ item.amount }}
                                    </td>

                                    <td>
                                        {{ item.taken_date }}
                                    </td>



                                    <td>
                                        {{ item.appropriator }}
                                    </td>

                                    <td>
                                        {{ item.loan_payment?.given_date ?? "N/A" }}
                                    </td>
                                    <td>
                                        {{ item.loan_payment?.amount ?? "N/A" }}
                                    </td>
                                    <td>
                                        {{ item.description }}
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
import { CsvBuilder } from 'filefy';
export default {
    data: () => ({
        offset: "5",
        search_data: "",
        page: "",
        from_date: '',
        to_date: '',
        loaded: false
    }),
    created: async function () {
        this.from_date = moment().subtract(90, 'd').format('YYYY-MM-DD')
        this.to_date = moment().format('YYYY-MM-DD')

        let that = this
        setTimeout(function () {
            that.SubmitHandler()
        }, 2000)

        this.loaded = true

    },
    methods: {
        ...mapActions(report_setup_store, {
            get_all_loan_register: "get_all_loan_register",
        }),
        async SubmitHandler() {
            await this.get_all_loan_register(this.$refs.myForm);
        },

        ExportData(data = [], prefix_name = 'loan_register_report') {
            let dataArray = []
            data.forEach((item) => {
                let temp = {}
                temp.id = item.id
                temp.purpose = item.purpose
                temp.amount = item.amount
                temp.taken_date = item.taken_date
                temp.appropriator = item.appropriator
                temp.taken_date = item.taken_date
                temp.given_date = item.given_date
                temp.amount = item.loan_payment?.amount
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
        ...mapState(report_setup_store, {
            loan_register_data: "loan_register_data",
        }),
    },

};
</script>

<style></style>
