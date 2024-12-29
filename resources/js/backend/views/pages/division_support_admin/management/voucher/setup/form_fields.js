export default [
    {
        name: "account_expense_category_id",
        label: "Slect category",
        type: "select",
        value: "",
        data_list: []
    },
    {
        name: "date",
        label: "date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },
    {
        name: "name",
        label: "whose voucher",
        type: "text",
        value: "",
    },
    // {
    //     name: "folio",
    //     label: "folio",
    //     type: "number",
    //     value: "",
    // },
    {
        name: "creator_name",
        label: "created by",
        type: "text",
        value: "",
    },
    {
        name: "description",
        label: "description",
        type: "text",
        value: "",
    },
    {
        name: "reason",
        label: "reason",
        type: "text",
        value: "",
    },
    {
        name: "amount",
        label: "amount",
        type: "number",
        value: "",
    },
    {
        name: "amount_in_text",
        label: "amount in text",
        type: "text",
        value: "",
    },
    {
        name: "image",
        label: "Upload image",
        type: "file",
        value: "",
        multiple: false
    },


];
