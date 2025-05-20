import Layout from "./Layout.vue";
import All from "../All.vue";
import AllPendingVouchers from "../AllPendingVoucher.vue";
import Form from "../Form.vue";
import ApprovalForm from "../ApprovedForm.vue";
import BmTopShit from "../TopShit.vue";
import BmSetMonthForVouchers from "../SetVoucherMonth.vue";

const role = window.role.bm

const routes = {

    path: 'vouchers',
    component: Layout,

    children: [
        {
            path: 'approved',
            name: role + "AllVouchers",
            component: All
        },
        {
            path: 'pending',
            name: role + "AllPendingVouchers",
            component: AllPendingVouchers
        },
        {
            path: 'set-month',
            name: role + "SetMonthForVouchers",
            component: BmSetMonthForVouchers
        },
        {
            path: 'create',
            name: role + "CreateVoucher",
            component: Form
        },
        {
            path: 'topshit/:id',
            name: role + "TopShit",
            component: BmTopShit
        },
        {
            path: 'approval',
            name: role + "TopShitVoucherApproval",
            component: ApprovalForm
        },
    ]

}


export default routes;
