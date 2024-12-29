export default [
    {
        name: "title",
        label: "Enter your title",
        type: "text",
        value: "",
    },



    {
        name: "start_date",
        label: "Enter your start date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "end_date",
        label: "Enter your end date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "is_complete",
        label: "Select complete or not",
        type: "select",
        value: "",
        data_list: [
            {
                value: "yes",
                label: "Yes",
            },
            {
                value: "no",
                label: "No",
            },
        ],
    },
    {
        name: "description",
        label: "Enter your description",
        type: "textarea",
        value: "",
    },
];
