import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'receipt-books-assign',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllAssignReceiptBook",
            component: All
        },
        {
            path: 'create',
            name: role+"AssingReceiptBookCreate",
            component: Form
        },
    ]
}


export default routes;
