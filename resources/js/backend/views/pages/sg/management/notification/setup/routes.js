import Layout from "./Layout.vue";
import All from "../All.vue";
import MyNotification from "../MyNotification.vue";
import Form from "../Form.vue";

const routes = {
    path: "notifications",
    component: Layout,
    children: [
        {
            path: "",
            name: "Notifications",
            component: All,
        },
        {
            path: "create",
            name: "NotificationCreate",
            component: Form,
        },
        {
            path: "my-notifications",
            name: "MyNotification",
            component: MyNotification,
        },
    ],
};

export default routes;
