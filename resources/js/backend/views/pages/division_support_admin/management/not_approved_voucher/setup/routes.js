import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'not-approved-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "NotApprovedVoucher",
            component: All
        },

    ]
}


export default routes;
