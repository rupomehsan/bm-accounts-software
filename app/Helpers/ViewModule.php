<?php

use Illuminate\Support\Str;

if (!function_exists('viewAll')) {
    function viewAll($moduleName, $fields)
    {

        $moduleName = Str::singular((Str::snake($moduleName)));
        $content = <<<"EOD"
                    <template>
                    <div class="page-body">
                    <div class="pt-2">
                        <div class="page-header my-2">
                            <div class="row align-items-center rounded-2 justify-content-between">
                                <div class="col-lg-4">
                                    <h5 class="m-0 text-capitalize">
                                    {{ page_title }}
                                    </h5>
                                </div>
                                <div v-if="child_items.length" class="btn-group m-1 col-lg-4"
                                     onclick="document.getElementById('table-actions').classList.toggle('show')">
                                    <button type="button" class="btn btn-light waves-effect waves-light">Actions</button>
                                    <button type="button"
                                        class="btn btn-light split-btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" style="" id="table-actions">
                                        <a href="javaScript:void();" class="dropdown-item" @click="bulkActions('delete')">Delete</a>
                                        <a href="javaScript:void();" class="dropdown-item" @click="bulkActions('active')">Active</a>
                                        <a href="javaScript:void();" class="dropdown-item"
                                            @click="bulkActions('inactive')">Inactive</a>

                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <span>
                                        <router-link :to="{ name: `Create\${route_prefix}` }" class="btn rounded-pill btn-outline-info">
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
                                                <!-- <th>
                                                    <input type="checkbox" class="form-check-input" />
                                                </th> -->
                                                <th aria-label="id" class="cursor_n_resize">
                                                    ID

                                                </th>
            EOD;
        if (count($fields)) {
            foreach ($fields as $fieldName) {
                $label = Str::of($fieldName[0])->snake()->replace('_', ' ');
                $content .=  "<th class='cursor_n_resize'>   $label </th> \n";
            }
        }
        $content .= <<<"EOD"
                                                 <th class="cursor_n_resize">
                                                status

                                                </th>
                                                <th aria-label="actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody class="table-border-bottom-0" v-if="loaded">
                                            <tr v-for="(item, index) in all_data.data" :key="index">
                                                <!-- <td>
                                                    <input type="checkbox" class="form-check-input" />
                                                </td> -->
                                                <td>{{ item.id }}</td>
            EOD;
        if (count($fields)) {
            foreach ($fields as $fieldName) {

                $content .=  "<th class='cursor_n_resize'> {{ item.$fieldName[0]}} </th> \n";
            }
        }
        $content .= <<<"EOD"
                                                <td>
                                                    {{ item.status }}
                                                </td>
                                                <td>
                                                    <div class="table_actions">
                                                        <a @click.prevent="" href="#" class="btn btn-sm btn-outline-secondary"><i
                                                                class="fa fa-gears"></i></a>
                                                        <ul>
                                                            <!-- <li>
                                                                <a href="">
                                                                    <i
                                                                        class="fa text-info fa-eye"
                                                                    ></i>
                                                                    Quick View
                                                                </a>
                                                            </li> -->
                                                            <!-- <li>
                                                                <span>
                                                                    <a
                                                                        href="#/user/details/43"
                                                                        class=""
                                                                    >
                                                                        <i
                                                                            class="fa text-secondary fa-eye"
                                                                        ></i>
                                                                        Details
                                                                    </a>

                                                                </span>
                                                            </li> -->
                                                            <li>
                                                                <span>
                                                                    <router-link :to="{
                                                                        name: `Create\${route_prefix}`,
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
                                                                        delete_data(
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
                                <div class="card-footer py-1 border-top-0 d-flex justify-content-between border border-1">
                                    <pagination :data="all_data" :method="get_all_data" />
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
                                            <span>{{ all_data.total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    </template>

                    <script>
                    import { mapActions, mapState } from 'pinia'
                    import { {$moduleName}_setup_store } from './setup/store';
                    import setup from "./setup";
                    export default {
                        data: () => ({
                            route_prefix: '',
                            page_title: '',
                            parent_item: false,
                            offset:5,
                            loaded:false,
                            search_data:'',
                            child_items: []
                        }),
                        created: async function () {
                            this.route_prefix = setup.route_prefix;
                            this.page_title = setup.page_title;
                            await this.get_all_data()
                            this.loaded = true
                        },
                        methods: {
                            ...mapActions({$moduleName}_setup_store, {
                                get_all_data: 'all',
                                delete_data: 'delete',
                                bulk_action: 'bulk_action',
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
                            }

                        },
                        computed: {
                            ...mapState({$moduleName}_setup_store, {
                                all_data: 'all_data',
                            })
                        }
                    }
                    </script>

                    <style></style>

        EOD;

        return $content;
    }
}


if (!function_exists('viewForm')) {
    function viewForm($moduleName)
    {

        $moduleName = Str::singular((Str::snake($moduleName)));
        $content = <<<"EOD"
                    <template>

                    <div class="page-body">
                    <div class="py-2">
                        <div class="container-fluid">
                            <div class="page-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6>
                                            {{ param_id ? 'Update' : 'Create' }} new <span class="text-lowercase">
                                            {{ route_prefix}}</span>
                                        </h6>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <div class="btns">
                                            <router-link :to="{ name: `All\${route_prefix}` }"
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
                                            <template v-for="(
                                                    form_field, index
                                                ) in form_fields" :key="index">
                                                <common-input :label="form_field.label" :onchange="getRespose"
                                                    :type="form_field.type" :name="form_field.name"
                                                    :multiple="form_field.multiple" :value="form_field.value" :data_list="form_field.data_list
                                                        " />
                                            </template>
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
                import { mapActions, mapState } from 'pinia'
                import { {$moduleName}_setup_store } from './setup/store';
                import setup from "./setup";
                import form_fields from "./setup/form_fields";

                export default {
                    data: () => ({
                        route_prefix: '',
                        form_fields,
                        param_id: null,
                    }),
                    created: async function () {
                        let id = this.\$route.query.id;
                        this.route_prefix = setup.route_prefix;
                        await this.get_all_data()
                        if (id) {
                            this.param_id = id;
                            await this.get_single_data(id);
                            if (this.single_data) {
                                this.form_fields.forEach((field, index) => {
                                    Object.entries(this.single_data).forEach((value) => {
                                        if (field.name == value[0]) {
                                            this.form_fields[index].value = value[1];
                                        }


                                    });
                                });
                            }
                        } else {
                            this.form_fields.forEach((item) => {
                                item.value = "";
                            });
                        }
                    },
                    methods: {
                        ...mapActions({$moduleName}_setup_store, {
                            get_all_data: 'all',
                            get_single_data: 'get',
                            store_data: 'store',
                            update_data: 'update',
                        }),

                        submitHandler: async function (\$event) {
                            if (this.param_id) {
                                let response = await this.update_data(\$event.target, this.param_id);
                                if (response.data.status === "success") {
                                    window.s_alert(response.data.message);
                                    this.\$router.push({ name: `All\${this . route_prefix}` });
                                }
                            } else {
                                let response = await this.store_data(\$event.target);
                                if (response.data.status === "success") {
                                    window.s_alert(response.data.message);
                                    this.\$router.push({ name: `All\${this . route_prefix}` });
                                }
                            }
                        },


                    },

                    computed: {
                        ...mapState({$moduleName}_setup_store, {
                            single_data: "single_data",
                            all_data: 'all_data',
                        }),
                    },


                }
                </script>
        EOD;

        return $content;
    }
}


if (!function_exists('ViewFormField')) {
    function ViewFormField($moduleName, $fields)
    {

        $content = <<<EOD
        export default [
        EOD;

        if (count($fields)) {
            foreach ($fields as $fieldName) {
                // dd($fieldName);
                $label = Str::of($fieldName[0])->snake()->replace('_', ' ');
                $content .= "\n\t{\n";
                $content .= "\t\tname: \"$fieldName[0]\",\n";
                $content .= "\t\tlabel: \"Enter your $label\",\n";

                if (count($fieldName) > 1) {
                    $type = $fieldName[1];
                    switch ($type) {
                        case 'longtext':
                            $content .= "\t\ttype: \"textarea\",\n";
                            break;
                        case 'date':
                            $content .= "\t\ttype: \"date\",\n";
                            break;
                        case 'number':
                        case 'integer':
                            $content .= "\t\ttype: \"number\",\n";
                            break;
                        case 'file':
                            $content .= "\t\ttype: \"file\",\n";
                            $content .= "\t\tmultiple: \"false\",\n";
                            break;
                        case 'select':
                        case 'boolean':
                        case 'tinyint':
                            $content .= "\t\ttype: \"select\",\n";
                            $content .= "\t\tlabel: \"Select default  $label\",\n";
                            $content .= "\t\tmultiple: false,\n";
                            $content .= "\t\tdata_list: [\n";
                            $content .= "\t\t\t{\n";
                            $content .= "\t\t\t\tlabel: \"Active\",\n";
                            $content .= "\t\t\t\tvalue: \"active\",\n";
                            $content .= "\t\t\t},\n";
                            $content .= "\t\t\t{\n";
                            $content .= "\t\t\t\tlabel: \"Inactive\",\n";
                            $content .= "\t\t\t\tvalue: \"inactive\",\n";
                            $content .= "\t\t\t},\n";
                            $content .= "\t\t],\n";
                            break;
                        case 'password':
                            $content .= "\t\ttype: \"password\",\n";
                            break;
                        default:
                            $content .= "\t\ttype: \"text\",\n";
                    }
                } else {
                    $content .= "\t\ttype: \"text\",\n";
                }
                $content .= "\t\tvalue: \"\",\n";
                $content .= "\t},\n";
            }
        }

        $content .= "];\n";


        return $content;
    }
}

if (!function_exists('ViewIndex')) {
    function ViewIndex($moduleName)
    {
        $prefix = Str::singular((ucfirst($moduleName)));
        $title =  preg_replace('/([a-z])([A-Z])/', '$1 $2', $prefix);
        $content = <<<"EOD"
        let setup = {
            page_title: `{$title} Management`,
            route_prefix: `{$prefix}`,
        }
        export default setup;
        EOD;
        return $content;
    }
}

if (!function_exists('ViewLayout')) {
    function ViewLayout($module)
    {
        $content = <<<"EOD"
        <template>
            <router-view></router-view>
        </template>

        <script>
        import setup from ".";

        let page_title = setup.page_title;
        export default {
            data: () => ({
                page_title,
            })
        }
        </script>

        <style></style>

        EOD;

        return $content;
    }
}

if (!function_exists('ViewRoute')) {
    function ViewRoute($moduleName)
    {


        $moduleName = Str::singular((Str::kebab($moduleName)));

        $content = <<<"EOD"
        import setup from ".";
        import All from "../All.vue";
        import Form from "../Form.vue";
        import Layout from "./Layout.vue";

        let route_prefix = setup.route_prefix;

        const routes =
        {
            path: '{$moduleName}',
            component: Layout,
            children: [
                {
                    path: '',
                    name: "All" + route_prefix,
                    component: All,
                },
                {
                    path: "create",
                    name: "Create" + route_prefix,
                    component: Form,
                },

            ]
        };


        export default routes;

        EOD;

        return $content;
    }
}

if (!function_exists('ViewStore')) {
    function ViewStore($moduleName)
    {
        $apiName = Str::plural((Str::kebab($moduleName)));
        $store = Str::singular((Str::snake($moduleName)));
        $content = <<<"EOD"
        import { defineStore } from "pinia";

        export const {$store}_setup_store = defineStore("{$store}_setup_store", {
            state: () => ({
                all_data: {},
                single_data: {},
                role_data: {},
                api:"{$apiName}"
            }),
            getters: {
                doubleCount: (state) => state.count * 2,
            },
            actions: {

                all: async function (url) {
                    let response;
                    if (url) {
                        response = await axios.get(url);
                    } else {
                        response = await axios.get(this.api);
                    }
                    this.all_data = response.data.data;
                },

                get: async function (id) {
                    let response = await axios.get(`\${this.api}/\${id}`);
                    response = response.data.data;
                    this.single_data = response;
                },

                store: async function (form) {
                    let formData = new FormData(form);
                    let response = await axios.post(this.api, formData);
                    return response;
                },

                update: async function (form, id) {
                    let formData = new FormData(form);
                    let response = await axios.post(`\${this.api}/\${id}?_method=PATCH`, formData);
                    return response;
                },

                delete: async function (id) {
                    var data = await window.s_confirm();
                    if (data) {
                        let response = await axios.delete(`\${this.api}/\${id}`);
                        window.s_alert("Data deleted");
                        this.all();
                        console.log(response.data);
                    }
                },
                bulk_action: async function (action, data) {
                    let response = await axios.post(`\${this.api}/bulk-action`, { action, data })
                    if (response.data.status === "success") {
                        window.s_alert(response.data.message);
                        this.all();
                    }
                },

                // additional function
                // additional function


            },
        });

        EOD;

        return $content;
    }
}
