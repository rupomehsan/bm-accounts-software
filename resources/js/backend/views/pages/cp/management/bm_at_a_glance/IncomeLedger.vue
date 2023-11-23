<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center justify-content-between rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">BM at a glance</h5>
                    </div>
                    <div class="col-lg-6 text-end w-25 float-right">
                        <select name="" id="" class="form-select" v-model="page">
                            <option value="">Goto page</option>
                            <option value="IncomeLedger">আয়ের লেজার/খতিয়ান</option>
                            <option value="ExpenseLedger">ব্যয়ের লেজার/খতিয়ান</option>
                            <option value="LoanRegister">ঋণ রেজিস্টার</option>
                            <option value="Jamanot">জামানত</option>
                            <option value="Salary">বেতন</option>
                            <option value="OfficeRent">অফিস ভাড়া</option>
                            <option value="HouseRent">বাসা ভাড়া</option>
                            <option value="AssetList">সম্পদ তালিকা</option>
                            <option value="BMStockRegister">বিএম স্টক রেজিস্টার</option>
                            <option value="AssetRegister">সম্পদ রেজিস্টার</option>
                            <option value="EkkalinProdan">এককালীন প্রদান</option>
                            <option value="NiyomitoProdan">নিয়মিত প্রদান</option>
                            <option value="KendriyoSuvakankhiThekeAy">কেন্দ্রীয় শুভাকাঙ্খী থেকে আয়</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card list_card">
                    <div class="card-header">
                        <h4>
                            Income Ledger ( Oct 24 - Nov 23 )
                        </h4>
                        <div class="search">
                            <input type="date" class="income_expense_date_field" />
                            To
                            <input type="date" class="income_expense_date_field" />
                        </div>

                        <div class="btns d-flex gap-2 align-items-center">
                            <button type="button" class="btn rounded-pill btn-outline-info">
                                <i class="fa fa-print me-5px"></i>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="ledger_book card-body text-nowrap">
                        <div class="ledger_row ledger_heading">
                            <div class="ledger_col name">Name</div>
                            <div class="ledger_col date">Date</div>
                            <div class="ledger_col receipt">Receipt</div>
                            <div class="ledger_col">Amount</div>
                            <div class="ledger_col">
                                অগ্রিম আয়
                            </div>
                            <div class="ledger_col">
                                ঈদ কার্ড
                            </div>
                            <div class="ledger_col">
                                এককালীন
                            </div>
                            <div class="ledger_col">
                                ওপেন-বুক
                            </div>
                            <div class="ledger_col">
                                কুরআন
                            </div>
                            <div class="ledger_col">
                                ঘাটতি
                            </div>
                            <div class="ledger_col">
                                টি-শার্ট
                            </div>
                            <div class="ledger_col">
                                নববর্ষ বাবদ
                            </div>
                            <div class="ledger_col">
                                পণ্য বিক্রি আয়
                            </div>
                            <div class="ledger_col">
                                ফ্লাট আয়
                            </div>
                            <div class="ledger_col">
                                বকেয়া আদায়
                            </div>
                            <div class="ledger_col">
                                বমজান ক্যালেন্ডার
                            </div>
                            <div class="ledger_col">
                                বিএম থেকে আয়
                            </div>
                            <div class="ledger_col">
                                বিশেষ আয়
                            </div>
                            <div class="ledger_col">
                                বুকসেট
                            </div>
                            <div class="ledger_col">
                                ব্যাঙ্ক জমার মাধ্যমে আয়
                            </div>
                            <div class="ledger_col">
                                ভুর্তুকি
                            </div>
                            <div class="ledger_col">
                                মওকুফ
                            </div>
                            <div class="ledger_col">
                                সাইন্স সিরিজ
                            </div>
                            <div class="ledger_col">
                                সাধারণ প্রকাশনার বই বিক্রি
                            </div>
                            <div class="ledger_col">
                                সৈজন্য
                            </div>
                            <div class="ledger_col">
                                স্কুল সেটের বই বিক্রি
                            </div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                        <div class="ledger_row">
                            <div class="ledger_col name">mr accountant</div>
                            <div class="ledger_col date text-start">Fri Nov 10 2023</div>
                            <div class="ledger_col receipt">9651713</div>
                            <div class="ledger_col">19219</div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col">
                                19219
                            </div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                            <div class="ledger_col"></div>
                        </div>
                    </div>
                    <div class="card-footer py-1 border-top-0">
                        <ul class="d-flex gap-3" style="list-style-type: none;">
                            <li>Total Income: <b class="text-success">426871</b></li>
                            <li>Total Expense: <b class="text-warning">29497</b></li>
                            <li>Total Extra: <b class="text-info"> 397374</b></li>
                            <li>Previous Extra: <b class="text-danger">-273083</b></li>
                            <li>Present Extra: <b class="text-success"> 124291</b></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { income_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
        page: ''
    }),
    created: async function () {
        await this.get_all_incomes();
    },
    methods: {
        ...mapActions(income_setup_store, {
            get_all_incomes: "all",
            user_delete: "delete",
        }),

        gotoPage(e) {
            console.log(e.target.value);
        }
    },
    computed: {
        ...mapState(income_setup_store, {
            all_incomes: "all_data",
        }),
    },
    watch: {
        offset: async function (newOffset, oldOffset) {
            await this.get_all_incomes();
        },
        search_data: function (newSearchData, oldSearchData) {
            console.log(newSearchData);
        },

        page: function () {
            this.$router.push({ name: this.page })
        }
    },
};
</script>

<style></style>
