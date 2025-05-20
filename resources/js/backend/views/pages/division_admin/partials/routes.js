import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import income_routes from "../management/income/setup/routes"
import voucher_routes from "../management/voucher/setup/routes"
import not_approved_by_admin_voucher_routes from "../management/not_approved_by_admin_voucher/setup/routes"
import not_approved_by_cp_voucher_routes from "../management/not_approved_by_cp_voucher/setup/routes"
import not_approved_voucher_routes from "../management/not_approved_voucher/setup/routes"
import voucher_report_routes from "../management/report/setup/routes"
import user_routes from "../management/user/setup/routes"

const routes =
{
    path: 'division-admin',
    component: Layout,
    children: [
        {
            path: '',
            name: 'DivisionAdminDashboard',
            component: Dashboard,
        },
        income_routes,
        voucher_routes,
        not_approved_by_admin_voucher_routes,
        not_approved_by_cp_voucher_routes,
        not_approved_voucher_routes,
        voucher_report_routes,
        user_routes,
    ]
};


export default routes;
