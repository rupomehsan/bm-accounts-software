import Layout from "./Layout.vue";
import AllExpense from "../All.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'account-category/expense',
    component: Layout,
    children: [
        {
            path: 'all',
            name: role+"AllAccountExpenseCategory",
            component: AllExpense

        },
        {
            path: 'create',
            name: role+"CreateAccountExpenseCategory",
            component: Form
        },
    ]
}


export default routes;
