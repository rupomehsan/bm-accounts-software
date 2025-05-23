import moment from "moment";

export default [
    {
        name: "account_receipt_book_id",
        label: "Select account receipt book",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "account_category_id",
        label: "Select account category",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
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
        name: "random_user",
        label: "Enter random user name",
        type: "text",
        value: "",
    },
    {
        name: "account_id",
        label: "Select account",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },

    {
        name: "account_number_id",
        label: "Select account number",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    // {
    //     name: "account_receipt_book_no",
    //     label: "Enter account receipt book no",
    //     type: "number",
    //     value: "",
    // },
    {
        name: "account_receipt_no",
        label: "Enter  receipt page  no",
        type: "number",
        value: "",
    },
    {
        name: "date",
        label: "Enter date",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },
    {
        name: "amount",
        label: "Enter amount",
        type: "number",
        value: "",
    },
    {
        name: "amount_in_text",
        label: "Enter amount in text",
        type: "text",
        value: "",
    },
    {
        name: "description",
        label: "Enter comment",
        type: "textarea",
        value: "",
    },

];
