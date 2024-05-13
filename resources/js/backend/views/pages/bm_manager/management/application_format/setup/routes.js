import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import setup from ".";

let route_prefix = setup.route_prefix;
const role = window.role.bm
const routes = {
    path: 'application-format',
    component: Layout,
    children: [
        {
            path: '',
            name: role + route_prefix + "All",
            component: All
        },
        {
            path: 'create',
            name: role + route_prefix + "Create",
            component: Form
        },
    ]
}


export default routes;
