import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'users',
    component: Layout,
    children: [
        {
            path: '',
            name: "AdminSupportAllUser",
            component: All
        },
        {
            path: 'create',
            name: "CreateAdminSupportUser",
            component: Form
        },
    ]
}


export default routes;
