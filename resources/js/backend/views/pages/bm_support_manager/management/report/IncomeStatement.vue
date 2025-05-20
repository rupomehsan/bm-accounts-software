<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Income  Statement</h5>
                    </div>
                </div>
            </div>
            <div class="row" v-if="loaded">
                <div class="col-md-12">
                    <div class="card list_card">
                        <div class="card-header">
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

                                    <div>
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table_actions">
                                <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                        class="fa fa-list"></i></a>
                                <ul>
                                    <li>
                                        <a href="" @click.prevent="incomeExpenseStatementExport(statement_data?.statements)">
                                            <i class="fa-regular fa-hand-point-right"></i>
                                            Export All
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="ledger_book card-body text-nowrap">
                            <div class="ledger_row ledger_heading">
                                <div class="ledger_col date">মাস ও তারিখ</div>
                                <div class="ledger_col receipt">বিবরণ</div>
                                <div class="ledger_col receipt">ফোলিও বা পৃষ্ঠা</div>
                                <div class="ledger_col receipt">জমা বা খরচ</div>
                                <div class="ledger_col receipt">জমা</div>
                                <div class="ledger_col receipt">খরচ</div>
                                <div class="ledger_col receipt">অবশিষ্ঠ</div>
                            </div>
                            <div class="ledger_row" v-for="i in statement_data?.statements" :key="i.id">
                                <div class="ledger_col date text-start">{{ i.date }}</div>
                                <div class="ledger_col receipt">{{ i.description }}</div>
                                <div class="ledger_col name">{{ i.folio }}</div>
                                <div class="ledger_col name">{{ i.income_or_expense }}</div>
                                <div class="ledger_col receipt">{{ i.income }}</div>
                                <div class="ledger_col receipt">{{ i.expense }}</div>
                                <div class="ledger_col receipt">{{ i.balance }}</div>
                            </div>
                            <div class="ledger_row ledger_footer">
                                <div class="ledger_col date"></div>
                                <div class="ledger_col receipt"></div>
                                <div class="ledger_col name">Total</div>
                                <div class="ledger_col receipt">{{ statement_data.statements_total?.total_income }}
                                </div>
                                <div class="ledger_col receipt">{{ statement_data.statements_total?.total_expense }}
                                </div>
                                <div class="ledger_col receipt">{{ statement_data.statements_total?.total_balance }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-1 border-top-0">
                            <ul class="d-flex gap-3" style="list-style-type: none;">
                                <li>Total Income: <b class="text-success">{{ closing_data?.income }}</b> </li>
                                <li>Total Expense: <b class="text-warning">{{ closing_data?.expense }}</b> </li>
                                <li>Total Extra: <b class="text-info"> {{ closing_data?.extra }}</b></li>
                                <li>Previous Extra: <b class="text-danger">{{ closing_data?.extra_before }}</b> </li>
                                <li>Present Extra: <b class="text-success"> {{ closing_data?.preset_extra }}</b> </li>
                            </ul>
                        </div>
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

            get_statements: "get_statements",
            fetch_income_expense_closing_in_range: "fetch_income_expense_closing_in_range",

        }),
        SubmitHandler() {
            this.get_statements(this.$refs.myForm)
            this.fetch_income_expense_closing_in_range(this.$refs.myForm)
        },
        incomeExpenseStatementExport(data = [], prefix_name = 'statement') {
            let col = Object.keys(data[0]);
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
            statement_data: "statement_data",
            closing_data: "closing_data",
        }),
    },

};
</script>

<style></style>
