import "./bootstrap";
import "./plugins/enToBn.js";
import "./plugins/axios_setup.js";
import "./plugins/sweet_alert.js";
import "./plugins/moment_setup";
import "./plugins/number_format.js";
import "./plugins/number_to_text_bangla.js";
import "./store/role.js";

import { createApp } from "vue";
import { createRouter, createWebHashHistory } from "vue-router";
import { createPinia } from "pinia";


import CommonInput from "./views/components/CommonInput.vue";
import ImageComponent from "../backend/views/components/ImageComponent.vue";
import Pagination from "../backend/views/components/Pagination.vue";
import DynamicSelect from "../backend/views/components/DynamicSelect.vue";
import DateField from "../backend/views/components/DateField.vue";

import App from "./views/App.vue";
import MainDashboard from "./views/MainDashboard.vue";
import admin_routes from "./views/pages/admin/partials/routes";
import bm_manager_routes from "./views/pages/bm_manager/partials/routes";
import cp_route from "./views/pages/cp/partials/routes";
import super_admin_route from "./views/pages/super_admin/partials/routes";
import bm_support_manager_route from "./views/pages/bm_support_manager/partials/routes";
import sg_route from "./views/pages/sg/partials/routes";
import branch_route from "./views/pages/branch/partials/routes";
import division_admin_route from "./views/pages/division_admin/partials/routes";
import division_employee_route from "./views/pages/division_employee/partials/routes";
import division_support_admin_route from "./views/pages/division_support_admin/partials/routes";
import division_without_audit_route from "./views/pages/division_without_audit/partials/routes";
import well_wisher_route from "./views/pages/well_wisher/partials/routes";
import auditor_route from "./views/pages/auditor/partials/routes";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: "/",
            component: App,
            children: [
                {
                    path: "",
                    component: MainDashboard,
                },
                admin_routes,
                super_admin_route,
                bm_manager_routes,
                bm_support_manager_route,
                cp_route,
                sg_route,
                branch_route,
                division_admin_route,
                division_employee_route,
                division_support_admin_route,
                division_without_audit_route,
                well_wisher_route,
                auditor_route,
            ],
        },
    ],
});

router.beforeEach((to, from, next) => {
    to.href.length > 2 && window.sessionStorage.setItem("prevurl", to.href);
    next();
});


const pinia = createPinia();
const app = createApp({});
// Vue.prototype.number_format = (number = 0) => new Intl.NumberFormat().format(number);
app.component("app", App);
app.component("common-input", CommonInput);
app.component("image-component", ImageComponent);
app.component("pagination", Pagination);
app.component("dynamicSelect", DynamicSelect);
app.component("date-field", DateField);
app.use(pinia);
app.use(router);
app.mount("#app");
