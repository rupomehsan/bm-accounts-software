import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import TopshitDetails from "../TopShit.vue";
const role = window.role.bmSupport
const routes = {
    path: 'not-approved-by-bm-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "NotApprovedByBmVoucher",
            component: All
        },
        {
            path: 'update-status/:id',
            name: role + "UpdateVoucherStatus",
            component: Form
        },
        {
            path: 'topship-details/:id',
            name: role + "TopshitSPBmNotApprovedVoucher",
            component: TopshitDetails
        },

    ]
}


export default routes;
