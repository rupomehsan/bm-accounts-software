import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import voucher_routes from "../management/voucher/setup/routes"
import not_approved_by_admin_voucher_routes from "../management/not_approved_by_admin_voucher/setup/routes"
import not_approved_by_cp_voucher_routes from "../management/not_approved_by_cp_voucher/setup/routes"
import not_approved_voucher_routes from "../management/not_approved_voucher/setup/routes"
import voucher_report_routes from "../management/report/setup/routes"


const routes =
{
    path: 'division-support-admin',
    component: Layout,
    children: [
        {
            path: '',
            name: 'DivisionSupportAdminDashboard',
            component: Dashboard,
        },
        voucher_routes,
        not_approved_by_admin_voucher_routes,
        not_approved_by_cp_voucher_routes,
        not_approved_voucher_routes,
        voucher_report_routes,

    ]
};


export default routes;
