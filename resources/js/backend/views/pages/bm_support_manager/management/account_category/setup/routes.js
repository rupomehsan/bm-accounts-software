import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'account-category',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllAccountCategory",
            component: All

        },
        {
            path: 'create',
            name: role+"CreateAccountExpenseCategory",
            component: Form
        },
    ]
}


export default routes;
