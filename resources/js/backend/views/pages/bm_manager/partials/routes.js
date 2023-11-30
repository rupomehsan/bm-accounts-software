import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import receipt_book_routes from "../management/receipt_book/setup/routes"
import branch_target_routes from "../management/branch_target/setup/routes"
import branch_income_routes from "../management/branch_income/setup/routes"
import central_division_income_routes from "../management/central_division_income/setup/routes"
import daily_income_routes from "../management/daily_income/setup/routes"

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
        branch_income_routes,
        central_division_income_routes,
        daily_income_routes,
    ]
};


export default routes;
