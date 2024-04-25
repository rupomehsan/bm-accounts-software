import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "sohid-family",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllSohidFamily",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateSohidFamily",
            component: Form,
        },
    ],
};

export default routes;
