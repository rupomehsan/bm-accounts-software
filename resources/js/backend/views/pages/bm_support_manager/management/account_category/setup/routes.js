import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "account-category",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllAccountCategory",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateAccountCategory",
            component: Form,
        },
    ],
};

export default routes;
