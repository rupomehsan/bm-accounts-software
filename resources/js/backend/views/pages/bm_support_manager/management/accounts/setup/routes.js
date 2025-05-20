import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bmSupport
const routes = {
    path: 'accounts',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllPaymentMethod",
            component: All
        },
        {
            path: 'create',
            name: role+"CreatePaymentMethod",
            component: Form
        },
    ]
}


export default routes;
