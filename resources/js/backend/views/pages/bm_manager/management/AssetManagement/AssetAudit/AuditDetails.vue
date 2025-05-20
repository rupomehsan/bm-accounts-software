<template>
    <div class="page-body">
        <div>
            <div class="page-header my-2">
                <div class="row align-items-center rounded-2 justify-content-between">
                    <div class="col-lg-4">
                        <h5 class="m-0 text-capitalize"> Asset Details</h5>
                    </div>

                    <div class="col-lg-6 text-end ">
                        <span>
                            <button @click="get_asset_by_audit('audit_asset')" type="button"
                                class="btn rounded-pill btn-outline-info">
                                <i class="fa fa-pencil me-5px"></i>
                                Audited assets
                            </button>
                        </span>
                        <span class="mx-2">
                            <button @click="get_asset_by_audit('not_audit_asset')" type="button"
                                class="btn rounded-pill btn-outline-info">
                                <i class="fa fa-pencil me-5px"></i>
                                Not audited assets
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="conatiner">
                <div class="card">
                    <div class="card-body">
                        <h5> {{ single_audit_data.title }} </h5>
                        <p> Total Assets: {{ all_asset_data.totalAssets }}</p>
                        <p> Audited Assets: {{ all_asset_data.totalAudited }}</p>
                    </div>
                </div>
                <div class="card list_card">
                    <div class="card-header align-items-center">


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
                                    <th class="cursor_n_resize">
                                        Title

                                    </th>
                                    <th class="cursor_n_resize">
                                        Price

                                    </th>
                                    <th class="cursor_n_resize">
                                        Create Date

                                    </th>

                                    <th class="cursor_n_resize">
                                        Is ok ?
                                    </th>
                                    <th aria-label="actions">{{ audit_status == 'yes' ? 'Actions' : 'Comments' }}</th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" v-if="loaded">
                                <tr v-for="(item, index) in all_asset_data.data?.data" :key="item.id">
                                    <!-- <td>
                                            <input type="checkbox" class="form-check-input" />
                                        </td> -->
                                    <td>{{ item.id }}</td>
                                    <td>
                                        {{ item.title }}
                                    </td>
                                    <td>
                                        {{ item.price }}
                                    </td>
                                    <td>
                                        {{ new Date(item.created_at).toLocaleDateString() }}
                                    </td>

                                    <td>
                                        {{ item.asset_audit_list?.is_ok ?? "N/A" }}
                                    </td>
                                    <td>
                                        <div v-if="audit_status == 'yes'">
                                            <button class="btn btn-sm btn-success"
                                                @click="updateStatus({ asset_id: item.id, asset_audit_id: asset_audit_id, is_ok: 'yes' })">Ok</button>
                                            <button class="btn btn-sm btn-danger mx-2"
                                                @click="updateStatus({ asset_id: item.id, asset_audit_id: asset_audit_id, is_ok: 'no' })">Not
                                                oK</button>
                                        </div>
                                        <div v-else>{{ item.asset_audit_list?.comment }}</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1">
                        <pagination :data="all_asset_data?.data" :method="get_all_data" />
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
                                <span>{{ all_asset_data.total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :class="modalShow ? 'show d-block' : ''" class="modal fade ">
            <div class="modal-dialog">
                <form @submit.prevent="auditCommentForm">
                    <input type="hidden" name="asset_audit_id" v-model="asset_audit_id">
                    <input type="hidden" name="asset_id" v-model="asset_id">
                    <input type="hidden" name="is_ok" v-model="is_ok">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Audit commnets</h5>
                            <button @click="modalShow = !modalShow" type="button" class="btn-close"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click="modalShow = !modalShow" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</template>

<script>
import { mapActions, mapState } from 'pinia'
import { asset_audit_setup_store } from './setup/store';
import setup from "./setup";
export default {
    data: () => ({
        route_prefix: '',
        page_title: '',
        parent_item: false,
        offset: 5,
        loaded: false,
        search_data: '',
        child_items: [],
        asset_audit_id: '',
        audit_status: 'yes',
        modalShow: false,
        is_ok: '',
        asset_id: '',
    }),
    created: async function () {
        this.route_prefix = setup.route_prefix;
        this.page_title = setup.page_title;
        this.asset_audit_id = this.$route.query.id
        await this.get_all_assets(this.asset_audit_id)
        await this.get_single_audit(this.$route.query.id)
        this.loaded = true
    },
    methods: {
        ...mapActions(asset_audit_setup_store, {
            get_all_assets: 'get_all_assets',
            get_all_audited_assets: 'get_all_audited_assets',
            get_single_audit: 'get_single_audit',
            asset_audit_update_status: 'asset_audit_update_status',
        }),
        toggleParentCheckbox() {
            this.child_items = event.target.checked ? this.all_data.data.map(item => item.id) : []
        },

        toggleChildCheckbox(id) {
            let isChecked = event.target.checked
            if (isChecked) {
                this.child_items.push(id)
            } else {
                this.child_items = this.child_items.filter(item => item != id)
            }
        },
        bulkActions(action) {
            this.bulk_action(action, this.child_items)
            this.parent_item = false
            this.child_items = []
        },

        async updateStatus(data) {
            this.modalShow = true
            this.is_ok = data.is_ok
            this.asset_id = data.asset_id
        },


        auditCommentForm: async function ($event) {
            let response = await this.asset_audit_update_status($event.target)
            if (response.data.status === "success") {
                window.s_alert(response.data.message);
                this.modalShow = false
                await this.get_all_assets(this.asset_audit_id)
                // this.$router.push({ name: `All${this.route_prefix}` });
            }
        },

        get_asset_by_audit(type) {
            if (type == 'audit_asset') {
                this.audit_status = 'no'
                this.get_all_audited_assets(this.asset_audit_id)
            } else {
                this.audit_status = 'yes'
                this.get_all_assets(this.asset_audit_id)
            }
        }

    },
    computed: {
        ...mapState(asset_audit_setup_store, {
            all_asset_data: 'all_asset_data',
            all_audited_asset_data: 'all_audited_asset_data',
            single_audit_data: 'single_audit_data',
        })
    }
}
</script>

<style></style>
