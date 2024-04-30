import Layout from "./Layout.vue";
import All from "../All.vue";
import AllblockListUser from "../AllblockListUser.vue";
import Form from "../Form.vue";

const routes = {
    path: 'users',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllUser",
            component: All
        },
        {
            path: 'block-list',
            name: "AllblockListUser",
            component: AllblockListUser
        },
        {
            path: 'create',
            name: "CreateUser",
            component: Form
        },
    ]
}


export default routes;
