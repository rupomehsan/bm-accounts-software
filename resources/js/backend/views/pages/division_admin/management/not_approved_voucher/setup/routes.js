import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'not-approved-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "AdminNotApprovedVoucher",
            component: All
        },

    ]
}


export default routes;
