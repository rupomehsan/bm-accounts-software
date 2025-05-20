import Layout from "./Layout.vue"
import Dashboard from "../Dashboard.vue"
import user_routes from "../management/user/setup/routes"

const routes =
{
    path: 'division-employee',
    component: Layout,
    children: [
        {
            path: '',
            name: 'DivisionEmployeeDashboard',
            component: Dashboard,
        },
        user_routes,
    ]
};


export default routes;
