import Layout from "./Layout.vue";
import Dashboard from "../Dashboard.vue";
import application_routes from "../management/applications/setup/routes";
import bm_at_a_glance_routes from "../management/bm_at_a_glance/setup/routes";
import division_at_a_glance_routes from "../management/division_at_a_glance/setup/routes";
import receipt_book_routes from "../management/receipt_book/setup/routes";
import income_expense from "../management/income_expence/setup/routes";
import notification_routes from "../management/notification/setup/routes";
import message_routes from "../management/message/setup/routes";

const routes = {
    path: "cp",
    component: Layout,
    children: [
        {
            path: "",
            name: "cpDashboard",
            component: Dashboard,
        },
        application_routes,
        bm_at_a_glance_routes,
        division_at_a_glance_routes,
        receipt_book_routes,
        income_expense,
        notification_routes,
        message_routes,
    ],
};

export default routes;
