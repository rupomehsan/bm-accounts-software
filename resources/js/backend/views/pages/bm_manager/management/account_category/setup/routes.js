import Layout from "./Layout.vue";
import AllIncome from "../AllIncome.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role = rolePrefix.role
const routes = {
    path: 'account-category/income',
    component: Layout,
    children: [
        {
            path: 'all',
            name: role + "AllAccountIncomeCategory",
            component: AllIncome

        },

        {
            path: 'create',
            name: role + "CreateIncomeAccountCategory",
            component: Form
        },
    ]
}


export default routes;
