import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'not-approved-by-admin-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "AdminAllNotApprovedByAdminVouchers",
            component: All
        },
    ]
}


export default routes;
