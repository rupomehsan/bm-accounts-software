import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../management/user/setup/routes"

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
        user_routes,
    ]
};


export default routes;
