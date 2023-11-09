import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import application_routes from "../management/applications/setup/routes"

const routes =
{
    path: 'cp',
    component: Layout,
    children: [
        {
            path: '',
            name: 'cpDashboard',
            component: Dashboard,
        },
        application_routes,
    ]
};


export default routes;
