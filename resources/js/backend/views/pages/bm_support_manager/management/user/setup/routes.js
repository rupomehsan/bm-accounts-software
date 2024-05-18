import Layout from "./Layout.vue";
import All from "../All.vue";
import AllblockListUser from "../AllblockListUser.vue";
import Form from "../Form.vue";
const role = window.role.bmSupport
const routes = {
    path: 'users',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllUser",
            component: All
        },
        {
            path: 'block-list',
            name: role+"AllblockListUser",
            component: AllblockListUser
        },
        {
            path: 'create',
            name: role+"CreateUser",
            component: Form
        },
    ]
}


export default routes;
