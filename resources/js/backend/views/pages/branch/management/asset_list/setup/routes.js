import Layout from "./Layout.vue";
import All from "../All.vue";
import Details from "../Details.vue";
const role = window.role.branch
const routes = {
    path: 'asset-list',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "AllAssetList",
            component: All
        },
        {
            path: 'details',
            name: role +  "AssetDetails",
            component: Details
        },
    ]
}


export default routes;
