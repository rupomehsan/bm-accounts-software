import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
import SohidFundLedger from "../MainLedger.vue";
import AllBranchIncome from "../AllBranchIncome.vue";
const role = window.role.bm
const routes = {
    path: 'sohid-fund',
    component: Layout,
    children: [
        {
            path: 'ledger',
            name: role + "SohidFundLedger",
            component: SohidFundLedger
        },
        {
            path: 'at-a-glance',
            name: role + "AllSohidFundAtAGlance",
            component: All
        },
        {
            path: 'branch-income',
            name: role + "SohidFundAllBranchIncome",
            component: AllBranchIncome
        },
        {
            path: 'create',
            name: role + "CreateSohidFund",
            component: Form
        },
        {
            path: 'balance',
            name: role + "SohidFundBalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
