import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../management/user/setup/routes"

const routes =
{
    path: 'superadmin',
    component: Layout,
    children: [
        {
            path: '',
            name: 'SuperAdminDashboard',
            component: Dashboard,
        },
        user_routes,
    ]
};


export default routes;
