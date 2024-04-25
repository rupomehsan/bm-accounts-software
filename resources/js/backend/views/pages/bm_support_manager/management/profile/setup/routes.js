import Layout from "./Layout.vue";

import Profile from "../Profile.vue";

const routes = {
    path: "profile",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "BMUpdateProfile",
            component: Profile,
        },
    ],
};

export default routes;
