import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
import TranFundLedger from "../MainLedger.vue";
import AllBranchIncome from "../AllBranchIncome.vue";
const role = window.role.bm
const routes = {
    path: 'tran-fund',
    component: Layout,
    children: [
        {
            path: 'ledger',
            name: role + "TranFundLedger",
            component: TranFundLedger
        },
        {
            path: 'at-a-glance',
            name: role + "AllTranFundAtAGlance",
            component: All
        },
        {
            path: 'branch-income',
            name: role + "TranFundAllBranchIncome",
            component: AllBranchIncome
        },
        {
            path: 'create',
            name: role + "CreateTranIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role + "TranBalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
