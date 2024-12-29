import Layout from "./Layout.vue";
import Dashboard from "../Dashboard.vue";
import receipt_book_routes from "../management/receipt_book/setup/routes";
import receipt_book_assign_routes from "../management/receipt_book_assing/setup/routes";
import branch_target_routes from "../management/branch_target/setup/routes";
import branch_income_routes from "../management/branch_income/setup/routes";
import income_routes from "../management/income/setup/routes";
import income_source_routes from "../management/income_source/setup/routes";
import central_division_income_routes from "../management/central_division_income/setup/routes";
import monthly_income_routes from "../management/monthly_income/setup/routes";
import kollan_tohobil_income_routes from "../management/kollan_tohobil_income/setup/routes";
import tran_income_routes from "../management/tran_income/setup/routes";
import accounts_routes from "../management/accounts/setup/routes";
import sohid_family_fund_routes from "../management/sohid_family_fund/setup/routes";
import sohid_fund_routes from "../management/sohid_fund/setup/routes";
import sohid_family_routes from "../management/sohid_family/setup/routes";
import application_format_route from "../management/application_format/setup/routes";
import application_route from "../management/application/setup/routes";
import application_category_route from "../management/application_category/setup/routes";
import account_category_route from "../management/account_category/setup/routes";
import account_expense_category_route from "../management/account_expense_category/setup/routes";
import user_routes from "../management/user/setup/routes";
import voucher_routes from "../management/voucher/setup/routes";
import not_approved_by_bm_voucher_routes from "../management/not_approved_by_bm_voucher/setup/routes";
import not_approved_by_cp_voucher_routes from "../management/not_approved_by_cp_voucher/setup/routes";
import loan_routes from "../management/LoanProvider/setup/routes";
import loan_payment_routes from "../management/LoanPayment/setup/routes";
import salary_routes from "../management/Salary/setup/routes";
import reporting_routes from "../management/report/setup/routes";
import jamanot_payment_routes from "../management/JamanotPayment/setup/routes";
import jamanot_provide_routes from "../management/JamanotProvider/setup/routes";
import office_rent_routes from "../management/OfficeRent/setup/routes";
import house_rent_routes from "../management/HouseRent/setup/routes";
import notification_routes from "../management/notification/setup/routes";
import profile_routes from "../management/profile/setup/routes";
import budget_routes from "../management/Budget/setup/routes";
import audit_routes from "../management/Audit/setup/routes";
import analysis_routes from "../management/Analysis/setup/routes";
// asset_management_routes
import asset_category_routes from "../management/AssetManagement/AssetCategory/setup/routes";
import asset_lost_routes from "../management/AssetManagement/AssetLost/setup/routes";
import asset_routes from "../management/AssetManagement/Asset/setup/routes";
import asset_audit_routes from "../management/AssetManagement/AssetAudit/setup/routes";
import asset_audit_list_routes from "../management/AssetManagement/AssetAuditList/setup/routes";
import asset_brand_routes from "../management/AssetManagement/AssetBrand/setup/routes";
import asset_history_routes from "../management/AssetManagement/AssetChangeHistory/setup/routes";
import asset_item_routes from "../management/AssetManagement/AssetItem/setup/routes";
import asset_shop_list_routes from "../management/AssetManagement/AssetShopList/setup/routes";
import asset_waranty_routes from "../management/AssetManagement/AssetWaranty/setup/routes";
import asset_quotation_product_routes from "../management/AssetManagement/AssetQuotations/Product/setup/routes";
import asset_quotation_product_price_routes from "../management/AssetManagement/AssetQuotations/ProductPrice/setup/routes";
import asset_quotation_routes from "../management/AssetManagement/AssetQuotations/Quotation/setup/routes";
import asset_request_to_cp_routes from "../management/AssetManagement/AssetRequestToCp/setup/routes";
import asset_transfer_routes from "../management/AssetManagement/AssetTransfer/setup/routes";

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
        income_source_routes,
        central_division_income_routes,
        monthly_income_routes,
        kollan_tohobil_income_routes,
        tran_income_routes,
        accounts_routes,
        sohid_fund_routes,
        sohid_family_fund_routes,
        sohid_family_routes,
        application_format_route,
        application_route,
        application_category_route,
        account_category_route,
        account_expense_category_route,
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
        budget_routes,
        audit_routes,
        analysis_routes,
        // asset_management_routes
        asset_category_routes,
        asset_lost_routes,
        asset_routes,
        asset_audit_routes,
        asset_brand_routes,
        asset_history_routes,
        asset_item_routes,
        asset_shop_list_routes,
        asset_waranty_routes,
        asset_audit_list_routes,
        asset_quotation_product_routes,
        asset_quotation_product_price_routes,
        asset_quotation_routes,
        asset_request_to_cp_routes,
        asset_transfer_routes,
    ],
};

export default routes;
