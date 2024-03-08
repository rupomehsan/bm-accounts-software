import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../management/user/setup/routes"

const routes =
{
    path: 'well-wisher',
    component: Layout,
    children: [
        {
            path: '',
            name: 'WellWisherAdminDashboard',
            component: Dashboard,
        },
        user_routes,
    ]
};


export default routes;
