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
            <div class="conatiner">
                <div class="card list_card">
                    <div class="card-header align-items-center">
                        <h6>
                            সম্পদ তালিকা

                        </h6>
                        <div class="search">
                            <form action="#">
                                <input v-model.debounce:1000ms="search_data" placeholder="search..." type="search"
                                    class="form-control border border-info" />
                            </form>
                        </div>
                        <div class="btns d-flex gap-2 align-items-center">
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

                                    <li>
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
                                    <th class="cursor_n_resize">
                                        বিবরণ
                                    </th>
                                    <th class="cursor_n_resize">
                                        সংখ্যা
                                    </th>
                                    <th class="cursor_n_resize">
                                        ক্রয়মুল্য
                                    </th>
                                    <th class="cursor_n_resize">
                                        বর্তমান মুল্য
                                    </th>
                                    <th class="cursor_n_resize">
                                        ব্যবহারকারী
                                    </th>
                                    <th class="cursor_n_resize">
                                        মন্তব্য
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(item, index) in []" :key="item.id">

                                    <td>{{ index + 1 }}</td>

                                    <td>
                                        <span class="text-warning cursor_pointer">
                                            {{ new Date(item.created_at).toDateString() }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-warning cursor_pointer">
                                            {{ item.account_logs.receipt_no }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ item.account_logs.description }}
                                    </td>

                                    <td>
                                        {{ item.account_logs.amount }}
                                    </td>
                                    <td>
                                        <div class="table_actions">
                                            <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-gears"></i></a>
                                            <ul>

                                                <li>
                                                    <span>
                                                        <router-link :to="{ name: 'Show', params: { id: item.id } }"
                                                            title="disapproved"><i class="fa text-secondary fa-eye"></i>
                                                            Details </router-link>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <router-link :to="{
                                                            name: 'Create',
                                                            query: {
                                                                id: item.id,
                                                            },
                                                        }" class="">
                                                            <i class="fa text-warning fa-pencil"></i>
                                                            Edit
                                                        </router-link>

                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <a @click.prevent="
                                                            user_delete(
                                                                item.id
                                                            )
                                                            " href="#" class="">
                                                            <i class="fa text-danger fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="card-footer py-1 border-top-0 d-flex justify-content-between align-items-center border border-1">
                        <pagination :data="all_incomes" :method="get_all_incomes" />
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
        page: ""
    }),
    created: async function () {
        await this.get_all_incomes();
    },
    methods: {
        ...mapActions(income_setup_store, {
            get_all_incomes: "all",
            user_delete: "delete",
        }),
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
