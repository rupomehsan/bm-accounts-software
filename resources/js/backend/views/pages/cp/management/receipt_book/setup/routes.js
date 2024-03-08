import Layout from "./Layout.vue";
import All from "../All.vue";

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
    ],
};

export default routes;
