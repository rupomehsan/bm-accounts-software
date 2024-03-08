import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'application-category',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllApplicationCategory",
            component: All
        },
        {
            path: 'create',
            name: "CreateApplicationCategory",
            component: Form
        },
    ]
}


export default routes;
