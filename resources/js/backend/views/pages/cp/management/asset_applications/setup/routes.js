import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import CategoryWiseApplication from "../CategoryWiseApplication.vue";
import Applications from "../Applications.vue";
import AppliationDetails from "../AppliationDetails.vue";

const routes = {
    path: 'asset-applications',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllAssetApplications",
            component: All
        },
        {
            path: 'create',
            name: "Create",
            component: Form
        },
        {
            path: 'category/:id',
            name: "Show",
            component: CategoryWiseApplication
        },
        {
            path: ':type/:id',
            name: "Applications",
            component: Applications
        },
        {
            path: ':id',
            name: "AppliationDetails",
            component: AppliationDetails
        },
    ]
}


export default routes;
