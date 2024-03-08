import Layout from "./Layout.vue";
import Dashboard from "../Dashboard.vue";
import receipt_book_routes from "../management/receipt_book/setup/routes";
import receipt_book_assign_routes from "../management/receipt_book_assing/setup/routes";
import branch_target_routes from "../management/branch_target/setup/routes";
import branch_income_routes from "../management/branch_income/setup/routes";
import income_routes from "../management/income/setup/routes";
import central_division_income_routes from "../management/central_division_income/setup/routes";
import monthly_income_routes from "../management/monthly_income/setup/routes";
import accounts_routes from "../management/accounts/setup/routes";
import sohid_family_fund_routes from "../management/sohid_family_fund/setup/routes";
import sohid_fund_routes from "../management/sohid_fund/setup/routes";
import sohid_family_routes from "../management/sohid_family/setup/routes";
import application_format_route from "../management/application_format/setup/routes";
import application_route from "../management/application/setup/routes";
import application_category_route from "../management/application_category/setup/routes";
import account_category_route from "../management/account_category/setup/routes";
import user_routes from "../management/user/setup/routes";
import voucher_routes from "../management/voucher/setup/routes";
import not_approved_by_bm_voucher_routes from "../management/not_approved_by_bm_voucher/setup/routes";
import not_approved_by_cp_voucher_routes from "../management/not_approved_by_cp_voucher/setup/routes";
import loan_routes from "../management/LoanProvider/setup/routes";
import loan_payment_routes from "../management/LoanPayment/setup/routes";
import salary_routes from "../management/Salary/setup/routes";
import reporting_routes from "../management/report/setup/routes";
import jamanot_payment_routes from "../management/jamanotPayment/setup/routes";
import jamanot_provide_routes from "../management/jamanotProvider/setup/routes";
import office_rent_routes from "../management/OfficeRent/setup/routes";
import house_rent_routes from "../management/HouseRent/setup/routes";
import notification_routes from "../management/notification/setup/routes";
import profile_routes from "../management/profile/setup/routes";

const routes = {
    path: "bm-manager",
    component: Layout,
    children: [
        {
            path: "",
            name: "bmManagerDashboard",
            component: Dashboard,
        },
        receipt_book_routes,
        receipt_book_assign_routes,
        branch_target_routes,
        branch_income_routes,
        income_routes,
        central_division_income_routes,
        monthly_income_routes,
        accounts_routes,
        sohid_fund_routes,
        sohid_family_fund_routes,
        sohid_family_routes,
        application_format_route,
        application_route,
        application_category_route,
        account_category_route,
        user_routes,
        voucher_routes,
        not_approved_by_bm_voucher_routes,
        not_approved_by_cp_voucher_routes,
        loan_routes,
        loan_payment_routes,
        salary_routes,
        reporting_routes,
        jamanot_payment_routes,
        jamanot_provide_routes,
        office_rent_routes,
        house_rent_routes,
        notification_routes,
        profile_routes,
    ],
};

export default routes;
