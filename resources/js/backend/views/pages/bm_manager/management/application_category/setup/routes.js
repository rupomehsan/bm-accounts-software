import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bm

const routes = {
    path: 'application-category',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "AllApplicationCategory",
            component: All
        },
        {
            path: 'create',
            name: role + "CreateApplicationCategory",
            component: Form
        },
    ]
}


export default routes;
