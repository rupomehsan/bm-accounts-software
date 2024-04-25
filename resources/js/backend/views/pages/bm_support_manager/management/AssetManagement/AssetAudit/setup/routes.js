import setup from ".";
import All from "../All.vue";
import Form from "../Form.vue";
import AuditDetails from "../AuditDetails.vue";
import Layout from "./Layout.vue";

let route_prefix = setup.route_prefix;

const routes = {
    path: "asset-audit",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "All" + route_prefix,
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "Create" + route_prefix,
            component: Form,
        },
        {
            path: "audit-details",
            name: window.role.bmSupport + "AuditDetails",
            component: AuditDetails,
        },
    ],
};

export default routes;
