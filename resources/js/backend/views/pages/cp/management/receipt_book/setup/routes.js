import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

import setup from ".";
let route_prefix = setup.route_prefix;

const routes = {
    path: "receipt-book",
    component: Layout,
    children: [
        {
            path: "",
            name: route_prefix + "All",
            component: All,
        },
        {
            path: "aproval",
            name: route_prefix + "CpApproval",
            component: Form,
        },
    ],
};

export default routes;
