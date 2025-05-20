import moment from "moment";

export default [
    {
        name: "account_category_id",
        label: "Select account category",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "payment_interval",
        label: "Select payment interval",
        type: "select",
        value: "",
        multiple: false,
        data_list: [
            {
                label: 'Monthly',
                value: 'monthly',
            },
            {
                label: 'Yearly',
                value: 'yearly',
            },
            {
                label: 'One time',
                value: 'one_time',
            },
            {
                label: 'three month',
                value: 'three_month',
            },
            {
                label: 'Six month',
                value: 'six_month',
            },
        ],
    },
    {
        name: "branch_id",
        label: "Select branch",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "target_amount",
        label: "Enter target amount",
        type: "number",
        value: "",
    },
    {
        name: "session",
        label: "Enter session",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
        dateFormat: 'YYYY'
    },
    {
        name: "comment",
        label: "Enter comment",
        type: "text",
        value: "",
    },
];
