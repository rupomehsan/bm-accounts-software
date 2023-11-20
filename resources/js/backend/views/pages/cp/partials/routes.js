import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import application_routes from "../management/applications/setup/routes"
import bm_at_a_glance_routes from "../management/bm_at_a_glance/setup/routes"
import receipt_book_routes from "../management/receipt_book/setup/routes"
import notification_routes from "../management/notification/setup/routes"

const routes =
{
    path: 'cp',
    component: Layout,
    children: [
        {
            path: '',
            name: 'cpDashboard',
            component: Dashboard,
        },
        application_routes,
        bm_at_a_glance_routes,
        receipt_book_routes,
        notification_routes,
    ]
};


export default routes;
