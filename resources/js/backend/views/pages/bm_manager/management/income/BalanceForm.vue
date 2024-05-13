<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                Balance Income
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `${role}AllIncome` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form form_1">
                                        <input type="hidden" name="random_user" value="''">
                                        <div class="form-group"><label for="">Enter amount</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="number"
                                                    name="amount" id="amount" v-model="amount"></div>

                                        </div>
                                        <div class="form-group"><label for="">Enter amount in text</label>
                                            <div class="mt-1 mb-3"><input class="form-control" type="text"
                                                    name="amount_in_text" id="amount_in_text" v-model="amount_in_text">
                                            </div>

                                        </div>
                                        <div class="form-group"><label for="">Enter
                                                comment</label><!--v-if--><!--v-if-->
                                            <div class="mt-1 mb-3"><textarea class="form-control" type="text"
                                                    name="description" v-model="description"></textarea>
                                                <div id="description"></div>
                                            </div><!--v-if--><!--v-if--><!--v-if-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";

import { income_setup_store } from "./setup/store";
import axios from 'axios';
import roleSetup from '../../partials/role_setup';

export default {
    data: () => ({
        role: roleSetup.role,
        amount: '',
        amount_in_text: '',
        description: '',
        param_id: null,
    }),

    created: async function () {


        this.param_id = this.$route.query.id;
        if (this.param_id) {
            await this.get_single_branch_income(this.param_id);
            if (this.single_data) {
                this.amount = this.single_data.amount
                this.amount_in_text = this.single_data.amount_in_text
                this.description = this.single_data.description
            }
        }
    },

    methods: {
        ...mapActions(income_setup_store, {
            get_single_branch_income: "get",
            income_update: "update",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                this.income_update($event.target, this.param_id);
                this.$router.push({ name: `${this.role}AllIncome` });
            } else {
                let response = await this.store($event.target, this.application_id);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");
                    this.$router.push({ name: `${this.role}AllIncome` });
                }
            }
        },
        async amountHandleKeyup(event) {
            const inputValue = event.target.value;
            try {
                const result = await axios.get(`get-amount-to-number/${inputValue}`);
                if (result.data) {
                    let toText = document.getElementById('amount_in_text');
                    toText.value = result.data.toString(); // Use toString() method
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },

    },

    computed: {
        ...mapState(income_setup_store, {
            single_data: "single_data",
        }),
    },

    mounted() {
        const amount = document.getElementById('amount');
        if (amount) {
            amount.addEventListener('keyup', this.amountHandleKeyup);
        }
    },


};
</script>

<style></style>
