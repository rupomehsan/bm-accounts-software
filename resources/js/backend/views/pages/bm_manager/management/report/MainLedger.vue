<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Main Ledger</h5>
                    </div>
                    <div class="col-md-6">
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="conatiner">
                        <div class="card list_card">
                            <div class="card-header align-items-center justify-content-bitween">
                                <h5>জমার খাতা</h5>
                                <div class="btns d-flex gap-2 ">
                                    <div class="table_actions">
                                        <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                                class="fa fa-list"></i></a>
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <i class="fa-regular fa-hand-point-right"></i>
                                                    Export All
                                                </a>
                                            </li>
                                            <!---->

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive card-body text-nowrap">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-light">
                                        <tr class="t-head">

                                            <th aria-label="id" class="cursor_n_resize">
                                                মাস ও তারিখ
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                রশিদ নাম্বার
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                বিবরণ
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                ফোলিও
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                পরিমান
                                                <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                            </th>
                                            <th class="cursor_n_resize">
                                                মোট
                                                <!---->
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0">
                                        <tr v-for="(item, index) in main_ledger_data['income']" :key="item.id">

                                            <td>{{ formatDate(item.date) }}</td>
                                            <td>
                                                {{ item.receipt_no ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ item.account_category?.title ?? 'N/A' }}
                                            </td>
                                            <td>{{ item.account_incomes?.folio ?? 'N/A' }}</td>
                                            <td>{{ item.amount }}</td>
                                            <td>
                                                {{ item.amount }}
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="conatiner">
                        <div class="card list_card">
                            <div class="card-header align-items-center justify-content-bitween">
                                <h5> খরচের খাতা</h5>
                                <div class="btns d-flex gap-2 ">
                                    <div class="table_actions">
                                        <a @click.prevent="" href="#" class="btn px-3 btn-outline-secondary"><i
                                                class="fa fa-list"></i></a>
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <i class="fa-regular fa-hand-point-right"></i>
                                                    Export All
                                                </a>
                                            </li>
                                            <!---->

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive card-body text-nowrap">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-light">
                                        <tr class="t-head">

                                            <th aria-label="id" class="cursor_n_resize">
                                                মাস ও তারিখ
                                                <!---->
                                            </th>
                                            <!-- <th class="cursor_n_resize">
                                                রশিদ নাম্বার
                                            </th> -->
                                            <th class="cursor_n_resize">
                                                বিবরণ
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                ফোলিও
                                                <!---->
                                            </th>
                                            <th class="cursor_n_resize">
                                                পরিমান
                                                <span><i class="fa-solid fa-arrow-up-z-a text-warning"></i></span>
                                            </th>
                                            <th class="cursor_n_resize">
                                                মোট
                                                <!---->
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0">
                                        <tr v-for="(item, index) in main_ledger_data['expense']" :key="item.id">

                                            <td>{{ new Date().toDateString(item.date) }}</td>
                                            <!-- <td>
                                                {{ item.receipt_no ?? 'N/A' }}
                                            </td> -->
                                            <td>
                                                {{ item.account_category?.title ?? 'N/A' }}
                                            </td>
                                            <td>{{ item.account_incomes?.folio ?? 'N/A' }}</td>
                                            <td>{{ item.amount }}</td>
                                            <td>
                                                {{ item.amount }}
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
import moment from 'moment';

export default {
    data: () => ({
        offset: "5",
        from_date: "",
        to_date: '',
        end_date: '',
        loaded: false,
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
            main_ledger: "main_ledger",
        }),

        SubmitHandler() {
            this.main_ledger(this.$refs.myForm)
        },

        formatDate(date) {
            let target = new Date(date).toLocaleDateString()
            const dateParts = target.split('/'); // Split the date string by '/'
            const formattedDate = `${dateParts[1].padStart(2, '0')}-${dateParts[0].padStart(2, '0')}-${dateParts[2]}`;
            return formattedDate
        }

    },
    computed: {
        ...mapState(report_setup_store, {
            main_ledger_data: "main_ledger_data",
        }),
    },


};
</script>

<style></style>
