export default [
    {
        name: "title",
        label: "Enter title",
        type: "text",
        value: "",
    },
    {
        name: "description",
        label: "Enter your description",
        type: "text",
        value: "",
    },
    {
        name: "type",
        label: "Select type",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Income",
                value: "income",
            },
            {
                label: "Expense",
                value: "expense",
            },
        ],

    },

];
