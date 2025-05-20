import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bm
const routes = {
    path: 'account-group',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllAccoutGroup",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateAccountGroup",
            component: Form
        },
    ]
}


export default routes;
