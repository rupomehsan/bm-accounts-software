<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div
                    class="row align-items-center justify-content-between rounded-2"
                >
                    <div class="col-lg-4">
                        <div class="d-flex gap-3">
                            <h5 class="m-0">BM at a glance</h5>
                            <h5 class="fw-bold">Total - {{ income_total }}</h5>
                        </div>
                    </div>

                    <div class="col-lg-3" v-if="loded">
                        <select
                            name=""
                            id=""
                            class="form-select"
                            v-model="account_category_id"
                            @change="getAllIncomeByCategoryID"
                        >
                            <option value="">Select category</option>
                            <option
                                v-for="category in all_account_categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.title }}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select
                            name=""
                            id=""
                            class="form-select"
                            v-model="page"
                        >
                            <option value="">Goto page</option>
                            <option value="IncomeLedger">
                                আয়ের লেজার/খতিয়ান
                            </option>
                            <option value="ExpenseLedger">
                                ব্যয়ের লেজার/খতিয়ান
                            </option>
                            <option value="LoanRegister">ঋণ রেজিস্টার</option>
                            <option value="Jamanot">জামানত</option>
                            <option value="Salary">বেতন</option>
                            <option value="OfficeRent">অফিস ভাড়া</option>
                            <option value="HouseRent">বাসা ভাড়া</option>
                            <option value="AssetList">সম্পদ তালিকা</option>
                            <option value="BMStockRegister">
                                বিএম স্টক রেজিস্টার
                            </option>
                            <option value="AssetRegister">
                                সম্পদ রেজিস্টার
                            </option>
                            <option value="EkkalinProdan">
                                এককালীন প্রদান
                            </option>
                            <option value="NiyomitoProdan">
                                নিয়মিত প্রদান
                            </option>
                            <option value="KendriyoSuvakankhiThekeAy">
                                কেন্দ্রীয় শুভাকাঙ্খী থেকে আয়
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            জমার খাতা

                        </h6>
                        <div class="search">
                            <form action="#">
                                <input
                                    v-model.debounce:1000ms="search_data"
                                    placeholder="search..."
                                    type="search"
                                    class="form-control border border-info"
                                />
                            </form>
                        </div>
                        <div>
                            <form @submit.prevent="submitHandler">
                                <input
                                    type="hidden"
                                    name="category_id"
                                    v-model="account_category_id"
                                />
                                <div class="d-flex gap-2 align-items-center">
                                    <div
                                        class="form-group d-flex align-items-center gap-2"
                                    >
                                        <label for="">From</label>
                                        <input
                                            name="start_date"
                                            class="form-control"
                                            type="date"
                                        />
                                    </div>
                                    <div
                                        class="form-group d-flex align-items-center gap-2"
                                    >
                                        <label for="">To</label>
                                        <input
                                            name="end_date"
                                            class="form-control"
                                            type="date"
                                        />
                                    </div>
                                    <button class="btn btn-dark btn-sm p-2">
                                        <i
                                            type="submit"
                                            class="fa fa-search-plus"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
                            <router-link
                                :to="{ name: 'Expense' }"
                                class="btn btn-info"
                                >খরচের খাতা</router-link
                            >
                            <div class="table_actions">
                                <a
                                    @click.prevent=""
                                    href="#"
                                    class="btn px-3 btn-outline-secondary"
                                    ><i class="fa fa-list"></i
                                ></a>
                                <ul>
                                    <li>
                                        <a href="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Export All
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#/user/import" class="">
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Import
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            title="display data that has been deactivated"
                                            class="d-flex"
                                        >
                                            <i
                                                class="fa-regular fa-hand-point-right"
                                            ></i>
                                            Deactivated data
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <th aria-label="id" class="cursor_n_resize">
                                        ক্রম
                                    </th>
                                    <th class="cursor_n_resize">মাস ও তারিখ</th>
                                    <th class="cursor_n_resize">
                                        রশিদ নাম্বার
                                    </th>
                                    <th class="cursor_n_resize">বিবরণ</th>
                                    <th class="cursor_n_resize">ফোলিও</th>
                                    <th class="cursor_n_resize">পরিমান</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loded">
                                <tr
                                    v-for="item in all_incomes.data"
                                    :key="item.id"
                                >
                                    <td>{{ item.id }}</td>

                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{
                                                new Date(
                                                    item.created_at
                                                ).toDateString()
                                            }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-warning cursor_pointer"
                                        >
                                            {{ item.receipt_no ?? "" }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ item.description }}
                                    </td>

                                    <td>
                                        {{
                                            item.account_incomes
                                                ?.account_receipt_no
                                        }}
                                    </td>
                                    <td>
                                        {{ item.amount }}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end">Total</td>
                                    <th class="text-center">
                                        {{
                                            all_incomes.data?.reduce(
                                                (t, i) => (t += i.amount),
                                                0
                                            )
                                        }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1"
                    >
                        <pagination
                            :data="all_incomes"
                            :method="get_all_incomes"
                        />
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select class="" v-model="offset">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block">
                                <span>Total:</span>
                                <span>{{ all_incomes.total }}</span>
                            </div>
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
import { income_setup_store } from "./setup/store";

export default {
    data: () => ({
        offset: "5",
        search_data: "",
        page: "",
        account_category_id: "",
        loded: false,
    }),
    created: async function () {
        await this.get_all_incomes();
        await this.get_all_incomes_total(this.account_category_id);
        await this.get_all_account_categories();
        this.loded = true;

        // console.log("all_incomes", this.all_incomes);
    },
    methods: {
        ...mapActions(income_setup_store, {
            get_all_incomes: "all",
            get_all_incomes_total: "get_all_incomes_total",
            user_delete: "delete",
            get_all_account_categories: "get_all_account_categories",
            get_all_income_by_category_id: "get_all_income_by_category_id",
            get_data_by_datewise: "get_all_income_by_datewise",
        }),

        gotoPage(e) {
            console.log(e.target.value);
        },

        getAllIncomeByCategoryID() {
            this.get_all_income_by_category_id(this.account_category_id);
            this.get_all_incomes_total(this.account_category_id);
        },

        submitHandler: async function ($event) {
            this.get_data_by_datewise($event.target);
        },
    },
    computed: {
        ...mapState(income_setup_store, {
            all_incomes: "all_data",
            all_account_categories: "all_account_categories",
            income_total: "income_total",
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
            this.$router.push({ name: this.page });
        },
    },
};
</script>

<style></style>
