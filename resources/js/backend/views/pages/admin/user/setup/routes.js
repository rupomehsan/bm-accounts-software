import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'users',
    component: Layout,
    children: [
        {
            path: '',
            name: "All",
            component: All
        },
        {
            path: 'create',
            name: "Create",
            component: Form
        },
    ]
}


export default routes;
