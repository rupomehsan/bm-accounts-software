import setup from ".";
import All from "../All.vue";
import Form from "../Form.vue";
import Layout from "./Layout.vue";

let route_prefix = setup.route_prefix;
const role = window.role.bmSupport

const routes =
{
    path: 'jamanot-payment',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "All" + route_prefix,
            component: All,
        },
        {
            path: "create",
            name: role + "Create" + route_prefix,
            component: Form,
        },

    ]
};


export default routes;
