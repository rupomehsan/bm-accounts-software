import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'notifications',
    component: Layout,
    children: [
        {
            path: '',
            name: "Notifications",
            component: All
        },
        {
            path: 'create',
            name: "NotificationCreate",
            component: Form
        },
    ]
}


export default routes;
