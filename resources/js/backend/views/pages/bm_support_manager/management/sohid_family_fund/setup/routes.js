import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "sohid-family-fund",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllSohidFamilyFund",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateSohidFamilyFund",
            component: Form,
        },
    ],
};

export default routes;
