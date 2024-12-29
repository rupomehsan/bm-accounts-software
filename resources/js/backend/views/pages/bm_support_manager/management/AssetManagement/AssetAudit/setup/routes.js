import setup from ".";
import All from "../All.vue";
import Form from "../Form.vue";
import AuditDetails from "../AuditDetails.vue";
import Layout from "./Layout.vue";

let route_prefix = setup.route_prefix;
const role = window.role.bmSupport
const routes =
{
    path: 'asset-audit',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"All" + route_prefix,
            component: All,
        },
        {
            path: "create",
            name: role+"Create" + route_prefix,
            component: Form,
        },
         {
            path: "audit-details",
            name: role+"AuditDetails",
            component: AuditDetails,
        },

    ]
};


export default routes;
