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
            name: "BmNotifications",
            component: All,
        },


    ],
};

export default routes;
