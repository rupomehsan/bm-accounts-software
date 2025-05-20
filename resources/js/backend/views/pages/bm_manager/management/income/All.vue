<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2">
                    <div class="col-lg-6">
                        <h5 class="m-0">সকল আয়ের তালিকা</h5>
                    </div>

                    <div class="col-lg-6 text-end">
                        <span>
                            <router-link
                                :to="{ name: `${role}CreateIncome` }"
                                class="btn rounded-pill btn-outline-info"
                            >
                                <i class="fa fa-pencil me-5px"></i>
                                Create
                            </router-link>
                        </span>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <div>
                            <!-- <h6>All Branch Income</h6> -->
                            <form @submit.prevent="incomeSearchHandler">
                                <div class="d-flex gap-2">
                                    <div>
                                        <label for="">Start date</label>
                                        <date-field
                                            :label="`Start Date`"
                                            :name="`start_date`"
                                        />
                                    </div>
                                    <div>
                                        <label for="">End date</label>
                                        <date-field
                                            :label="`End Date`"
                                            :name="`end_date`"
                                        />
                                    </div>
                                    <div v-if="loaded">
                                        <label for="" class=""
                                            >Depertment</label
                                        >
                                        <select
                                            v-model="user_id"
                                            name="central_division_id"
                                            class="form-control"
                                            id=""
                                        >
                                            <option value="">
                                                Select depertment
                                            </option>
                                            <template
                                                v-for="user in all_central_division"
                                                :key="user.id"
                                            >
                                                <option :value="user.id">
                                                    {{ user.full_name }}
                                                </option>
                                            </template>
                                        </select>
                                    </div>
                                    <div v-if="loaded">
                                        <label for="" class="">Branch</label>
                                        <select
                                            v-model="user_id"
                                            name="branch_id"
                                            class="form-control"
                                            id=""
                                        >
                                            <option value="">
                                                Select branch
                                            </option>
                                            <template
                                                v-for="user in all_branch"
                                                :key="user.id"
                                            >
                                                <option :value="user.id">
                                                    {{ user.full_name }}
                                                </option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary mt-4">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex gap-2 my-3">
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
                                                    exportData(all_income.data)
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
                        <div class="d-flex gap-2 align-items-center">
                            <label for="">Sort by colum </label>
                            <div>
                                <select
                                    name=""
                                    id=""
                                    class="form-select"
                                    v-model="sort_by_col"
                                >
                                    <option value="account_receipt_book_id">
                                        রশিদ বই নং
                                    </option>
                                    <option value="account_receipt_book_no">
                                        রশিদ নং
                                    </option>
                                    <option value="account_category_id">
                                        আয়ের খাতসমূহ
                                    </option>
                                </select>
                            </div>
                            <label for="">Sort by type </label>
                            <div>
                                <select
                                    name=""
                                    id=""
                                    class="form-select"
                                    v-model="sort_by_type"
                                >
                                    <option value="asc">Assending</option>
                                    <option value="desc">Dessending</option>
                                </select>
                            </div>
                            <div class="">
                                <button
                                    class="btn btn-info"
                                    @click="
                                        set_sorting(
                                            this.sort_by_col,
                                            this.sort_by_type
                                        )
                                    "
                                >
                                    Sort
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive card-body text-nowrap">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="t-head">
                                    <!-- <th>
                                        <input type="checkbox" class="form-check-input" />
                                    </th> -->
                                    <th aria-label="id" class="cursor_n_resize">
                                        ID
                                    </th>

                                    <th class="cursor_n_resize">তারিখ</th>
                                    <th class="cursor_n_resize">রশিদ বই নং</th>
                                    <th class="cursor_n_resize">রশিদ নং</th>
                                    <th class="cursor_n_resize">আয়ের খাত</th>
                                    <th class="cursor_n_resize">
                                        আয়ের উৎসের মাধ্যম
                                    </th>
                                    <th class="cursor_n_resize">
                                        আয়ের উৎসের নাম
                                    </th>
                                    <th class="cursor_n_resize">আয়ের পরিমাণ</th>
                                    <th class="cursor_n_resize">Status</th>
                                    <th aria-label="actions">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr
                                    v-for="(item, index) in all_income.data"
                                    :key="item.id"
                                >
                                    <!-- <td>
                                        <input type="checkbox" class="form-check-input" />
                                    </td> -->
                                    <td>{{ item.id }}</td>

                                    <td>
                                        {{ item.date }}
                                    </td>
                                    <td>
                                        {{ item.receipt_book?.receipt_book_no }}
                                    </td>
                                    <td>{{ item.account_receipt_no }}</td>
                                    <td>{{ item.account_category?.title }}</td>
                                    <td>
                                        {{ item.income_source_type }}
                                    </td>
                                    <td>
                                        <template
                                            v-if="
                                                item.income_source_type ==
                                                'শাখা'
                                            "
                                        >
                                            {{ item.branch_user?.full_name }}
                                        </template>
                                        <template
                                            v-if="
                                                item.income_source_type ==
                                                'বিভাগ'
                                            "
                                        >
                                            {{
                                                item.central_division_user
                                                    ?.full_name
                                            }}
                                        </template>
                                        <template
                                            v-if="
                                                item.income_source_type ==
                                                'ব্যাক্তি/প্রতিষ্ঠান'
                                            "
                                        >
                                            {{ item.random_user }}
                                        </template>
                                    </td>

                                    <td>{{ item.amount }}</td>
                                    <td>
                                        <span
                                            class="badge bg-label-success me-1"
                                            >{{ item.status }}</span
                                        >
                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a
                                                @click.prevent=""
                                                href="#"
                                                class="btn btn-sm btn-outline-secondary"
                                                ><i class="fa fa-gears"></i
                                            ></a>
                                            <ul>
                                                <!-- <li>
                                                    <a href="">
                                                        <i
                                                            class="fa text-info fa-eye"
                                                        ></i>
                                                        Quick View
                                                    </a>
                                                </li> -->
                                                <li>
                                                    <span>
                                                        <router-link
                                                            :to="{
                                                                name: `${role}IncomeDetails`,
                                                                query: {
                                                                    id: item.id,
                                                                },
                                                            }"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-info fa-eye"
                                                            ></i>
                                                            Details
                                                        </router-link>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <router-link
                                                            :to="{
                                                                name: `${role}BalanceForm`,
                                                                query: {
                                                                    id: item.id,
                                                                },
                                                            }"
                                                            class=""
                                                        >
                                                            <i
                                                                class="fa text-warning fa-pencil"
                                                            ></i>
                                                            Balance
                                                        </router-link>
                                                    </span>
                                                </li>
                                                <!-- <li>
                                                    <span>
                                                        <a @click.prevent="
                                                            delete_branch_income(
                                                                item.id
                                                            )
                                                            " href="#" class="">
                                                            <i class="fa text-danger fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </span>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1"
                    >
                        <pagination
                            :data="all_income"
                            :method="get_all_branch_income"
                        />
                        <div class="float-right">
                            <div class="show-limit d-inline-block">
                                <span>Limit:</span>
                                <select
                                    class=""
                                    @change="set_limit($event.target.value)"
                                >
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div class="show-limit d-inline-block">
                                <span>Total:</span>
                                <span>{{ all_income.total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas_backdrop"></div>
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
import { CsvBuilder } from "filefy";
import roleSetup from "../../partials/role_setup";

export default {
    data: () => ({
        role: roleSetup.role,
        offset: "5",
        search_data: "",
        loaded: false,
        user_id: "",
        sort_by_col: "",
        sort_by_type: "",
    }),
    created: async function () {
        await this.get_all_branch_income();
        await this.get_all_central_division();
        await this.get_all_branch();

        this.loaded = true;
    },
    methods: {
        ...mapActions(income_setup_store, {
            get_all_branch_income: "all",
            delete_branch_income: "delete",
            get_all_central_division: "get_all_central_division",
            get_all_branch: "get_all_branch",
            income_search: "income_search",
            set_limit: "set_limit",
            set_sorting: "set_sorting",
        }),

        incomeSearchHandler() {
            this.income_search(event.target, this.user_id);
        },
        exportData(data = [], prefix_name = "income") {
            let dataArray = [];
            data.forEach((item) => {
                let temp = {};
                temp.date = item.date;
                temp.account_receipt_book_id = item.account_receipt_book_id;
                temp.account_category = item.account_category?.title;
                temp.account_receipt_no = item.account_receipt_no;
                temp.amount = item.amount;
                dataArray.push(temp);
            });
            let col = [
                "Date",
                "Account receipt book No",
                "Account category",
                "Account receipt no",
                "Amount",
            ];
            let values = dataArray.map((i) => Object.values(i));
            new CsvBuilder(`${prefix_name}_list.csv`)
                .setColumns(col)
                // .addRow(["Eve", "Holt"])
                .addRows(values)
                .exportFile();
        },
    },
    computed: {
        ...mapState(income_setup_store, {
            all_income: "all_data",
            all_central_division: "all_central_division",
            all_branch: "all_branch",
        }),
    },
};
</script>

<style></style>
