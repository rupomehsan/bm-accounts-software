import setup from ".";
import All from "../All.vue";
import Form from "../Form.vue";
import Details from "../Details.vue";
import Layout from "./Layout.vue";

let route_prefix = setup.route_prefix;
const role = window.role.bm
const routes =
{
    path: 'asset',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"All" + route_prefix,
            component: All,
        },
        {
            path: "create",
            name: role+"Create" + route_prefix,
            component: Form,
        },
        {
            path: "details",
            name: role+"Details" + route_prefix,
            component: Details,
        },

    ]
};


export default routes;
