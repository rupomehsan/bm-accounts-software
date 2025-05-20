import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import asset_list_routes from "../management/asset_list/setup/routes"

const routes =
{
    path: 'branch',
    component: Layout,
    children: [
        {
            path: '',
            name: 'BranchAdminDashboard',
            component: Dashboard,
        },
        asset_list_routes,
    ]
};


export default routes;
