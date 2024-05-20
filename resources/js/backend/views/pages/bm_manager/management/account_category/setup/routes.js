import Layout from "./Layout.vue";
import AllIncome from "../AllIncome.vue";
import AllExpense from "../AllExpense.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role = rolePrefix.role
const routes = {
    path: 'account-category',
    component: Layout,
    children: [
        {
            path: 'income',
            name: role + "AllAccountIncomeCategory",
            component: AllIncome

        },
        {
            path: 'expense',
            name: role + "AllAccountExpenseCategory",
            component: AllExpense

        },
        {
            path: 'create',
            name: role + "CreateAccountCategory",
            component: Form
        },
    ]
}


export default routes;
