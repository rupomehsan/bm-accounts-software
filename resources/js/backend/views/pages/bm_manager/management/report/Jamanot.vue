<template>
    <div class="page-body">
        <div class="pt-2">
            <div class="page-header my-2">
                <div class="row align-items-center justify-content-between rounded-2">
                    <div class="col-lg-3">
                        <h5 class="m-0"> জামানত</h5>
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
                                        বিষয়
                                    </th>
                                    <th class="cursor_n_resize">
                                        মাধ্যম
                                    </th>
                                    <th class="cursor_n_resize">
                                        মাধ্যমের পরিচয়
                                    </th>
                                    <th class="cursor_n_resize">
                                        পরিমান
                                    </th>
                                    <th class="cursor_n_resize">
                                        ফেরত-সম্ভাব্য তাং
                                    </th>
                                    <th class="cursor_n_resize">
                                        ফেরত তারিখ
                                    </th>
                                    <th class="cursor_n_resize">
                                        ফেরত-পরিমান
                                    </th>
                                    <th class="cursor_n_resize">
                                        বকেয়া
                                    </th>
                                    <th class="cursor_n_resize">
                                        মন্তব্য
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0">
                                <tr v-for="(item, index) in all_jamanot_register_data" :key="index">

                                    <td>{{ item.id }}</td>

                                    <td>
                                        {{ item.subject }}
                                        <!-- <span class="text-warning cursor_pointer">
                                            {{ new Date(item.created_at).toDateString() }}
                                        </span> -->
                                    </td>
                                    <td>
                                        {{ item.medium }}
                                    </td>

                                    <td>
                                        {{ item.medium_identity }}
                                    </td>
                                    <td>
                                        {{ item.amount }}
                                    </td>

                                    <td>
                                        {{ item.given_date }}
                                    </td>
                                    <td>
                                        {{ item.jamanot_payment?.given_date ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ item.jamanot_payment?.amount }}
                                    </td>
                                    <td>
                                        {{ item.jamanot_payment?.due }}
                                    </td>
                                    <td>
                                        {{ item.jamanot_payment?.description }}
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
            get_all_jamanot_register: "get_all_jamanot_register",
        }),
        async SubmitHandler() {
            await this.get_all_jamanot_register(this.$refs.myForm);
        },

    },
    computed: {
        ...mapState(report_setup_store, {
            all_jamanot_register_data: "all_jamanot_register_data",
        }),
    },

};
</script>

<style></style>
