import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import setup from ".";

let route_prefix = setup.route_prefix;

const routes = {
    path: 'applications',
    component: Layout,
    children: [
        {
            path: '',
            name: route_prefix + "All",
            component: All
        },
        {
            path: 'create',
            name: route_prefix + "Create",
            component: Form
        },
    ]
}


export default routes;
