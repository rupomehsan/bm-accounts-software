import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "sohid-fund",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllSohidFund",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateSohidFund",
            component: Form,
        },
    ],
};

export default routes;
