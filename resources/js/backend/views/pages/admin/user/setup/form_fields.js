export default [
    {
        name: 'full_name',
        label: 'Enter your full name',
        type: 'text',
    },
    {
        name: 'email',
        label: 'Enter your email',
        type: 'email',
    },
    {
        name: 'password',
        label: 'Enter your password',
        type: 'password',
    },
    {
        name: 'uid',
        label: 'Enter your user code',
        type: 'text',
    },
    {
        name: 'telegram_name',
        label: 'Enter your telegram name',
        type: 'text',
    },
    {
        name: 'telegram_id',
        label: 'Enter your telegram id',
        type: 'text',
    },
    {
        name: 'image',
        label: 'Upload your image',
        type: 'file',
        multiple: false,
    },

    {
        name: 'status',
        label: 'select default status',
        type: 'select',
        multiple: false,
        data_list: [
            {
                label: 'Active',
                value: 'active',
            },
            {
                label: 'Inactive',
                value: 'inactive',
            },
        ],
    },
];
