import Layout from "./Layout.vue";
import MainLedger from "../MainLedger.vue";
import IncomeExpenseStatement from "../IncomeExpenseStatement.vue";
import ExpenseStatement from "../ExpenseStatement.vue";
import IncomeStatement from "../IncomeStatement.vue";
import setup from ".";
let prefix = setup.prefix
const role = window.role.bm
import LoanRegister from "../LoanRegister.vue";
import Jamanot from "../Jamanot.vue";
import Salary from "../Salary.vue";
import OfficeRent from "../OfficeRent.vue";
import HouseRent from "../HouseRent.vue";
import AssetList from "../AssetList.vue";
import BMStockRegister from "../BMStockRegister.vue";
import AssetRegister from "../AssetRegister.vue";
import EkkalinProdan from "../EkkalinProdan.vue";
import NiyomitoProdan from "../NiyomitoProdan.vue";
import KendriyoSuvakankhiThekeAy from "../KendriyoSuvakankhiThekeAy.vue";
import AtAGlance from "../AtAGlance.vue";

const routes = {
    path: 'reports',
    component: Layout,
    children: [
        {
            path: '',
            name: prefix + "MainLedger",
            component: MainLedger
        },
        {
            path: 'main-ledger',
            name: prefix + "MainLedger",
            component: MainLedger
        },
        {
            path: 'statements',
            name: prefix + "IncomeExpenseStatement",
            component: IncomeExpenseStatement
        },
        {
            path: 'income-statements',
            name: prefix + "IncomeStatement",
            component: IncomeStatement
        },
        {
            path: 'expense-statements',
            name: prefix + "ExpenseStatement",
            component: ExpenseStatement
        },

        {
            path: "loan-register",
            name: prefix + "LoanRegister",
            component: LoanRegister,
        },
        {
            path: "jamanot",
            name: prefix + "Jamanot",
            component: Jamanot,
        },
        {
            path: "salary",
            name: prefix + "Salary",
            component: Salary,
        },
        {
            path: "office-rent",
            name: prefix + "OfficeRent",
            component: OfficeRent,
        },
        {
            path: "house-rent",
            name: prefix + "HouseRent",
            component: HouseRent,
        },
        {
            path: "asset-list",
            name: prefix + "AssetList",
            component: AssetList,
        },
        {
            path: "bm-stock-register",
            name: prefix + "BMStockRegister",
            component: BMStockRegister,
        },
        {
            path: "asset-register",
            name: prefix + "AssetRegister",
            component: AssetRegister,
        },
        {
            path: "lump-sum-payment",
            name: prefix + "EkkalinProdan",
            component: EkkalinProdan,
        },
        {
            path: "regular-paying",
            name: prefix + "NiyomitoProdan",
            component: NiyomitoProdan,
        },
        {
            path: "Central-Auspicious-to-Income",
            name: prefix + "KendriyoSuvakankhiThekeAy",
            component: KendriyoSuvakankhiThekeAy,
        },
        {
            path: "at-a-glance",
            name: prefix + "AtAGlance",
            component: AtAGlance,
        },

    ]
}


export default routes;
