<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">Income & Expense</h5>
                    </div>
                    <div class="col-lg-6 text-end"></div>
                </div>
            </div>
            <div class="container">
                <div class="accounts_at_a_glance custom_scroll">
                    <table class="table table-bordered text-white">
                        <tbody>
                            <tr>
                                <td colspan="4">
                                    <h4 class="text-center">আয় ব্যয় হিসাব</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>মাসের নাম</td>
                                <td colspan="2" class="text-center">
                                    {{ data.date_title }}
                                </td>
                                <td class="text-end">সাল</td>
                            </tr>
                            <tr>
                                <td>তারিখ</td>
                                <td colspan="2" class="text-center">
                                    <input
                                        type="date"
                                        v-model="from_date"
                                        class="income_expense_date_field"
                                        @click="$event.target.showPicker()"
                                    />
                                    To
                                    <input
                                        type="date"
                                        v-model="to_date"
                                        class="income_expense_date_field"
                                        @click="$event.target.showPicker()"
                                    />
                                </td>
                                <td class="text-end">২০২৩</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">আয়</td>
                                <td colspan="2" class="text-center">ব্যয়</td>
                            </tr>
                            <tr class="row_sticky">
                                <td>বিবরণ</td>
                                <td>পরিমান</td>
                                <td>বিবরণ</td>
                                <td>পরিমান</td>
                            </tr>
                            <template v-if="data.data?.length">
                                <tr
                                    v-for="i in data.data[1]?.categories.length"
                                    :key="i"
                                >
                                    <template
                                        v-if="data.data[0].categories[i - 1]"
                                    >
                                        <td>
                                            {{
                                                data.data[0].categories[i - 1]
                                                    .title
                                            }}
                                        </td>
                                        <td>
                                            <span
                                                v-if="
                                                    data.data[0].categories[
                                                        i - 1
                                                    ].logs_sum_total
                                                "
                                            >
                                                {{
                                                    data.data[0].categories[
                                                        i - 1
                                                    ].logs_sum_total
                                                        ?.toString()
                                                        .enToBn()
                                                }}
                                            </span>
                                        </td>
                                    </template>
                                    <template v-else>
                                        <td></td>
                                        <td></td>
                                    </template>
                                    <template
                                        v-if="data.data[1].categories[i - 1]"
                                    >
                                        <td>
                                            {{
                                                data.data[1].categories[i - 1]
                                                    .title
                                            }}
                                        </td>
                                        <td>
                                            <span
                                                v-if="
                                                    data.data[1].categories[
                                                        i - 1
                                                    ].logs_sum_total
                                                "
                                            >
                                                {{
                                                    data.data[1].categories[
                                                        i - 1
                                                    ].logs_sum_total
                                                        ?.toString()
                                                        .enToBn()
                                                }}
                                            </span>
                                        </td>
                                    </template>
                                    <template v-else>
                                        <td></td>
                                        <td></td>
                                    </template>
                                </tr>
                            </template>

                            <tr>
                                <td colspan="3" class="text-end">মোট আয়</td>
                                <td>{{ data.total_income }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">মোট ব্যয়</td>
                                <td>{{ data.total_expense ?? 0 }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">উদ্ধৃত্ত</td>
                                <td>
                                    {{
                                        (data.total_income - data.total_expense)
                                            .toString()
                                            .enToBn()
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">
                                    বিগত উদ্ধৃত্ত
                                </td>
                                <td>
                                    {{
                                        data.get_previous_extra_money
                                            ?.toString()
                                            .enToBn()
                                    }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">
                                    বর্তমান উদ্ধৃত্ত
                                </td>
                                <td>
                                    {{
                                        (
                                            data.get_previous_extra_money +
                                            (get_sum(data[0]).en -
                                                get_sum(data[1]).en)
                                        )
                                            .toString()
                                            .enToBn()
                                    }}
                                </td>
                            </tr>
                            <tr class="footer_fixed" v-if="data.length">
                                <td>মোট আয়</td>
                                <td>{{ get_sum(data[0]).bn }}</td>
                                <td>মোট ব্যয়</td>
                                <td>{{ get_sum(data[1]).bn }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import { income_expense_setup_store } from "./setup/store";

export default {
    data: () => ({
        from_date: "",
        to_date: "",
    }),
    created: async function () {
        this.from_date = moment().startOf("month").format("YYYY-MM-DD");
        this.to_date = moment().format("YYYY-MM-DD");
        await this.get_all_income_expense_report(this.from_date, this.to_date);
        // this.date_title = moment(this.data.date_title).format('MMM DD - ');
        console.log("newdata", this.data);
    },
    methods: {
        ...mapActions(income_expense_setup_store, {
            get_all_income_expense_report: "get_all_income_expense_report",
        }),
        get_sum: function (array) {
            if (!array?.categories) {
                return {
                    bn: 0,
                    en: 0,
                };
            }
            let sum = array.categories.reduce(
                (t, i) => (t += +i.logs_sum_total),
                0
            );
            return {
                bn: sum.toString().enToBn(),
                en: sum,
            };
        },
    },
    computed: {
        ...mapState(income_expense_setup_store, {
            data: "income_expense",
        }),
    },

    watch: {
        from_date: async function () {
            await this.get_all_income_expense_report(
                this.from_date,
                this.to_date
            );
        },
        to_date: async function () {
            await this.get_all_income_expense_report(
                this.from_date,
                this.to_date
            );
        },
    },
};
</script>

<style></style>
