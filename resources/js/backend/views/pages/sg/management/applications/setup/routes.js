import Layout from "./Layout.vue";
import All from "../All.vue";
import CategoryWiseApplication from "../CategoryWiseApplication.vue";
import Applications from "../Applications.vue";
import AppliationDetails from "../AppliationDetails.vue";
import setup from ".";

let route_prefix = setup.route_prefix;

const routes = {
    path: "applications",
    component: Layout,
    children: [
        {
            path: "",
            name: route_prefix + "All",
            component: All,
        },

        // {
        //     path: "category/:id",
        //     name: route_prefix + "Show",
        //     component: CategoryWiseApplication,
        // },
        {
            path: ":id",
            name: route_prefix + "Details",
            component: AppliationDetails,
        },
        {
            path: ":type/category/:id",
            name: route_prefix + "Category",
            component: Applications,
        },
    ],
};

export default routes;
