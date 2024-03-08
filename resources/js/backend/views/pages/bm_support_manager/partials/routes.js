import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import receipt_book_routes from "../management/receipt_book/setup/routes"
import branch_target_routes from "../management/branch_target/setup/routes"
import branch_income_routes from "../management/branch_income/setup/routes"
import central_division_income_routes from "../management/central_division_income/setup/routes"
import monthly_income_routes from "../management/monthly_income/setup/routes"
import accounts_routes from "../management/accounts/setup/routes"
import sohid_family_fund_routes from "../management/sohid_family_fund/setup/routes"
import sohid_fund_routes from "../management/sohid_fund/setup/routes"
import sohid_family_routes from "../management/sohid_family/setup/routes"
import application_format_route from "../management/application_format/setup/routes"
import application_route from "../management/application/setup/routes"
import application_category_route from "../management/application_category/setup/routes"
import account_category_route from "../management/account_category/setup/routes"
import user_routes from "../management/user/setup/routes"

const routes =
{
    path: 'bm-support-manager',
    component: Layout,
    children: [
        {
            path: '',
            name: 'bmSupportManagerDashboard',
            component: Dashboard,
        },
 
    ]
};


export default routes;
