export default [
    {
        name: "account_expense_category_id",
        label: "খাত",
        type: "select",
        value: "",
        data_list: [],
    },
    {
        name: "date",
        label: "তারিখ",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },
    {
        name: "name",
        label: "কার ভাউচার",
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
        label: "প্রস্তুতকারী",
        type: "text",
        value: "",
    },
    {
        name: "description",
        label: "বিবরণ",
        type: "text",
        value: "",
    },
    {
        name: "reason",
        label: "কারণ",
        type: "text",
        value: "",
    },
    {
        name: "amount",
        label: "টাকার পরিমান,",
        type: "number",
        value: "",
    },
    {
        name: "amount_in_text",
        label: "কথায়",
        type: "text",
        value: "",
    },
    {
        name: "image",
        label: "আপলোড ভাউচার",
        type: "file",
        value: "",
        multiple: false,
    },
];
