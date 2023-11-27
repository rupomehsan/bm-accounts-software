import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import receipt_book_routes from "../management/receipt_book/setup/routes"
import branch_target_routes from "../management/branch_target/setup/routes"

const routes =
{
    path: 'bm-manager',
    component: Layout,
    children: [
        {
            path: '',
            name: 'bmManagerDashboard',
            component: Dashboard,
        },
        receipt_book_routes,
        branch_target_routes,
    ]
};


export default routes;
